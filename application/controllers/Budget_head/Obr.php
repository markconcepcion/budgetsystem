<?php
    class Obr extends CI_Controller {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "BUDGET HEAD") {
                redirect('Login/Logout');
            }
            date_default_timezone_set('Asia/Manila');
        }
        
        public function index() {   
            $order = $this->input->post('order'); $data['order_by'] = $this->input->post('order_by');
            if ($order === null) { $order = "ASC"; $data['order_by'] = "SORT DESCENDINGLY"; }

            $data['content'] = 'Pages/Budget_head_view/Obr_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['Obrs'] = $this->obr_model->readOBRs($this->session->userdata('level'), $order); //FETCH ALL OBRs THAT IS PENDING AND CHECKED BY BO
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        public function printObligationRequest()
        {

            $this->load->view('Pages/Head');
            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Pages/Budget_head_view/OBR_print');
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }
        
        // DISPALY OBR DETAILS AND LBP EXPENDITURES - PENDING
        public function Obr_details($obr_id) {   
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['dpt_id'] = $this->input->post('dpt_id');
            
            $lbp_id = $this->lbp_model->readLbp2_id($this->input->post('dpt_id'), date('Y'), "FINALIZED"); //GET LBP2 ID
            $data['Lbp_exps'] = $this->lbp_model->readLbp2($lbp_id); // GET EXPENDITURES USING LBP2 ID

            $Exp_id = ""; // SET A NULL VALUE
            foreach ($data['Lbp_exps'] as $ids) { $Exp_id = $Exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; } // COMPILE ALL EXP ID THAT CORRESPONDS WITH LBP_EXP
            $Exps_id = substr_replace($Exp_id ,"",-1); // REMOVE LAST COMMNA 
            $data['Exp_classes'] = $this->exp_class_model->readExpClasses($Exps_id); //USE COMPLIDE IDS TO GET EXPENDITURES CLASS
            $data['Exps'] = $this->exp_model->readExps($Exps_id); //USE COMPLIDE IDS TO GET EXPENDITURES CLASS
            $data['Exps_temp'] = $this->exp_model->readExps_null($Exps_id); //USE COMPLIDE IDS TO GET EXPENDITURES CLASS
            $data['obr_exps'] = $this->obr_model->readObrs_approved($Exps_id, $this->input->post('dpt_id'), date('Y'));

            // GET RECENT MBO NO AND OBR NO
            $data['obr_no'] = $this->obr_model->readObr_No($this->session->userdata('level'), date('Y')) + 1; 
            $data['mbo_no'] = $this->mbo_model->readMbo_No($this->session->userdata('level'), date('Y')) + 1;
            
            $data['Obr_details'] = $this->obr_model->readObr($obr_id); // FETCH OBR DATA BY USING ID
            $data['quarter'] = $this->getQuarter(date('m')); // CURRENT QUARTER
            
            $data['content'] = 'Pages/Budget_head_view/Obr_details_view';
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        // CHECK OBR WETHER TO BE ACCEPTED OR DECLINED
        public function Obr_check($obr_id) { 
            if ($this->input->post('obr_check_btn') === "DECLINED") {
                $this->obr_model->updateParticular($obr_id);
                $this->obr_model->updateObr($obr_id);
            } else {
                $cn_id = $this->controlnb_model->readNotebook(date('Y'), $this->input->post('dpt_id'));

                $this->obr_model->updateParticular($obr_id);
                $this->obr_model->updateObr($obr_id);
                $this->mbo_model->createMBO($obr_id, $cn_id);
            } redirect('Budget_head/Obr');
        }

        public function Obr_details_checked($obr_id) {
            $data['content'] = 'Pages/Budget_head_view/Obr_checked_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['dpt_id'] = $this->input->post('dpt_id');

            $data['obr_details'] = $this->obr_model->readObr_checked($obr_id); //OBR DETAILS FROM *OBR-MBO AND *OBR-PART-EXP
            $temp = $data['obr_details']; // TEMPORARY DATA OF OBR DETAILS
            $exp_id = $temp['EXPENDITURE_id']; // EXP_ID OF OBR
            $yr = $temp['OBR_DATE']; // YR OF OBR

            $lbp_id = $this->lbp_model->readLbp2_id($this->input->post('dpt_id'), $yr, "FINALIZED"); //GET LBP2 ID
            $data['lbp_exp'] = $this->exp_model->readExp($lbp_id, $exp_id); // GET EXP OF LBP 2 EXP 
            $data['quarter'] = $this->getQuarter(date('m')); // CURRENT QUARTER
            $data['obr_exp'] = $this->obr_model->readObrs_approved($exp_id, $this->input->post('dpt_id'), $yr);
            
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        //FINAL APPROVE OBR - BY BUDGET HEAD
        public function approve_OBR($obr_id) {
            $this->session->set_flashdata('edit_success', 'OBR Approved!');
            $this->obr_model->updateApproval($obr_id);
            redirect('Budget_head/Obr');
        }

         // MACRO FUNCTIONS
         function getQuarter($m){
            if ($m >= 1 && $m <=3) {
                return 1;
            } elseif ($m >= 4 && $m <=6) {
                return 2;
            } elseif ($m >= 7 && $m <=9) {
                return 3;
            } else {
                return 4 ;
            }
        }

        public function obrPrint($obrID)
        {
            $data['mayor'] = $this->ui_model->getMayor();
            $data['budgetHead'] = $this->ui_model->getBudgetHead();
            $data['obrInfo'] = $this->obr_model->readObrInfo($obrID);

            $obrInfo = $data['obrInfo'];
            $expenditureID = $obrInfo['EXPENDITURE_id'];
            $departmentID = $obrInfo['deptID'];
            $obrYear = date('Y', strtotime($obrInfo['OBR_DATE']));
            $lbpID = $this->lbp_model->readLbp2_id($departmentID, $obrYear, "FINALIZED"); 
            
            $data['lbpExpenditure'] = $this->exp_model->readExp($lbpID, $expenditureID); // GET EXP OF LBP 2 EXP 
            $data['quarter'] = $this->getQuarter(date('m')); // CURRENT QUARTER
            $data['obrApprovedExpenditure'] = $this->obr_model->readObrs_approved($expenditureID, $departmentID, $obrYear);

            $this->load->view('Pages/Budget_head_view/obrPrintView', $data);
        }

        // function no_explode($n) {
        //     if ($n === 0) {
        //         return 1;
        //     } else if ($n === 1500) {
        //         return 1500;
        //     } else {
        //         $temp = explode('-', $n);
        //         return $temp[0]+1;
        //     }
        // }





















        public function view_reviewedOBR($obr_id) {
            $data['content'] = 'Pages/Budget_head_view/ObligationRequest_reviewed';
            $data['dept_code'] = $this->input->post('dept');

            $data['obr_details'] = $this->obr_model->readOBRdet_id($obr_id);
            $data['obr_exp_details'] = $this->obr_model->readOBRexp_id($obr_id);
            $data['mbo_det'] = $this->mbo_model->readMBO($obr_id);
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $temp = $data['obr_details'];
            $exp_id = $temp['EXPENDITURE_EXPENDITURE_id'];
            $data['total_rel'] = $this->exp_model->total_actualRel($exp_id);
            $lbp_id = $this->lbp_model->readLBP_dept($data['dept_code'], $this->input->post('year'));
            
            $data['amt_approp'] = $this->lbp_model->read_AmtApprop($lbp_id, $this->input->post('year'), $exp_id);
            $data['quarter'] = $this->getQuarter(date('m'));
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        // public function approve_OBR($obr_id) {
        //     $this->obr_model->updateApproval($obr_id);
        //     $data['content'] = 'Printable';
        //     $data['dept_code'] = $this->input->post('dept');
        //     $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

        //     $data['obr_details'] = $this->obr_model->readOBRdet_id($obr_id);
        //     $data['obr_exp_details'] = $this->obr_model->readOBRexp_id($obr_id);
        //     $data['mbo_det'] = $this->mbo_model->readMBO($obr_id);

        //     $temp = $data['obr_details'];
        //     $exp_id = $temp['EXPENDITURE_EXPENDITURE_id'];
        //     $data['total_rel'] = $this->exp_model->total_actualRel($exp_id);
        //     $lbp_id = $this->lbp_model->readLBP_dept($data['dept_code'], $this->input->post('year'));
            
        //     $data['amt_approp'] = $this->lbp_model->read_AmtApprop($lbp_id, $this->input->post('year'), $exp_id);
        //     $data['quarter'] = $this->getQuarter(date('m'));
        //     $this->load->view('Pages/Budget_head_view/deskapp/head', $data);
        //     $this->load->view('Pages/Budget_head_view/OBR_print', $data);
        //     $this->load->view('Pages/Budget_head_view/deskapp/script', $data);
        // }
 

       
    }
<?php
    class Obr extends CI_Controller
    {
        function __construct() {
            parent::__construct();

            if(!$this->session->userdata('logged_in')) {
				Redirect('Login');
            } else if($this->session->userdata('level') != "BUDGET OFFICER 1" 
                    && $this->session->userdata('level') != "BUDGET OFFICER 2" 
                    && $this->session->userdata('level') != "BH_STAFF") 
            {
                redirect('Login/Logout');
            }

            date_default_timezone_set('Asia/Manila');
        }
        
        public function index() {
            $data['highlights'] = 'obr';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $order = $this->input->post('order'); $data['order_by'] = $this->input->post('order_by');
            if ($order === null) { $order = "ASC"; $data['order_by'] = "SORT DESCENDINGLY"; }
            $data['obrs'] = $this->obr_model->readOBRs($this->session->userdata('level'), $order);

            $data['content'] = 'Pages/Budget_officer_view/obr_view';
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }
        
        public function Obr_details($obr_id) { // DISPALY OBR DETAILS AND LBP EXPENDITURES  
            $checkViewStat =  $this->obr_model->readObr($obr_id);
            if ($checkViewStat['obrViewStatus'] == '1') {
                $this->session->set_flashdata('edit_failed', 'On The Process');
                redirect('Budget_officer/Obr');
            }
            
            $data['highlights'] = 'obr';
            $this->obr_model->isView($obr_id, '1');

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
            $obr_no = $this->obr_model->readObr_No($this->session->userdata('level'), date('Y')); 
            $mbo_no = $this->mbo_model->readMbo_No($this->session->userdata('level'), date('Y')); 
            $data['obr_no'] = $this->no_explode($obr_no);
            $data['mbo_no'] = $this->no_explode($mbo_no);
            
            $data['Obr_details'] = $this->obr_model->readObr($obr_id); // FETCH OBR DATA BY USING ID
            $data['quarter'] = $this->getQuarter(date('m')); // CURRENT QUARTER

            $data['content'] = 'Pages/Budget_officer_view/Obr_details_view';
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }

        public function removeStat($obr_id)
        {
            $this->obr_model->isView($obr_id, '0');
            redirect('Budget_officer/Obr');
        }

        public function Obr_check($obr_id) { // CHECK OBR WETHER TO BE ACCEPTED OR DECLINED
            if ($this->input->post('obr_check_btn') === "DECLINED") {
                $this->obr_model->updateParticular($obr_id);
                $this->obr_model->updateObr($obr_id);
            } else {
                $cn_id = $this->controlnb_model->readNotebook(date('Y'), $this->input->post('dpt_id'));

                $this->obr_model->updateParticular($obr_id);
                $this->obr_model->updateObr($obr_id);
                $this->mbo_model->createMBO($obr_id, $cn_id);
            } redirect('Budget_officer/Obr');
        }

        public function obrPrint($obrID)
        {
            $data['highlights'] = 'obr';
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

            $this->load->view('Pages/Budget_officer_view/obrPrintView', $data);
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

        function no_explode($n) {
            if ($n === 0) {
                return 1;
            } else if ($n === 1500) {
                return 1500;
            } else {
                $temp = explode('-', $n);
                return $temp[0]+1;
            }
        }
    }
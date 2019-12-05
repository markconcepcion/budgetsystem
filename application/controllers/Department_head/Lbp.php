<?php
    class Lbp extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "DEPARTMENT HEAD"
                    && $this->session->userdata('level') != "BH_DEPTHEAD") {
                redirect('Login/Logout');
            }
        }
        
        public function index()
        { // DISPLAY LBP2 (IF EXIST) DISPLAY EXPENDITURE SELECTION (IF NOT)
            $data['highlights'] = 'lbp';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['bhprofile'] = $this->ui_model->getBH();

            $Dpt_id = $this->session->userdata('dept'); $currYr = date('Y');
            $Lbp_id = $this->lbp_model->readLbp2_id($Dpt_id, ($currYr+1));

            if ($Lbp_id > 0) {
                $data['content'] = 'Pages/Department_head_view/Lbp2_view';
                $data['Lbp2_det'] = $this->lbp_model->readLbp($Lbp_id);
                $data['Lbp_exps'] = $this->lbp_model->readLbp2($Lbp_id);
                $Exp_id = "";
                foreach ($data['Lbp_exps'] as $ids) { $Exp_id = $Exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
                $Exps_id = substr_replace($Exp_id ,"",-1);

                $data['Exps'] = $this->exp_model->readExps($Exps_id);
                $data['Exp_classes'] = $this->exp_class_model->readExpClasses($Exps_id);
                $data['Exps_prevYr'] = $this->exp_model->readExps_Yr($Exps_id, $Dpt_id, ($currYr-1));
                $data['Exps_currYr'] = $this->exp_model->readExps_Yr($Exps_id, $Dpt_id, $currYr);
                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            } else {
                $data['content'] = 'Pages/Department_head_view/Lbp2_selExps_view';
                $data['Exps'] = $this->exp_model->readExpenditure();
                $data['Exp_classes'] = $this->exp_class_model->readExpClass();
                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            }
        }

        public function Lbp2_selExps()
        { //DISPLAY LBP2 FORM TO BE FILLED UP 
            $currYr = $this->input->post('currYr');
            $Dpt_id = $this->input->post('Dpt_id');
            $data['highlights'] = 'lbp';
            $data['deptDetails'] = $this->dept_model->readDept($Dpt_id);
            $data['mayor'] = $this->ui_model->getSignature(1011);
            $data['bhead'] = $this->ui_model->getSignature(1071);
            
            $Exp_id = "";
            foreach ($this->input->post('Exp_id[]') as $ids) { $Exp_id = $Exp_id.$ids.','; }
            $Exps_id = substr_replace($Exp_id ,"",-1);

            if(count($this->input->post('Exp_id[]')) <= 0 ) {
                $this->session->set_flashdata('edit_failed', 'You have not picked any expenditures');
                redirect('Department_head/Lbp');
            } else {
                $data['header'] = 'Submit LBP 2';
                $data['content'] = 'Pages/Department_head_view/Lbp2_form_view';
                $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
                $data['bhprofile'] = $this->ui_model->getBH();
                
                $data['Exp_classes'] = $this->exp_class_model->readExpClasses($Exps_id);
                $data['Exps'] = $this->exp_model->readExps($Exps_id);
                $data['Exps_prevYr'] = $this->exp_model->readExps_Yr($Exps_id, $Dpt_id, ($currYr-1));
                $data['Exps_currYr'] = $this->exp_model->readExps_Yr($Exps_id, $Dpt_id, $currYr);
                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            }                
        }

        public function submitLbp2()
        {
            $preparedBy = $this->input->post('preparedBy');
            $reviewedBy = $this->input->post('reviewedBy');
            $approvedBy = $this->input->post('approvedBy');
            
            $Dpt_id = $this->session->userdata('dept'); $currYr = date('Y');
            $lbp = $this->lbp_model->readLbp2_id($Dpt_id, ($currYr+1));
            
            if($lbp > 0){
                $this->session->set_flashdata('edit_failed', 'You have already submitted your LBP2');
                redirect('Department_head/Lbp');
            } else {
                $signID = $this->sign_model->readSignature($preparedBy, $reviewedBy, $approvedBy);
                if($signID == 0){
                    $signID = $this->sign_model->createSignature();
                    echo $signID;
                }
                
                $lbp_id = $this->lbp_model->readMaxId()+1;
                $lbp_form = $this->lbp_model->createLbp2($lbp_id, 1, $signID);
                $this->lbp_model->createLbp2_exps($lbp_id);
                $this->session->set_flashdata('edit_success', 'You have submitted your LBP2');
                redirect('Department_head/Lbp');
            }
        }

        public function Lbp2_edit($Lbp_id)
        {
            $this->lbp_model->updateLbp2_exps($Lbp_id);
            // $this->session->set_flashdata('edit_success', 'Your LBP have been edited');
            redirect('Department_head/Lbp');
        }

    }
    
<?php
    class Lbp extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('roleCode') != 1 && $this->session->userdata('roleCode') != 3) {
                redirect('Login/Logout');
            }            
            date_default_timezone_set('Asia/Manila');
        }
        
        public function lbp_index($dept_id)
        { // DISPLAY LBP2 (IF EXIST) DISPLAY EXPENDITURE SELECTION (IF NOT)
            $data['highlights'] = 'lbp';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['hide'] = false;
            
            $currYr = date('Y');
            $Lbp_id = $this->lbp_model->readLbp2_id($dept_id, ($currYr+1));

            if ($Lbp_id > 0) {
                $data['content'] = 'Pages/Department_head_view/Lbp2_view';
                $data['Lbp2_det'] = $this->lbp_model->readLbp($Lbp_id);
                $data['Lbp_exps'] = $this->lbp_model->readLbp2($Lbp_id);
                $data['sign'] = $this->sign_model->read_signature_id(1);

                $data['Exps'] = $this->exp_model->read_lbp_expenditure_id($Lbp_id);
                $data['Exp_classes'] = $this->exp_class_model->read_lbp_expenditure_class_id($Lbp_id);
    
                $data['prev_year'] = $this->lbp_model->read_previous_year_actual_expenditure_dept(($currYr-1), $dept_id);
                $data['curr_year_1'] = $this->lbp_model->read_current_year_actual_expenditure_dept($currYr, $dept_id);
                $data['curr_year_2'] = $this->lbp_model->read_current_year_estimate_expenditure_dept($currYr, $dept_id);

                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            } else {
                $data['content'] = 'Pages/Department_head_view/Lbp2_selExps_view';
                $data['Exps'] = $this->exp_model->readExpenditure();
                $data['Exp_classes'] = $this->exp_class_model->readExpClass();
                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            }
        }

        public function Lbp2_selExps($exp_ids = false)
        { //DISPLAY LBP2 FORM TO BE FILLED UP 
            $data['highlights'] = 'lbp';
            $data['mayor'] = $this->user_model->getUsrD(1011, 2)->row_array();            
            $data['bhead'] = $this->user_model->getUsrD(1071, 5)->row_array();            
            $currYr = date('Y');
            $Dpt_id = $this->session->userdata('dept');
            $data['deptDetails'] = $this->dept_model->readDept($Dpt_id);
            $data['sign'] = $this->sign_model->read_signature_id(1);            

            if ($exp_ids === false) {
                $exp_ids = $this->input->post('Exp_id[]');
            }

            $Exp_id = "";
            foreach ($exp_ids as $ids) { $Exp_id = $Exp_id.$ids.','; }
            $Exps_id = substr_replace($Exp_id ,"",-1);

            if(count($exp_ids) <= 0 ) {
                $this->session->set_flashdata('edit_failed', 'You have not picked any expenditures');
                redirect('DH/LBP/'.$Dpt_id);
            } else {
                $data['header'] = 'Submit LBP 2';
                $data['content'] = 'Pages/Department_head_view/Lbp2_form_view';
                $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
                
                $data['Exp_classes'] = $this->exp_class_model->readExpClasses($Exps_id);
                $data['Exps'] = $this->exp_model->readExps($Exps_id);
                $data['prev_year'] = $this->lbp_model->read_previous_year_actual_expenditure_dept(($currYr-1), $Dpt_id);
                $data['curr_year_1'] = $this->lbp_model->read_current_year_actual_expenditure_dept($currYr, $Dpt_id);
                $data['curr_year_2'] = $this->lbp_model->read_current_year_estimate_expenditure_dept($currYr, $Dpt_id);

                $data['classCount'] = count($data['Exp_classes']);
                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            }
        }

        public function submitLbp2()
        {
            $cont = 1;
            $preparedBy = $this->input->post('preparedBy');
            $reviewedBy = $this->input->post('reviewedBy');
            $approvedBy = $this->input->post('approvedBy');
            
            $Dpt_id = $this->session->userdata('dept'); $currYr = date('Y');
            $lbp = $this->lbp_model->readLbp2_id($Dpt_id, ($currYr+1));
            
            if($lbp > 0){
                $this->session->set_flashdata('edit_failed', 'You have already submitted your LBP2');
                redirect('DH/LBP/'.$Dpt_id);
            } else {
                $signID = $this->sign_model->readSignature($preparedBy, $reviewedBy, $approvedBy);
                if($signID == 0){
                    $signID = $this->sign_model->createSignature();
                }

                $Exps_amt = $this->input->post('Exps_amt[]');
                for ($i=0; $i < count($Exps_amt); $i++) {
                    if ($Exps_amt[$i] != null) {
                        if(str_replace(',', '', $Exps_amt[$i]) < 1){
                            $cont = 0;
                            $this->session->set_flashdata('edit_failed', 'Even one expenditure can not be zero!');
                            $this->Lbp2_selExps($this->input->post('Exps_id[]'));
                            break;
                        }
                    }
                }                
                
                if($cont == 1){
                    $lbp_id = $this->lbp_model->readMaxId()+1;
                    $lbp_form = $this->lbp_model->createLbp2($lbp_id, 1, $signID);
                    $this->lbp_model->createLbp2_exps($lbp_id);

                    //log transac
                    $transac = "SUBMIT LBP2";
                    $this->log_model->log($this->session->userdata('userID'), $transac);

                    $this->session->set_flashdata('edit_success', 'You have submitted your LBP2');
                    redirect('DH/LBP/'.$Dpt_id);
                }
            }
        }
        public function Lbp2_edit($Lbp_id)
        {
            $cont = 1;
            $Exps_amt = $this->input->post('Exp_amt[]');
            for ($i=0; $i < count($Exps_amt); $i++) {
                if ($Exps_amt[$i] != null) {
                    if(str_replace(',', '', $Exps_amt[$i]) < 1){
                        $cont = 0;
                        $this->session->set_flashdata('edit_failed', 'Even one expenditure can not be zero!');
                        redirect('DH/LBP/'.$this->session->userdata('dept'));
                        break;
                    }
                }
            }   
            if($cont == 1){
                //log transac
                $transac = "Edited Expenditure Amount in lbp2";
                $this->log_model->log($this->session->userdata('userID'), $transac);
                $this->lbp_model->updateLbp2_exps($Lbp_id);
                $this->session->set_flashdata('edit_success', 'Your LBP have been edited');
                redirect('DH/LBP/'.$this->session->userdata('dept'));
            }
        }
        
        public function return_select($lbp_id)
        {
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            
            if ($this->lbp_model->read_lbpstat($lbp_id) === 'FINALIZED') {
                $this->session->set_flashdata('edit_success', 'Your Lbp2 has been approved.');
                redirect('DH/LBP/'.$this->session->userdata('dept'));
            }

            $data['highlights'] = 'lbp';
            
            $data['exps'] = $this->exp_model->read_lbp_expenditure_id($lbp_id, ",lbp_exp.*");
            $data['class'] = $this->exp_class_model->read_lbp_expenditure_class_id($lbp_id);
            $data['Exps'] = $this->exp_model->readExpenditure();
            $data['Exp_classes'] = $this->exp_class_model->readExpClass();
            $data['lbp_id'] = $lbp_id;

            if (count($data['exps']) < 1) {
                $data['hide'] = false;
            } else { $data['hide'] = true; }
            
            $data['content'] = 'Pages/Department_head_view/LBP2/Edit_Exp';
            $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
        }

        public function remove_exp($l_exp_id)
        {
            $this->exp_model->delete_lbp_exp($l_exp_id);
        }

        public function add_lbp_exp($lbp_id)
        {
            if ($this->input->post('Exps_id[]') == null) {
                $this->session->set_flashdata('edit_success', 'No Expenditure Added.');
                redirect('DH/LBP/'.$this->session->userdata('dept'));
            }
            $this->lbp_model->addLbp2_exps($lbp_id);

            //log transac
            $transac = "Added Expenditure in lbp2";
            $this->log_model->log($this->session->userdata('userID'), $transac);
            $this->session->set_flashdata('edit_success', 'You have added to your LBP2');
            redirect('DH/LBP/'.$this->session->userdata('dept'));
        }

    }
<?php
    class Obligation_request extends CI_Controller
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
        {
            $data['deptDetails'] = $this->dept_model->readDept($this->session->userdata('dept'));
            $data['mayor'] = $this->ui_model->getSignature(1011);
            $data['bhead'] = $this->ui_model->getSignature(1071);

            $data['highlights'] = 'obr';
            $data['content'] = 'Pages/Department_head_view/Obr_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['bhprofile'] = $this->ui_model->getBH();
            $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
        }

        public function submitOBR()
        {  
            date_default_timezone_set('Asia/Manila');
            $preparedBy = $this->input->post('preparedBy');
            $reviewedBy = $this->input->post('reviewedBy');
            $approvedBy = $this->input->post('approvedBy');

            $signID = $this->sign_model->readSignature($preparedBy, $reviewedBy, $approvedBy);
            if($signID == 0){
                $signID = $this->sign_model->createSignature();
            }

            $obr_id = $this->obr_model->readMaxObrID()+1;
            $lb_id = $this->logbook_model->readLogbook(date("Y"));
            
            $this->obr_model->create_obr($obr_id, $lb_id['LB_ID'], $signID);
            // $this->obr_model->createOBR_Expenditure($obr_id);

            $this->session->set_flashdata('edit_success', 'OBR submitted successfully!');
            redirect('Department_head/Obligation_request');
        }
    }
    
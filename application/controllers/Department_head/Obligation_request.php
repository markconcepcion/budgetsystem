<?php
    class Obligation_request extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "DEPARTMENT HEAD") {
                redirect('Login/Logout');
            }
        }

        public function index()
        {
            $data['content'] = 'Pages/Department_head_view/Obr_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['bhprofile'] = $this->ui_model->getBH();
            $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
        }

        public function submitOBR()
        {  
            $obr_id = $this->obr_model->readMaxObrID()+1;
            $lb_id = $this->logbook_model->readLogbook(date("Y"));
            
            $this->obr_model->createOBR($obr_id, $lb_id['LB_ID']);
            $this->obr_model->createOBR_Expenditure($obr_id);

            $this->session->set_flashdata('edit_success', 'Your Request have been submitted');
            redirect('Department_head/Obligation_request');
        }
    }
    
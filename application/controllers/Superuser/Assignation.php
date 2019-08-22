<?php
    class Assignation extends CI_Controller
    {
        function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "SUPERUSER") {
                redirect('Login/Logout');
            }
        }
        
        public function index()
        {
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            }
            $data['content'] = 'Pages/Superuser_view/Assignation';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['mayor'] = $this->user_model->getAssign("MAYOR");
            $data['bhead'] = $this->user_model->getAssign("BUDGET HEAD");
            $bhead = $data['bhead'];
            $mayor = $data['mayor'];

            $this->load->view('Pages/Superuser_view/deskapp/layout', $data);
        }

        public function changeAssign()
        {
            $this->form_validation->set_rules('newAssign', 'Name', 'required');
            $this->form_validation->set_rules('post', 'Name', 'required');
            
            if($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('edit_success', 'Error! The textfield is empty');
                redirect('Superuser/Assignation');
			} else {
                $this->user_model->changeAssign();
                $this->session->set_flashdata('edit_success', 'Success! Edited Successfully');
                redirect('Superuser/Assignation');
            }
        }
    }
    
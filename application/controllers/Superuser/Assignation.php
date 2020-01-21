<?php
    class Assignation extends CI_Controller
    {
        function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('roleCode') != 0 && $this->session->userdata('roleCode') != 3) {
                redirect('Login/Logout');
            }
        }
        
        public function index()
        {
            $data['highlights'] = 'Assignation';
            $data['content'] = 'Pages/Superuser_view/Assignation';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['assign'] = $this->sign_model->read_signature_id(1);
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
                if ($this->input->post('post') === 'signApproved') {
                    $this->sign_model->change_sign_approval(1, $this->input->post('newAssign'));
                } else {
                    $this->sign_model->change_sign_reviewal(1, $this->input->post('newAssign'));
                }
                $this->session->set_flashdata('edit_success', 'Edited Successfully');
                redirect('Superuser/Assignation');
            }
        }
    }
    
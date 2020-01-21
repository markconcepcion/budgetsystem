<?php
	/**
	* 
	*/
	class Profile extends CI_Controller
	{
		
		function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('roleCode') < 2) {
                redirect('Login/Logout');
            }
            $this->ui_model->clear_fcache($this->session->userdata('id'));            
		}

        public function index()
        {
            $data['highlights'] = 'profile';
            $data['content'] = 'Pages/Budget_officer_view/Profile';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }
        
        
        public function changePass($id)
        {
			$this->form_validation->set_rules('old_pass', 'Old Password', 'required');
			$this->form_validation->set_rules('new_pass', 'New Password', 'required');
            $this->form_validation->set_rules('new_passes', 'Confirm Password', 'matches[new_pass]');
            
            if($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('edit_failed', 'New Password Does Not Matched');
                redirect('Budget_officer/Profile');
			} else {
                $validate = $this->user_model->validate_oldpass($id, $this->input->post('old_pass'));

                if($validate->num_rows() > 0) {
                    
                    $this->user_model->updatePass($id, $this->input->post('new_pass'));
                    $this->session->set_flashdata('edit_success', 'Password Successfully Changed');
                    redirect('Budget_officer/Profile');
                } else {
                    $this->session->set_flashdata('edit_failed', 'Old Password is Incorrect');
                    redirect('Budget_officer/Profile');
                }
			} 
        }

        public function editProfile($id)
        {
            $this->form_validation->set_rules('fname', 'Name', 'required');
            $this->form_validation->set_rules('mname', 'Name', 'required');
            $this->form_validation->set_rules('lname', 'Name', 'required');
            $this->form_validation->set_rules('uname', 'Name', 'required');

            if($this->form_validation->run() === FALSE){
                $this->session->set_flashdata('edit_failed', 'Profile Not Edited');
				redirect('Budget_officer/Profile');
			} else {
				$this->user_model->updateProf($id);
                $this->session->set_flashdata('edit_success', 'Profile Successfully Edited');
				redirect('Budget_officer/Profile');
			}
        }
	}
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
            } else if($this->session->userdata('roleID') < 5) {
                redirect('Login/Logout');
            }
		}

        public function index()
        {
            $data['highlights'] = 'profile';
            $data['content'] = 'Pages/Budget_head_view/Profile';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }
        
        public function LogAdmin()
        {
            $data['highlights'] = 'Profile';
            $dept_data = $this->user_model->getUsrD($this->session->userdata('dept'), 1);

            $data  = $dept_data->row_array();
            $user_id = $data['USR_ID'];
            $name  = $data['USR_FNAME'].' '.$data['USR_LNAME'];
            $dept  = $data['DPT_ID'];
            $userID = $data['id'];
            $roleID = $data['role_id'];
            $roleCode = $data['role_code'];

            $sesdata = array(
                'id' => $user_id,
                'userID' => $userID,
                'roleID' => $roleID,
                'roleCode' => $roleCode,
                'user_name'  => $name,
                'dept'     => $dept,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($sesdata);
            $this->session->set_flashdata('edit_success', 'Welcome, '.$this->session->userdata('user_name').' as Admin');
            redirect('Superuser/Home');
        }
        
        public function changePass($userID)
        {
			$this->form_validation->set_rules('old_pass', 'Old Password', 'required');
			$this->form_validation->set_rules('new_pass', 'New Password', 'required');
            $this->form_validation->set_rules('new_passes', 'Confirm Password', 'matches[new_pass]');
            
            if($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('edit_failed', 'New Password Does Not Matched');
                redirect('Budget_head/Profile');
			} else {
                $validate = $this->user_model->validate_oldpass($userID, $this->input->post('old_pass'));

                if($validate->num_rows() > 0) {
                    $this->user_model->updatePass($userID, $this->input->post('new_pass'));
                    $this->session->set_flashdata('edit_success', 'Password Successfully Changed');
                    redirect('Budget_head/Profile');
                } else {
                    $this->session->set_flashdata('edit_failed', 'Old Password is Incorrect');
                    redirect('Budget_head/Profile');
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
				redirect('Budget_head/Profile');
			} else {
				$this->user_model->updateProf($id);
                $this->session->set_flashdata('edit_success', 'Profile Successfully Edited');
				redirect('Budget_head/Profile');
			}
        }
	}
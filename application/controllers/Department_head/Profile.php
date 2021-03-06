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
            } else if($this->session->userdata('roleCode') != 1 && $this->session->userdata('roleCode') != 3) {
                redirect('Login/Logout');
            }
            date_default_timezone_set('Asia/Manila');
		}

        public function index()
        {
            $data['highlights'] = 'profile';
            $data['content'] = 'Pages/Department_head_view/Profile';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
        }
        
        public function changePass($id)
        {
			$this->form_validation->set_rules('old_pass', 'Old Password', 'required');
			$this->form_validation->set_rules('new_pass', 'New Password', 'required');
            $this->form_validation->set_rules('new_passes', 'Confirm Password', 'matches[new_pass]');
            
            if($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('edit_failed', 'New Password Does Not Matched');
                redirect('Deparment_head/Profile');
			} else {
                $validate = $this->user_model->validate_oldpass($id, $this->input->post('old_pass'));

                if($validate->num_rows() > 0) {
                    $this->user_model->updatePass($id, $this->input->post('new_pass'));
                    $this->session->set_flashdata('edit_success', 'Password Successfully Changed');
                    redirect('Department_head/Profile');
                } else {
                    $this->session->set_flashdata('edit_failed', 'Old Password is Incorrect');
                    redirect('Department_head/Profile');
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
				redirect('Department_head/Profile');
			} else {
				$this->user_model->updateProf($id);
                $this->session->set_flashdata('edit_success', 'Profile Successfully Edited');
				redirect('Department_head/Profile');
			}
        }

        public function LogAdmin()
        {
            $adminD = $this->ui_model->getAdmin();

            $my_id = $adminD['USR_ID'];
            $name  = $adminD['USR_FNAME'].' '.$adminD['USR_LNAME'];
            $dept  = $adminD['DEPARTMENT_DPT_ID'];
            $level = $adminD['USR_POST'];
            $sesdata = array(
                'id' => $my_id,
                'user_name'  => $name,
                'dept'     => $dept,
                'level'     => $level,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($sesdata);
            $this->session->set_flashdata('edit_success', 'Welcome, Admin');
            redirect('Superuser/home');
        }

        public function logBH()
        {
            $dept_data = $this->user_model->getUsrD($this->session->userdata('dept'), "BUDGET HEAD");

            $data  = $dept_data->row_array();
            
            $my_id = $data['USR_ID'];
            $name  = $data['USR_FNAME'].' '.$data['USR_LNAME'];
            $dept  = $data['DEPARTMENT_DPT_ID'];
            $level = $data['USR_POST'];
            $sesdata = array(
                'id' => $my_id,
                'user_name'  => $name,
                'dept'     => $dept,
                'level'     => $level,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($sesdata);
            $this->session->set_flashdata('edit_success', 'Welcome, '.$this->session->userdata('user_name').' as a Budget Head');
            redirect('Budget_head/home');
        }
	}
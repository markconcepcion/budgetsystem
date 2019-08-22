<?php
	/**
	* 
	*/
	class Department extends CI_Controller
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

		public function index(){
			$data['content'] = 'Pages/Superuser_view/Department';
			$data['dept_list'] = $this->dept_model->readDept(); 
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Superuser_view/deskapp/layout', $data);
		}

		public function addDept()
		{
			$this->form_validation->set_rules('dept_name', 'Department Name', 'required');
			$this->form_validation->set_rules('dept_code', 'Department Code', 'required');

			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('edit_success', 'Error! Incomplete Data');
				redirect('Superuser/Department');                
			} else {
				$this->dept_model->createDept();
                $this->session->set_flashdata('edit_success', 'Success! A department has been added.');
				redirect('Superuser/Department');
			}
		}

		public function editDept(){
			$this->form_validation->set_rules('dept-code', 'Department Code', 'required');
			$this->form_validation->set_rules('dept-name', 'Department Name', 'required');

			if($this->form_validation->run() === FALSE){
                $this->session->set_flashdata('edit_success', 'Error! Incomplete Data.');
				redirect('Superuser/Department');
			} else {
				$this->dept_model->updateDept();
                $this->session->set_flashdata('edit_success', 'Edited Successfully.');
				redirect('Superuser/Department');
			}
		}

		public function deactDept()
		{
			$this->session->set_flashdata('edit_success', 'Department Deactivated');
			$this->dept_model->deactivateDept($this->input->post('dept_id'));
			redirect('Superuser/Department');
		}
	}
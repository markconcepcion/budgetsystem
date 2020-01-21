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
            } else if($this->session->userdata('roleCode') != 0 && $this->session->userdata('roleCode') != 3) {
                redirect('Login/Logout');
            }
		}

		public function index(){
			$data['highlights'] = 'Department';
			$data['content'] = 'Pages/Superuser_view/Department';
			$data['dept_list'] = $this->dept_model->readDepartment(); 
			$data['inactiveDepts'] = $this->dept_model->readInactiveDepartments();
			$data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$data['sign'] = $this->sign_model->read_signature_id(1);
			
            $this->load->view('Pages/Superuser_view/deskapp/layout', $data);
		}

		public function addDept()
		{
			$this->form_validation->set_rules('dept_name', 'Department Name', 'required');
			$this->form_validation->set_rules('dept_code', 'Department Code', 'required');
			$this->form_validation->set_rules('fname', 'Department Name', 'required');
			$this->form_validation->set_rules('mname', 'Department Code', 'required');
			$this->form_validation->set_rules('lname', 'Department Name', 'required');
			$this->form_validation->set_rules('username', 'Department Code', 'required');
			$this->form_validation->set_rules('password', 'Department Code', 'required');

			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('edit_success', 'Error! Incomplete Data');
				redirect('Superuser/Department');                
			} else {
				if ($this->dept_model->codeCheck($this->input->post('dept_code')) != null) {
					$this->session->set_flashdata('edit_failed', 'Department Code Already Exists!');
					redirect('Superuser/Department');
				}
				$deptID = $this->dept_model->createDept();
				$this->controlnb_model->create_deptNotebook($deptID);
                $this->session->set_flashdata('edit_success', 'Department Successfully Added.');
				redirect('Superuser/Department');
			}
		}

		public function editDept(){
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

		public function activateDept($deptID)
		{
			$this->dept_model->updateDeparmentStatus($deptID, "ACTIVE");
			$this->session->set_flashdata('edit_success', 'Updated Successfully!');
			redirect('Superuser/Department');
		}
		public function deactDept()
		{
			$this->session->set_flashdata('edit_success', 'Department Deactivated');
			$this->dept_model->updateDeparmentStatus($this->input->post('dept_id'), "INACTIVE");
			redirect('Superuser/Department');
		}
	}
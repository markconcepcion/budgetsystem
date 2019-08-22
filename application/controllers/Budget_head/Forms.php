<?php
	class Forms extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			if(!$this->session->userdata('logged_in')) {
				$this->load->view('Pages/Login');
			} else if($this->session->userdata('level') != "BUDGET HEAD") {
                redirect('Login/Logout');
            }
		}

		public function obr_form_index() {
			$data['content'] = 'Forms/OBR_form';
			$data['dept'] = $this->dept_model->readDept($this->session->userdata('dept'));
			$data['exps'] = $this->exp_model->readExpenditure();
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			
			$this->load->view('deskapp/layout', $data);
		}

		public function lbp_form_2($dept_id) {
			$data['content'] = 'Forms/LBP_form_2';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$data['exp'] = $this->lbp_model->readLBP_dept($dept_id, date('Y'));
			$data['dept'] = $this->dept_model->readDept($this->session->userdata('dept'));
			$data['exps'] = $this->exp_model->readExpenditure();
			
			$this->load->view('deskapp/layout', $data);
		}
	}
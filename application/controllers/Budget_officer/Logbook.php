<?php
	class Logbook extends CI_Controller {
		function __construct() {
			parent::__construct();

			if(!$this->session->userdata('logged_in')) {
                $this->load->view('Pages/Login');
            } else if($this->session->userdata('level') != "BUDGET OFFICER 1" && $this->session->userdata('level') != "BUDGET OFFICER 2") {
                redirect('Login/Logout');
            }
	    }

		public function index()
		{	
			$data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id')); // GET SESSION PROFILE
			
			$data['logbook'] = $this->logbook_model->readLogbook(date('Y')); // CHECK IF LOGBOOK FOR THIS YEAR EXIST
			if ($data['logbook'] == null) { $this->logbook_model->createLogbook(date('Y')); } // CREATE LOGBOOK FOR NEW YEAR
			// SET YEAR
			$data['year'] = $this->input->post('yr'); 
			$yr = $this->input->post('yr');
			if($yr === null){ 
				$yr = date('Y'); 
				$data['year']=date('Y'); 
			} 

			$data['logs'] = $this->logbook_model->readLogs($yr); // GET OBR AS LOGS APPROVED AND DECLINED

			$data['content'] = "Pages/Budget_officer_view/logs_view";
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
		}
	}
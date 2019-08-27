<?php
	class Logbook extends CI_Controller {
		function __construct() {
			parent::__construct();
			
			if(!$this->session->userdata('logged_in')) {
                $this->load->view('Pages/Login');
            } if($this->session->userdata('level') != "BUDGET HEAD") {
                redirect('Login/Logout');
            }
	    }

		public function index()
		{	
			$data['content'] = "Pages/Budget_head_view/Logbook_view";
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

			$data['logbook'] = $this->logbook_model->readLogbook(date('Y')); // CHECK IF LOGBOOK FOR THIS YEAR EXIST
			if ($data['logbook'] == null) { $this->logbook_model->createLogbook(date('Y')); } // CREATE LOGBOOK FOR NEW YEAR
			// SET YEAR
			$yr = $this->input->post('yr');
			if($yr === null){ $yr = date('Y'); } 

			$data['logs'] = $this->logbook_model->readLogs($yr); // GET OBR AS LOGS APPROVED AND DECLINED
			
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
		}
	}
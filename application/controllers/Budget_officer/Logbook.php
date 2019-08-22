<?php
	class Logbook extends CI_Controller {
		function __construct() {
			parent::__construct();
			if(!$this->session->userdata('logged_in')) {
                $this->load->view('Pages/Login');
            }
	    }

		public function index()
		{	
			$year = date('Y');

            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$data['content'] = "Pages/Budget_officer_view/Logbook_logs";
			$data['currYear'] = $this->logbook_model->read_currLogbook($year);
			$data['year'] = $this->logbook_model->readLogbook();
			$data['logs'] = $this->logbook_model->readLogs($year);

            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
		}

		public function addLogbook()
		{
			date_default_timezone_set('Asia/Manila');

			$currYear = $this->logbook_model->read_currLogbook(date('Y'));
			
			if($currYear == NULL){
				$this->logbook_model->createLogbook(date('Y'));
				$this->index(date('Y'));
			} 
			$this->index(date('Y'));
		}
	}
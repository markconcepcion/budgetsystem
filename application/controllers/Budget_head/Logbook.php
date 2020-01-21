<?php
	class Logbook extends CI_Controller {
		function __construct() {
			parent::__construct();
			
			if(!$this->session->userdata('logged_in')) {
                $this->load->view('Pages/Login');
            } if($this->session->userdata('roleID') < 5) {
                redirect('Login/Logout');
			}
			date_default_timezone_set('Asia/Manila');
	    }

		public function readLogs($year)
		{	
            $data['highlights'] = 'logbook';
			$data['content'] = "Pages/Budget_head_view/Logbook_view";
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$data['logs'] = $this->logbook_model->readLogs($year); // GET OBR AS LOGS APPROVED AND DECLINED
			
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
		}

		public function view_supplementations($year)
        {
            $data['highlights'] = 'logbook';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['supps'] = $this->logbook_model->read_supplementations($year);
		    $data['content'] = 'Pages/Budget_head_view/Logbook/view_supplementations';
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }
	}
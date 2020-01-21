<?php
	class Logbook extends CI_Controller {
		function __construct() {
			parent::__construct();

			if(!$this->session->userdata('logged_in')) {
                $this->load->view('Pages/Login');
            } else if($this->session->userdata('roleCode') != 2) {
                redirect('Login/Logout');
            }           
			$this->ui_model->clear_fcache($this->session->userdata('id'));
	    }

		public function index()
		{	
            $data['highlights'] = 'logbook';
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

		public function view_supplementations($year)
        {
            $data['highlights'] = 'logbook';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['supps'] = $this->logbook_model->read_supplementations($year);
		    $data['content'] = 'Pages/Budget_officer_view/Logbook/view_supplementations';
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }

		// public function ObrLogsDetail($obr_id)
		// {
		// 	$data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
        //     $data['dpt_id'] = $this->input->post('dpt_id');

        //     $data['obr_details'] = $this->obr_model->readObr_checked($obr_id); //OBR DETAILS FROM *OBR-MBO AND *OBR-PART-EXP
        //     $temp = $data['obr_details']; // TEMPORARY DATA OF OBR DETAILS
        //     $exp_id = $temp['EXPENDITURE_id']; // EXP_ID OF OBR
        //     $yr = $temp['OBR_DATE']; // YR OF OBR

        //     $lbp_id = $this->lbp_model->readLbp2_id($this->input->post('dpt_id'), $yr, "FINALIZED"); //GET LBP2 ID
        //     $data['lbp_exp'] = $this->exp_model->readExp($lbp_id, $exp_id); // GET EXP OF LBP 2 EXP 
        //     $data['quarter'] = $this->getQuarter(date('m')); // CURRENT QUARTER
        //     $data['obr_exp'] = $this->obr_model->readObrs_approved($exp_id, $this->input->post('dpt_id'), $yr);
		// }
	}
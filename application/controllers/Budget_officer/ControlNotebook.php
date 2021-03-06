<?php
	class ControlNotebook extends CI_Controller {
		function __construct() {
			parent::__construct();
			
			if(!$this->session->userdata('logged_in')) {
				$this->load->view('Pages/Login');
			} else if($this->session->userdata('roleCode') != 2) {
                redirect('Login/Logout');
            }
            $this->ui_model->clear_fcache($this->session->userdata('id'));
        }

		public function viewNotebooks($year) {
            $data['highlights'] = 'notebook';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$data['year'] = $year;
            $data['years'] = $this->controlnb_model->read_existYear();
			$data['ntb_list'] = $this->controlnb_model->readControlNotebook($year);
			$data['content'] = "Pages/Budget_officer_view/notebook_view";
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
		}

		public function notebook_dept_view(Type $var = null)
		{
            $data['highlights'] = 'notebook';
			$data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            //GETTING EXPENDITURE AND EXPEDITURES CLASS IN THE LBP2
            $currYr = $this->input->post('currYr'); // GET YEAR FROM INPUT
            $data['dept_id'] = $this->input->post('dept_id'); // GET YEAR FROM INPUT
            if($currYr === NULL){ $currYr = date('Y'); } // SET YEAR TP CURRENT YEAR IF NULL
            $Lbp_id = $this->lbp_model->readLbp2_id($this->input->post('dept_id'), $currYr); //GET LBP2 ID

            if ($Lbp_id > 0) {
                $data['Lbp_exps'] = $this->lbp_model->readLbp2($Lbp_id); // GET EXPENDITURES USING LBP2 ID
                $Exp_id = ""; // SET A NULL VALUE
                foreach ($data['Lbp_exps'] as $ids) { $Exp_id = $Exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; } // COMPILE ALL EXP ID THAT CORRESPONDS WITH LBP_EXP
                $Exps_id = substr_replace($Exp_id ,"",-1); // REMOVE LAST COMMNA 
                $data['Exp_classes'] = $this->exp_class_model->readExpClasses($Exps_id); //USE COMPLIDE IDS TO GET EXPENDITURES CLASS
                $data['Exps'] = $this->exp_model->readExps($Exps_id); //USE COMPLIDE IDS TO GET EXPENDITURES CLASS

                $data['content'] = "Pages/Budget_officer_view/notebook_dept_view";
                $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
            } else {
                $data['message'] = "This department haven't submitted an LBP Proposal..<br>Please submit one first.";
                $data['content'] = "Pages/blank_view";
                $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
            }
		}

		public function Notebook_Exp($d_code)
		{
            $data['highlights'] = 'notebook';
            $data['content'] = "Pages/Budget_officer_view/Notebook_exp_view";
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $expenditure = $this->input->post('Exp_id');
			$expenditureClass = $this->input->post('ExC_id');

			if(!is_numeric($expenditure) || !is_numeric($expenditureClass)) {
                $this->session->set_flashdata('edit_failed', 'Incomplete Data!');
				redirect('Budget_officer/ControlNotebook');
            } else {
                //GETTING EXPENDITURE AND EXPEDITURES CLASS IN THE LBP2
                $currYr = $this->input->post('currYr'); // GET YEAR FROM INPUT
                if($currYr === NULL){ $currYr = date('Y'); } // SET YEAR TP CURRENT YEAR IF NULL
                $Lbp_id = $this->lbp_model->readLbp2_id($d_code, $currYr); //GET LBP2 ID
                $data['Lbp_exps'] = $this->lbp_model->readLbp2($Lbp_id); // GET EXPENDITURES USING LBP2 ID
                $Exp_id = ""; // SET A NULL VALUE
                foreach ($data['Lbp_exps'] as $ids) { $Exp_id = $Exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; } // COMPILE ALL EXP ID THAT CORRESPONDS WITH LBP_EXP
                $Exps_id = substr_replace($Exp_id ,"",-1); // REMOVE LAST COMMNA 
                $data['Exp_classes'] = $this->exp_class_model->readExpClasses($Exps_id); //USE COMPLIDE IDS TO GET EXPENDITURES CLASS
                $data['Exps'] = $this->exp_model->readExps($Exps_id); //USE COMPLIDE IDS TO GET EXPENDITURES CLASS

                //GET ANNUAL APPROPRITATION AND QUARTER NO.
                $data['annualApprop'] = $this->exp_model->readExp($Lbp_id, $this->input->post('Exp_id'));
                $data['quarter'] = $this->getQuarter(date('m'));

                $data['exp_name'] = $this->exp_model->readExpenditure($this->input->post('Exp_id'));
                $data['dept_code'] = $d_code;
                $data['records'] = $this->controlnb_model->readNotebook_id($d_code, $this->input->post('Exp_id'), $Lbp_id);
                $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
            }
		}

		public function addNotebooks() {
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$dpts = $this->dept_model->readDept();
			$this->controlnb_model->createNotebooks($dpts);
			redirect('Budget_officer/ControlNotebook');
		}

		
		function getQuarter($m){
            if ($m >= 1 && $m <=3) {
                return 1;
            } elseif ($m >= 4 && $m <=6) {
                return 2;
            } elseif ($m >= 7 && $m <=9) {
                return 3;
            } else {
                return 4 ;
            }
        }
	}
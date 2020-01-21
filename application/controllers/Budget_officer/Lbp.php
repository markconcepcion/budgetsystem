<?php
    class Lbp extends CI_Controller
    {
        function __construct()
		{
			parent::__construct();
	        if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('roleCode') != 2) {
                redirect('Login/Logout');
            }
            date_default_timezone_set('Asia/Manila');
            $this->ui_model->clear_fcache($this->session->userdata('id'));
        }

        public function view_lbp($year) //LBP - DISPLAY LIST OF LBP
        {
            $data['highlights'] = 'lbp';
            $data['content'] = 'Pages/Budget_officer_view/Lbp_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['Lbp_yrs'] = $this->lbp_model->readLbpyrs(); //LBP_MODEL
            $data['lbp_yr'] = $year;
            if ($data['lbp_yr'] === null) { $data['lbp_yr'] = date('Y'); }
            
            
            $data['LIST'] = $this->lbp_model->readLBPList($data['lbp_yr']); //LBP_MODEL
            $data['row_num'] = count($data['LIST']);
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }
        
        public function print_lbp_1($year)
        {
            $data['year'] = $year;
            $data['sign'] = $this->sign_model->read_budgetSignature();
			$data['expenditures'] = $this->exp_model->read_lbp_expenditure($year); // get all exp of past-present-next year
            $data['expenditure_classes'] = $this->exp_class_model->read_lbp_expenditure_class($year); // get all exp class of past-present-next year

            $data['prev_year'] = $this->lbp_model->read_previous_year_actual_expenditure(($year-2));
            $data['curr_year_1'] = $this->lbp_model->read_current_year_actual_expenditure($year-1);
            $data['curr_year_2'] = $this->lbp_model->read_current_year_estimate_expenditure($year-1);
            $data['next_year'] = $this->lbp_model->read_next_year_estimate_expenditure(($year));
            
			$this->load->view('Pages/Budget_officer_view/deskapp/head', $data);
			$this->load->view('Pages/Budget_officer_view/printLBP1View', $data);
			$this->load->view('Pages/Budget_officer_view/deskapp/script', $data);
        }

        public function print_lbp_2($Lbp_id)
        {
            $data['Lbp2_det'] = $this->lbp_model->readLbp($Lbp_id);
            $temp = $data['Lbp2_det']; 
            $deptID = $temp['DPT_ID'];
            $year = $temp['FRM_YEAR'];

            $data['Exps'] = $this->exp_model->read_lbp_expenditure_byDept($year, $deptID);
            $data['Exp_classes'] = $this->exp_class_model->read_lbp_expenditure_class_byDept($year, $deptID);

            $data['prev_year'] = $this->lbp_model->read_previous_year_actual_expenditure_dept(($year-2), $deptID);
            $data['curr_year_1'] = $this->lbp_model->read_current_year_actual_expenditure_dept(($year-1), $deptID);
            $data['curr_year_2'] = $this->lbp_model->read_current_year_estimate_expenditure_dept(($year-1), $deptID);
            $data['next_year'] = $this->lbp_model->read_next_year_estimate_expenditure_dept(($year), $deptID);
            
            
			$this->load->view('Pages/Budget_officer_view/deskapp/head', $data);
			$this->load->view('Pages/Budget_officer_view/printLBP2View', $data);
			$this->load->view('Pages/Budget_officer_view/deskapp/script', $data);
        }
    }
    
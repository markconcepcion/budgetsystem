<?php
    class Reports extends CI_Controller
    {
        function __construct()
		{
			parent::__construct();
	        if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('roleID') < 3) {
                redirect('Login/Logout');
            }
        }

        //list of all reports
        public function viewReports($year)
        {
            $data['highlights'] = 'report';
            $data['content'] = 'Pages/Budget_head_view/Reports_list_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['yrs'] = $this->logbook_model->readLogbook(); 
            $data['yr'] = $year;
            $data['dpts'] = $this->dept_model->readDpts();

            if($this->session->userdata('roleCode') == 2) {
                $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
            } else {
                $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
            }
        }

        public function consolidatedQuarter($quarter, $year)
        {
            $from=0; $to=0;

            if ($quarter == 1) { $from = 1; $to = 3; } 
            elseif ($quarter == 2) { $from = 4; $to = 6; }
            elseif ($quarter == 3) { $from = 7; $to = 9; }
            else { $from = 10; $to = 12; }

            $data['annual_budget'] = $this->report_model->readLBP1($year); // GET ACTUAL CONSOLIDATED BUDGET 
            $data['quarter_obr'] = $this->report_model->readExps($year, $from, $to);
            $data['quarter_supp'] = $this->report_model->report_supplement($year, $from, $to);
            $data['quarter_aug'] = $this->report_model->report_augment($year, $from, $to);
            
            $data['year'] = $year;

            $data['lbps_exps'] = $this->report_model->readLBP1($this->input->post('yr')); // GET ACTUAL CONSOLIDATED BUDGET 
            $exp_id = "";
            foreach ($data['lbps_exps'] as $ids) { $exp_id = $exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $exps_id = substr_replace($exp_id ,"",-1);
            $data['exps'] = $this->exp_model->readExps($exps_id);
            $data['exp_classes'] = $this->exp_class_model->readExpClasses($exps_id);


            $data['highlights'] = 'report';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Head');
            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Pages/Budget_head_view/report_consolidatedQuarter_view', $data);
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }

        public function consolidatedAnnual($year)
        {
            $from=1; $to=12;

            $data['annual_budget'] = $this->report_model->readLBP1($year); // GET ACTUAL CONSOLIDATED BUDGET 
            $data['quarter_obr'] = $this->report_model->readExps($year, $from, $to);
            $data['quarter_supp'] = $this->report_model->report_supplement($year, $from, $to);
            $data['quarter_aug'] = $this->report_model->report_augment($year, $from, $to);
            $data['year'] = $year;

            $data['lbps_exps'] = $this->report_model->readLBP1($this->input->post('yr')); // GET ACTUAL CONSOLIDATED BUDGET 
            $exp_id = "";
            foreach ($data['lbps_exps'] as $ids) { $exp_id = $exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $exps_id = substr_replace($exp_id ,"",-1);
            $data['exps'] = $this->exp_model->readExps($exps_id);
            $data['exp_classes'] = $this->exp_class_model->readExpClasses($exps_id);

            
            $data['highlights'] = 'report';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Head');
            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Pages/Budget_head_view/report_consolidatedAnnual_view', $data);
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }

        public function departmentAnnual($year, $deptID)
        {
            $from=1; $to=12;
            $data['year'] = $year;
            
            $data['annual_budget'] = $this->report_model->readActualBudget($deptID, $year); // GET ACTUAL CONSOLIDATED BUDGET 
            $data['quarter_obr'] = $this->report_model->readObligations($deptID, $year);
            $data['quarter_supp'] = $this->report_model->report_supplement($year, $deptID, $from, $to);
            $data['quarter_aug'] = $this->report_model->report_augment($year, $deptID, $from, $to);


            $data['lbps_exps'] = $this->report_model->readLBP1($this->input->post('yr')); // GET ACTUAL CONSOLIDATED BUDGET 
            $exp_id = "";
            foreach ($data['lbps_exps'] as $ids) { $exp_id = $exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $exps_id = substr_replace($exp_id ,"",-1);
            $data['exps'] = $this->exp_model->readExps($exps_id);
            $data['exp_classes'] = $this->exp_class_model->readExpClasses($exps_id);

            
            $data['highlights'] = 'report';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Head');
            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Pages/Budget_head_view/report_departmentAnnual_view', $data);
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }

        public function departmentQuarter($quarter, $year, $deptID)
        {
            $data['year'] = $year;
            $from=0; $to=0;

            if ($quarter == 1) { $from = 1; $to = 3; } 
            elseif ($quarter == 2) { $from = 4; $to = 6; }
            elseif ($quarter == 3) { $from = 7; $to = 9; }
            else { $from = 10; $to = 12; }

            $data['annual_budget'] = $this->report_model->readLBP1($year); // GET ACTUAL CONSOLIDATED BUDGET 
            $data['quarter_obr'] = $this->report_model->read_actualObr_dptID($deptID, $year, $from, $to);
            $data['quarter_supp'] = $this->report_model->report_supplement($year, $deptID, $from, $to);
            $data['quarter_aug'] = $this->report_model->report_augment($year, $deptID, $from, $to);
            

            $data['lbps_exps'] = $this->report_model->readLBP1($this->input->post('yr')); // GET ACTUAL CONSOLIDATED BUDGET 
            $exp_id = "";
            foreach ($data['lbps_exps'] as $ids) { $exp_id = $exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $exps_id = substr_replace($exp_id ,"",-1);
            $data['exps'] = $this->exp_model->readExps($exps_id);
            $data['exp_classes'] = $this->exp_class_model->readExpClasses($exps_id);

            
            $data['highlights'] = 'report';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Head');
            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Pages/Budget_head_view/report_departmentQuarter_view', $data);
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }








        // view report details by quarter or annually
        public function Report_form()
        {
            $data['highlights'] = 'report';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            
            $data['yr'] = $this->input->post('yr');
            $data['dpt_name'] = $this->input->post('dpt_name');

            $data['lbps_exps'] = $this->report_model->readLBP1($this->input->post('yr')); // GET ACTUAL CONSOLIDATED BUDGET 

            $exp_id = "";
            foreach ($data['lbps_exps'] as $ids) { $exp_id = $exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $exps_id = substr_replace($exp_id ,"",-1);

            $data['exps'] = $this->exp_model->readExps($exps_id);
            $data['exp_classes'] = $this->exp_class_model->readExpClasses($exps_id);

            $this->load->view('Pages/Head');
            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Pages/Budget_head_view/Report_form_view', $data);
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }

        //ANNUAL REPORT (UNCONSOLIDATED)
        public function annual_dept($year)
        {
            $data['highlights'] = 'report';
            $dept_code = $this->input->post('dept_code');
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['department'] = $this->report_model->readDept($dept_code);
            $data['expenditures'] = $this->report_model->readExpenditure();
            $data['exp_actual_budget'] = $this->report_model->readActualBudget($dept_code, $year);
            $data['exp_obligated'] = $this->report_model->readObligations($dept_code, $year);

            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Forms/Reports_form', $data);
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }

        //QUARTER VIEW (UNCONSOLIDATED)
        public function quarter_dept_view()
        {
            $data['highlights'] = 'report';
            $data['department'] = $this->report_model->readDept();
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['content'] = 'Reports/viewQuarter_dept';

            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        //QUARTER REPORT (UNCONSOLIDATED)
        public function quarter_dept($year)
        {
            $data['highlights'] = 'report';
            $dept_code = $this->input->post('dept_code');
            $quarter_num = $this->input->post('quarter_num');
            $quarter_allot = 12/$quarter_num;
            $data['department'] = $this->report_model->readDept($dept_code);
            $data['content'] = 'Reports/viewQuarter_dept';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            
            $data['expenditures'] = $this->report_model->readExpenditure();
            $data['exp_actual_budget'] = $this->report_model->readActualBudget($dept_code, $year);

            foreach ($data['exp_actual_budget'] as $key) {
                $key['LBP_EXP_AMOUNT'] = $key['LBP_EXP_AMOUNT'] / 4;
                $key['LBP_EXP_AMOUNT'] = $key['LBP_EXP_AMOUNT'] * $quarter_allot;
            }

            $data['exp_obligated'] = $this->report_model->readObligations($dept_code, $year, $quarter_num);
            
            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Forms/Reports_form', $data);
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }

        //ANNUAL CONSOLIDATED
        public function annnual_consol($year)
        {
            $data['highlights'] = 'report';
            $data['expenditures'] = $this->report_model->readExpenditure();
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['exp_actual_budget'] = $this->report_model->readActualBudget_consol($year);
            $data['exp_obligated'] = $this->report_model->readObligations_consol($year);
            $data['department'] = 0;

            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Forms/Reports_form', $data);
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }

        public function quarter_consol_view()
        {
            $data['highlights'] = 'report';
            $data['department'] = $this->report_model->readDept();
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['content'] = 'Reports/viewQuarter_consol';

            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        public function quarter_consol($year)
        {
            $data['highlights'] = 'report';
            $data['department'] = 0;
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $quarter_num = $this->input->post('quarter_num');
            $quarter_allot = 12/$quarter_num;
            $data['expenditures'] = $this->report_model->readExpenditure();
            $data['exp_actual_budget'] = $this->report_model->readActualBudget_consol($year);

            foreach ($data['exp_actual_budget'] as $key) {
                $key['LBP_EXP_AMOUNT'] = $key['LBP_EXP_AMOUNT'] / 4;
                $key['LBP_EXP_AMOUNT'] = $key['LBP_EXP_AMOUNT'] * $quarter_allot;
            }

                
            $data['exp_obligated'] = $this->report_model->readObligations_consol($year, $quarter_num);

            $this->load->view('Pages/Budget_head_view/deskapp/head');
            $this->load->view('Forms/Reports_form', $data);
            $this->load->view('Pages/Budget_head_view/deskapp/script');
        }


    }
    
<?php
    class Reports extends CI_Controller
    {
        function __construct()
		{
			parent::__construct();
	        if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "BUDGET HEAD") {
                redirect('Login/Logout');
            }
        }

        //list of all reports
        public function index()
        {
            $data['content'] = 'Pages/Budget_head_view/Reports_list_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['yrs'] = $this->logbook_model->readLogbook(); 
            $data['yr'] = $this->input->post('yr'); 
            if($data['yr']===null){ $data['yr']=date('Y'); }
            
            $data['dpts'] = $this->dept_model->readDpts();

            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        // view report details by quarter or annually
        public function Report_form()
        {
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
            $data['department'] = $this->report_model->readDept();
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['content'] = 'Reports/viewQuarter_dept';

            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        //QUARTER REPORT (UNCONSOLIDATED)
        public function quarter_dept($year)
        {
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
            $data['department'] = $this->report_model->readDept();
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['content'] = 'Reports/viewQuarter_consol';

            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        public function quarter_consol($year)
        {
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
    
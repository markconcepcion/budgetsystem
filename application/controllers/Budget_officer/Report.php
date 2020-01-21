<?php
    class Report extends CI_Controller
    {
        function __construct()
		{
			parent::__construct();
	        if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('roleCode') != 2) {
                redirect('Login/Logout');
            }
            $this->ui_model->clear_fcache($this->session->userdata('id'));
        }

        //list of all reports
        public function index()
        {
            $data['highlights'] = 'report';
            $data['content'] = 'Pages/Budget_officer_view/Reports_list_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['yrs'] = $this->logbook_model->readLogbook(); 
            $data['yr'] = $this->input->post('yr'); 
            if($data['yr']===null){ $data['yr']=date('Y'); }
            
            $data['dpts'] = $this->dept_model->readDpts();

            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }

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
            $this->load->view('Pages/Budget_officer_view/deskapp/head');
            $this->load->view('Pages/Budget_officer_view/Report_form_view', $data);
            $this->load->view('Pages/Budget_officer_view/deskapp/script');
        }

        public function consolidatedQuarter()
        {
            $year = $this->input->post('year');
            $quarter = $this->input->post('quarter');
            $from=0; $to=0;

            if ($quarter == 1) { $from = 1; $to = 3; } 
            elseif ($quarter == 2) { $from = 4; $to = 6; }
            elseif ($quarter == 3) { $from = 7; $to = 9; }
            else { $from = 10; $to = 12; }

            $data['annual_budget'] = $this->report_model->readLBP1($year); // GET ACTUAL CONSOLIDATED BUDGET 
            $data['quarter_obr'] = $this->report_model->readExps($year, $from, $to);


            $data['lbps_exps'] = $this->report_model->readLBP1($this->input->post('yr')); // GET ACTUAL CONSOLIDATED BUDGET 
            $exp_id = "";
            foreach ($data['lbps_exps'] as $ids) { $exp_id = $exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $exps_id = substr_replace($exp_id ,"",-1);
            $data['exps'] = $this->exp_model->readExps($exps_id);
            $data['exp_classes'] = $this->exp_class_model->readExpClasses($exps_id);


            $data['highlights'] = 'report';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Head');
            $this->load->view('Pages/budget_officer_view/deskapp/head');
            $this->load->view('Pages/budget_officer_view/report_consolidatedQuarter_view', $data);
            $this->load->view('Pages/budget_officer_view/deskapp/script');
        }

        public function consolidatedAnnual()
        {
            $year = $this->input->post('year');
            $from=1; $to=12;

            $data['annual_budget'] = $this->report_model->readLBP1($year); // GET ACTUAL CONSOLIDATED BUDGET 
            $data['quarter_obr'] = $this->report_model->readExps($year, $from, $to);


            $data['lbps_exps'] = $this->report_model->readLBP1($this->input->post('yr')); // GET ACTUAL CONSOLIDATED BUDGET 
            $exp_id = "";
            foreach ($data['lbps_exps'] as $ids) { $exp_id = $exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $exps_id = substr_replace($exp_id ,"",-1);
            $data['exps'] = $this->exp_model->readExps($exps_id);
            $data['exp_classes'] = $this->exp_class_model->readExpClasses($exps_id);

            
            $data['highlights'] = 'report';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Head');
            $this->load->view('Pages/budget_officer_view/deskapp/head');
            $this->load->view('Pages/budget_officer_view/report_consolidatedAnnual_view', $data);
            $this->load->view('Pages/budget_officer_view/deskapp/script');
        }

        public function departmentAnnual()
        {
            $year = $this->input->post('year');
            $deptID = $this->input->post('dpt_id');
            $from=1; $to=12;

            $data['annual_budget'] = $this->report_model->readActualBudget($deptID, $year); // GET ACTUAL CONSOLIDATED BUDGET 
            $data['annual_obr'] = $this->report_model->readObligations($deptID, $year);


            $data['lbps_exps'] = $this->report_model->readLBP1($this->input->post('yr')); // GET ACTUAL CONSOLIDATED BUDGET 
            $exp_id = "";
            foreach ($data['lbps_exps'] as $ids) { $exp_id = $exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $exps_id = substr_replace($exp_id ,"",-1);
            $data['exps'] = $this->exp_model->readExps($exps_id);
            $data['exp_classes'] = $this->exp_class_model->readExpClasses($exps_id);

            
            $data['highlights'] = 'report';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Head');
            $this->load->view('Pages/budget_officer_view/deskapp/head');
            $this->load->view('Pages/budget_officer_view/report_departmentAnnual_view', $data);
            $this->load->view('Pages/budget_officer_view/deskapp/script');
        }

        public function departmentQuarter()
        {
            $year = $this->input->post('year');
            $quarter = $this->input->post('quarter');
            $deptID = $this->input->post('dpt_id');
            $from=0; $to=0;

            if ($quarter == 1) { $from = 1; $to = 3; } 
            elseif ($quarter == 2) { $from = 4; $to = 6; }
            elseif ($quarter == 3) { $from = 7; $to = 9; }
            else { $from = 10; $to = 12; }

            $data['annual_budget'] = $this->report_model->readLBP1($year); // GET ACTUAL CONSOLIDATED BUDGET 
            $data['quarter_obr'] = $this->report_model->read_actualObr_dptID($deptID, $year, $from, $to);

            $data['lbps_exps'] = $this->report_model->readLBP1($this->input->post('yr')); // GET ACTUAL CONSOLIDATED BUDGET 
            $exp_id = "";
            foreach ($data['lbps_exps'] as $ids) { $exp_id = $exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $exps_id = substr_replace($exp_id ,"",-1);
            $data['exps'] = $this->exp_model->readExps($exps_id);
            $data['exp_classes'] = $this->exp_class_model->readExpClasses($exps_id);

            
            $data['highlights'] = 'report';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Head');
            $this->load->view('Pages/budget_officer_view/deskapp/head');
            $this->load->view('Pages/budget_officer_view/report_departmentQuarter_view', $data);
            $this->load->view('Pages/budget_officer_view/deskapp/script');
        }

    }
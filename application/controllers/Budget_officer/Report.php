<?php
    class Report extends CI_Controller
    {
        function __construct()
		{
			parent::__construct();
	        if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "BUDGET OFFICER 1" && $this->session->userdata('level') != "BUDGET OFFICER 2") {
                redirect('Login/Logout');
            }
        }

        //list of all reports
        public function index()
        {
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
    }
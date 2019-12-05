<?php
    class Lbp extends CI_Controller
    {
        function __construct()
		{
			parent::__construct();
	        if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "BUDGET OFFICER 1" && $this->session->userdata('level') != "BUDGET OFFICER 2") {
                redirect('Login/Logout');
            }
            date_default_timezone_set('Asia/Manila');
        }

        public function index() //LBP - DISPLAY LIST OF LBP
        {
            $data['highlights'] = 'lbp';
            $data['content'] = 'Pages/Budget_officer_view/Lbp_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['Lbp_yrs'] = $this->lbp_model->readLbpyrs(); //LBP_MODEL
            $data['lbp_yr'] = $this->input->post('lbp_yr');
            if ($data['lbp_yr'] === null) { $data['lbp_yr'] = date('Y'); }
            
            $data['LIST'] = $this->lbp_model->readLBPList($data['lbp_yr']); //LBP_MODEL
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }

        public function Lbp1() // GET LBP 1
        {
            $data['highlights'] = 'lbp';
            $data['dept'] = "Consolidated LBP 1";
            $data['content'] = 'Pages/Budget_officer_view/Lbp1_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['year'] = $this->input->post('year');
			$data['exps'] = $this->exp_model->readExpenditure();
            $data['lbp_exp'] = $this->lbp_model->readLBP2_exp($data['year']);

            $data['mayor'] = $this->ui_model->getMayor();
            $data['budgetHead'] = $this->ui_model->getBudgetHead();

			$this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }

        public function printLBP1()
        {
            $data['highlights'] = 'lbp';
            $data['dept'] = "Consolidated LBP 1";
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['year'] = $this->input->post('year');
			$data['exps'] = $this->exp_model->readExpenditure();
            $data['lbp_exp'] = $this->lbp_model->readLBP2_exp($data['year']);
            $data['prev_year'] = $this->lbp_model->readLBP2_exp(($data['year']-1));
            $data['next_year'] = $this->lbp_model->readLBP2_exp(($data['year']+1));
            
			$this->load->view('Pages/budget_officer_view/deskapp/head', $data);
			$this->load->view('Pages/budget_officer_view/printLBP1View', $data);
			$this->load->view('Pages/budget_officer_view/deskapp/script', $data);
        }

        public function printLBP2($Lbp_id)
        {
            $data['highlights'] = 'lbp';
            $data['content'] = 'Pages/Budget_officer_view/Lbp2_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['Lbp2_det'] = $this->lbp_model->readLbp($Lbp_id);
            $data['Lbp_exps'] = $this->lbp_model->readLbp2($Lbp_id);
            $Exp_id = "";
            foreach ($data['Lbp_exps'] as $ids) { $Exp_id = $Exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $Exps_id = substr_replace($Exp_id ,"",-1);

            $data['Exps'] = $this->exp_model->readExps($Exps_id);
            $data['Exp_classes'] = $this->exp_class_model->readExpClasses($Exps_id);

            $data['mayor'] = $this->ui_model->getMayor();
            $data['budgetHead'] = $this->ui_model->getBudgetHead();
            
            
			$this->load->view('Pages/budget_officer_view/deskapp/head', $data);
			$this->load->view('Pages/budget_officer_view/printLBP2View', $data);
			$this->load->view('Pages/budget_officer_view/deskapp/script', $data);
        }

        public function Lbp2($Lbp_id) // GET LBP 2
        {
            $data['highlights'] = 'lbp';
            $data['content'] = 'Pages/Budget_officer_view/Lbp2_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['Lbp2_det'] = $this->lbp_model->readLbp($Lbp_id);
            $data['Lbp_exps'] = $this->lbp_model->readLbp2($Lbp_id);
            $Exp_id = "";
            foreach ($data['Lbp_exps'] as $ids) { $Exp_id = $Exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; }
            $Exps_id = substr_replace($Exp_id ,"",-1);

            $data['Exps'] = $this->exp_model->readExps($Exps_id);
            $data['Exp_classes'] = $this->exp_class_model->readExpClasses($Exps_id);

            $data['mayor'] = $this->ui_model->getMayor();
            $data['budgetHead'] = $this->ui_model->getBudgetHead();
            
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }

        public function Lbp2_approve($Lbp_id)
        {
            $this->lbp_model->updateLbp2();
            $this->lbp_model->updateLbp2_stat($Lbp_id);
            redirect('Budget_officer/Lbp/Lbp2/'.$Lbp_id);       
        }

    }
    
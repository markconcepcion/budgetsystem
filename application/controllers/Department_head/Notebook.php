<?php
    class Notebook extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "DEPARTMENT HEAD") {
                redirect('Login/Logout');
            }
        }

        public function index()
		{
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['bhprofile'] = $this->ui_model->getBH();

            //GETTING EXPENDITURE AND EXPEDITURES CLASS IN THE LBP2
            $currYr = $this->input->post('currYr'); // GET YEAR FROM INPUT
            if($currYr === NULL){ $currYr = date('Y'); } // SET YEAR TP CURRENT YEAR IF NULL
            $Lbp_id = $this->lbp_model->readLbp2_id($this->session->userdata('dept'), $currYr); //GET LBP2 ID

            if ($Lbp_id > 0) {
                $data['Lbp_exps'] = $this->lbp_model->readLbp2($Lbp_id); // GET EXPENDITURES USING LBP2 ID
                $Exp_id = ""; // SET A NULL VALUE
                foreach ($data['Lbp_exps'] as $ids) { $Exp_id = $Exp_id.$ids['EXPENDITURE_EXPENDITURE_id'].','; } // COMPILE ALL EXP ID THAT CORRESPONDS WITH LBP_EXP
                $Exps_id = substr_replace($Exp_id ,"",-1); // REMOVE LAST COMMNA 
                $data['Exp_classes'] = $this->exp_class_model->readExpClasses($Exps_id); //USE COMPLIDE IDS TO GET EXPENDITURES CLASS
                $data['Exps'] = $this->exp_model->readExps($Exps_id); //USE COMPLIDE IDS TO GET EXPENDITURES CLASS

                $data['content'] = "Pages/Department_head_view/Notebook_view";
                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            } else {
                $data['message'] = "You still haven't submitted an LBP Proposal or<br>Your proposed budget is still pending.";
                $data['content'] = "Pages/blank_view";
                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            }
        }
        
        public function Notebook_Exp($d_code)
		{
            $data['content'] = "Pages/Department_head_view/Notebook_exp_view";
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['bhprofile'] = $this->ui_model->getBH();

            //GETTING EXPENDITURE AND EXPEDITURES CLASS IN THE LBP2
            $currYr = $this->input->post('currYr'); // GET YEAR FROM INPUT
            if($currYr === NULL){ $currYr = date('Y'); } // SET YEAR TP CURRENT YEAR IF NULL
            $Lbp_id = $this->lbp_model->readLbp2_id($this->session->userdata('dept'), $currYr); //GET LBP2 ID
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
            $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
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
    
<?php
    class Obligation_request extends CI_Controller
    {
        function __construct() {
            parent::__construct();

            if(!$this->session->userdata('logged_in')) {
				Redirect('Login');
            } 
        }
        
        public function index() {   
            $data['content'] = 'Pages/Budget_officer_view/ObligationRequest_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['obr_list'] = $this->obr_model->readOBRs(($this->session->userdata('level')));
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }
        
        public function obr_details_view($obr_id)
        {  
            $data['content'] = 'Pages/Budget_officer_view/ObligationRequest_details';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['dept_code'] = $this->input->post('dept');

            $lbp_id = $this->lbp_model->readLbp2_id($data['dept_code'], $this->input->post('year'));

            $data['minus_allot'] = $this->exp_model->total_actualRel();
            $data['obr_details'] = $this->obr_model->readOBR($obr_id);
            $data['obr_exp_details'] = $this->obr_model->readOBRexp_id($obr_id);
            $data['obr_no'] = $this->getNO($this->obr_model->readMax_ObrNo($this->session->userdata('id')));
            $data['mbo_no'] = $this->getNO($this->mbo_model->readMax_MBO($this->session->userdata('id')));
            $data['amt_approp'] = $this->lbp_model->read_AmtApprop($lbp_id, $this->input->post('year'));
            $data['quarter'] = $this->getQuarter(date('m'));

            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }

        public function pass_OBR() {
            if ($this->input->post('status') === "accept") {
                $notebook_id = $this->controlnb_model->getNotebook_id();

                $this->exp_model->categorizePart();
                $this->obr_model->reviewOBR();
                $this->mbo_model->createMBO($notebook_id);

                redirect('Budget_officer/Obligation_request');
            } else {
                $this->exp_model->categorizePart();
                $this->obr_model->reject($this->input->post('obr_id'));
                redirect('Budget_officer/Obligation_request');
            }
        }

        // MACRO FUNCTIONS
        function getNO($n){
            if ($n < 1) {
                if ($this->session->userdata('id') <= 15000) {
                    $n = 0001; return $n;
                } else { 
                    $n = 5001; return $n;
                }
            } else {
                $n++; return $n;
            }
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
<?php
    class Home extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "BUDGET HEAD") {
                redirect('Login/Logout');
            }
        }

        public function index() {
            $data['highlights'] = 'home';
		    $data['content'] = 'Pages/Budget_head_view/Home_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            
            $data['obrs'] = $this->obr_model->readOBRs("BUDGET HEAD", "DESC");
            $data['lbps'] = $this->lbp_model->readLbp_proposed((date('Y')+1));
            $obr_id = ""; // SET A NULL VALUE
            foreach ($data['obrs'] as $ids) { $obr_id = $obr_id.$ids['OBR_ID'].','; } // COMPILE ALL EXP ID THAT CORRESPONDS WITH LBP_EXP
            $obr_ids = substr_replace($obr_id ,"",-1); // REMOVE LAST COMMNA 
            if ($obr_ids == null) {
                $obr_ids = 0;
            }
            $data['obr_mbo'] = $this->mbo_model->readMBOs($obr_ids); 

            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }
        
        public function temp()
        {
            $sting = "12,10,13";
            $pts = explode(',', $sting);
            $parts = $pts[0] + $pts[1];
            $parts2 = $pts[0] + 2;
            echo $parts.' '.$parts2;  
            // $data['content'] = 'Pages/Budget_head_view/temp';
            // $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            // $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }
    }
    
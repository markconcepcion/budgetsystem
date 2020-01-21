<?php
    class Home extends CI_Controller
    {
        function __construct() {
            parent::__construct();
	        if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            }else if($this->session->userdata('roleCode') != 2) {
                redirect('Login/Logout');
            }
            $this->ui_model->clear_fcache($this->session->userdata('id'));
        }

        public function index()
        {
            $data['highlights'] = 'home';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['content'] = 'Pages/Budget_officer_view/Homepage_view';
            
            $data['obrs'] = $this->obr_model->readOBRs($this->session->userdata('level'), "DESC", date('Y'));
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }
    }
    
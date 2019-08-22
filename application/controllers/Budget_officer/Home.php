<?php
    class Home extends CI_Controller
    {
        function __construct() {
            parent::__construct();
	        if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            }
        }

        public function index()
        {
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
		    $data['content'] = 'Pages/Budget_officer_view/Homepage_view';
            $data['obrs'] = $this->ui_model->submitted_obrNotif(date('d'));
            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
        }
    }
    
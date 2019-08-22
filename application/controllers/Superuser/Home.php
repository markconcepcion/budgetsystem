<?php
    class Home extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "SUPERUSER") {
                redirect('Login/Logout');
            }
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
        }

        public function index()
        {
		    $data['content'] = 'Pages/Superuser_view/Homepage';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Superuser_view/deskapp/layout', $data);
        }
    }
    
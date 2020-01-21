<?php
    class Home extends CI_Controller
    { //temp
        function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('roleCode') != 0 && $this->session->userdata('roleCode') != 3) {
                redirect('Login/Logout');
            }
        }
        
        public function index($date = false)
        {
            $data['highlights'] = 'Home';
            $data['content'] = 'Pages/Superuser_view/Homepage';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            
            if($date === false){
                $date = date('Y-m-d');
            }

            $data['logs'] = $this->log_model->readLogs($date);
            $this->load->view('Pages/Superuser_view/deskapp/layout', $data);
        }
    }
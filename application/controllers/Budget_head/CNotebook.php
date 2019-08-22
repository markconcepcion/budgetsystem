<?php
	class CNotebook extends CI_Controller {
        
        //parent function
        function __construct() {
			parent::__construct();
			if(!$this->session->userdata('logged_in')) {
				$this->load->view('Pages/Login');
			} else if($this->session->userdata('level') != "BUDGET HEAD") {
                redirect('Login/Logout');
            }
	    }

        //index function
		public function index() {
			$data['content'] = "Pages/Budget_head_view/Notebook";
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$data['checkNotebook'] = $this->controlnb_model->readControlNotebook(date('Y'));
			$data['ntb_list'] = $this->controlnb_model->readControlNotebook();

            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
		}

        //Add Notebook
		public function addNotebooks()
		{
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$dpts = $this->dept_model->readDept();
			$this->controlnb_model->createNotebooks($dpts);
			redirect('ControlNotebook');
		}
	}
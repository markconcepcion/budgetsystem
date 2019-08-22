<?php
	class ControlNotebook extends CI_Controller {
		function __construct() {
			parent::__construct();
			
			if(!$this->session->userdata('logged_in')) {
				$this->load->view('Pages/Login');
			}
	    }

		public function index() {
			$data['content'] = "Pages/Budget_officer_view/ControlNotebook_view";
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$data['checkNotebook'] = $this->controlnb_model->readControlNotebook(date('Y'));
			$data['ntb_list'] = $this->controlnb_model->readControlNotebook();

            $this->load->view('Pages/Budget_officer_view/deskapp/layout', $data);
		}


		public function addNotebooks()
		{
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
			$dpts = $this->dept_model->readDept();
			$this->controlnb_model->createNotebooks($dpts);
			redirect('ControlNotebook');
		}
	}
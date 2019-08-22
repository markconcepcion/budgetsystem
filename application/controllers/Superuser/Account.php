<?php
    class Account extends CI_Controller
    {
        function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "SUPERUSER") {
                redirect('Login/Logout');
            }
        }
        
        public function index()
        {
            $data['content'] = 'Pages/Superuser_view/Account';
            $data['acc_list'] = $this->user_model->fetchUsers();
            $data['bhprofile'] = $this->user_model->fetchBH();
            $data['dept_list'] = $this->dept_model->readDept();
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $this->load->view('Pages/Superuser_view/deskapp/layout', $data);
        }

        public function addAccount()
        {
            $this->form_validation->set_rules('fname', 'Name', 'required');
            $this->form_validation->set_rules('mname', 'Name', 'required');
            $this->form_validation->set_rules('lname', 'Name', 'required');
            $this->form_validation->set_rules('uname', 'Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('upost', 'Position', 'required');
            $this->form_validation->set_rules('udept', 'Department', 'required');

            $validate = $this->user_model->ifExist($this->input->post('udept'), $this->input->post('upost'), 1);
			
            if($this->form_validation->run() === FALSE){
                $this->session->set_flashdata('edit_failed', 'Error! Incomplete Data.');
				redirect('Superuser/Account');
			} else if ($this->input->post('upost') === "DEPARTMENT HEAD") {
                if ($validate->num_rows() > 0) {
                    $this->session->set_flashdata('edit_failed', 'Error! Department Head Already Exists.');
                    redirect('Superuser/Account');
                } else {
                    $this->user_model->createUser($this->input->post('upost'));
                    $this->session->set_flashdata('edit_success', 'Success! A Department Head Account has been created.');
                    redirect('Superuser/Account');
                }
			} else {
                if ($this->input->post('upost') === "BUDGET HEAD") {
                    if ($validate->num_rows() > 0) {
                        $this->session->set_flashdata('edit_failed', 'Error! Budget Head Already Exists.');
                        redirect('Superuser/Account');
                    } else {
                        $this->user_model->createUser($this->input->post('upost'));
                        $this->user_model->createUser("DEPARTMENT HEAD");
                        $this->session->set_flashdata('edit_success', 'Success! A Budget Head Account has been created.');
                        redirect('Superuser/Account');
                    }
                } else {
                    $bo_val = $this->user_model->ifExist($this->input->post('udept'), $this->input->post('upost'), 2);
                    if ($bo_val->num_rows() > 0) {
                        $this->session->set_flashdata('edit_failed', 'Error! The Maximum Number for Budget Officers are Reached.');
                        redirect('Superuser/Account');
                    } else {
                        $this->user_model->createUser($this->input->post('upost'));
                        $this->session->set_flashdata('edit_success', 'Success! A Budget Officer Account has been created.');
                        redirect('Superuser/Account');
                    }
                }
            }
        }

        public function de_acct($id){
            $this->user_model->deactivate($id);
			$this->session->set_flashdata('edit_success', 'Success! The account has been deactivated');
			redirect('Superuser/Account');
        }
    }
    
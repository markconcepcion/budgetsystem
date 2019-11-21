<?php
    class Expenditure extends CI_Controller
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
            $data['content'] = 'Pages/Superuser_view/Expenditure';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $minClass = $this->exp_class_model->getMin_Class();
            $data['exp_class'] = $this->exp_class_model->readExpClass($minClass);
            $data['exp_classes'] = $this->exp_class_model->readExpClass();
            $data['exp'] = $this->exp_class_model->readExp();

            $this->load->view('Pages/Superuser_view/deskapp/layout', $data);
        }

        public function addExp()
        {
            $this->form_validation->set_rules('code1', 'Account Code', 'required');
            $this->form_validation->set_rules('code2', 'Account Code', 'required');
            $this->form_validation->set_rules('code3', 'Account Code', 'required');
            $this->form_validation->set_rules('code4', 'Account Code', 'required');
            $this->form_validation->set_rules('part_name', 'Particular Name', 'required');
            $this->form_validation->set_rules('part_class', 'Expenditure Class Name', 'required');
            
            $part_code = $this->input->post('code1').'-'.$this->input->post('code2').'-'.$this->input->post('code3').'-'.$this->input->post('code4');
            

            if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('edit_success', 'Error! Incomplete Data');
                redirect('Superuser/Expenditure');
            } else{
                $this->exp_model->createParticular($part_code);
				$this->session->set_flashdata('edit_success', 'Expenditure added successfully.');
                redirect('Superuser/Expenditure');
			}
        }
        
        public function AddExpClass()
        {
            $this->form_validation->set_rules('class_name', 'Expenditure Class Name', 'required');
            
            if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('edit_success', 'Error! Incomplete Data');
				redirect('Main/Database_view');
			} else{
		    	$this->exp_class_model->createExpClass();
				$this->session->set_flashdata('edit_success', 'Success! An Expenditure Class has been added');
                redirect('Superuser/Expenditure');
			}
        }

        public function editExpenditure()
        {
            $expenditureAcctCode = $this->input->post('accountCode1').'-'.$this->input->post('accountCode2').'-'.$this->input->post('accountCode3').'-'.$this->input->post('accountCode4');

            $this->exp_model->updateExpenditure($expenditureAcctCode);
            $this->session->set_flashdata('edit_success', 'Updated Successfully!');
            redirect('Superuser/Expenditure');
            
        }

        public function editExpenditureClass()
        {
            $this->exp_class_model->updateExpClass();
            $this->session->set_flashdata('edit_success', 'Updated Successfully!');
            redirect('Superuser/Expenditure');
        }
    }
    
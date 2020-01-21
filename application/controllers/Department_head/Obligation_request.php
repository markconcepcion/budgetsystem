<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Obligation_request extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('roleCode') != 1 && $this->session->userdata('roleCode') != 3) {
                redirect('Login/Logout');
            }
            date_default_timezone_set('Asia/Manila');
        }

        public function index()
        {
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['highlights'] = 'obr';
            $Lbp2 = $this->lbp_model->readLbp2_id($this->session->userdata('dept'), date('Y'), "FINALIZED");
                
            if ($Lbp2 > 0) {
                $data['deptDetails'] = $this->dept_model->readDept($this->session->userdata('dept'));
                $data['mayor'] = $this->user_model->getUsrD(1011, 2)->row_array();            
                $data['bhead'] = $this->user_model->getUsrD(1071, 5)->row_array();            
                $data['content'] = 'Pages/Department_head_view/Obr_view';
                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            } else {
                $data['message'] = "Your Department doesn't have an allocated budget for this year.";
                $data['content'] = "Pages/blank_view";
                $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
            }
        }

        public function submitOBR()
        {  
            $temp = $this->input->post('obr_amount');
            $part_amount = str_replace(',', '', $temp);

            if($part_amount < 1) {
                $this->session->set_flashdata('edit_failed', 'Amount must not be zero!');
                redirect('Department_head/Obligation_request');
            }

            $preparedBy = $this->input->post('preparedBy');
            $reviewedBy = $this->input->post('reviewedBy');
            $approvedBy = $this->input->post('approvedBy');

            $signID = $this->sign_model->readSignature($preparedBy, $reviewedBy, $approvedBy);
            if($signID == 0){
                $signID = $this->sign_model->createSignature();
            }

            $obr_id = $this->obr_model->readMaxObrID()+1;
            $lb_id = $this->logbook_model->readLogbook(date("Y"));
            
            $this->obr_model->createOBR($obr_id, $lb_id['LB_ID'], $signID);
            $this->obr_model->createOBR_Expenditure($obr_id, $part_amount);

            //log transac
            $transac = "SUBMIT OBR";
            $this->log_model->log($this->session->userdata('userID'), $transac);

            $this->session->set_flashdata('edit_success', 'OBR submitted successfully!');
            redirect('Department_head/Obligation_request');
        }
    }
<?php
    class Login extends CI_Controller
    {
        function __construct() {
            parent::__construct();
        }

        public function index()
        {
            date_default_timezone_set('Asia/Manila');

            if($this->session->userdata('logged_in')) {
                if ($this->session->userdata('level') === "BUDGET HEAD") {
				    redirect('Budget_head/Home');
                } elseif ($this->session->userdata('level') === "SUPERUSER") {
				    redirect('Superuser/Home');
                } elseif ($this->session->userdata('level') === "DEPARTMENT HEAD") {
				    redirect('Department_head/Home');
                } else {
				    redirect('Budget_officer/Home');
                }
            }
            
            //ADD NOTEBOOK FOR NEW YEAR
            $ifTrue = $this->controlnb_model->read_ifExist();
            if ($ifTrue == null) {
                $deptIDs = $this->dept_model->read_deptIDs();
                $this->controlnb_model->createNotebooks($deptIDs);
            }

            //ADD LOGBOOK FOR NEW YEAR
            if ($this->logbook_model->readLogbook(date('Y')) == null ) {
                $this->logbook_model->createLogbook(date('Y'));
            }

            //ADD ASSIGNATION IF NONE
            if ($this->sign_model->read_signature_id(1) == null ) {
                $this->sign_model->create_initial_signature("Department Head", "Budget Head", "Municipal Mayor");
            }
            
            $this->load->view('Pages/Login');
        }

        public function login()
		{
		    $username = $this->input->post('Username', TRUE);
            $password = $this->input->post('Password', TRUE);
            
			$validate = $this->user_model->validate($username, $password);
            
		    if($validate->num_rows() > 0) {
		        $data  = $validate->row_array();
				$user_id = $data['USR_ID'];
		        $name  = $data['USR_FNAME'].' '.$data['USR_MNAME'].' '.$data['USR_LNAME'];
		        $dept  = $data['DPT_ID'];
				$level = $data['USR_POST'];
				$userID = $data['id'];
				$roleID = $data['role_id'];
				$roleCode = $data['role_code'];

		        $sesdata = array(
                    'id' => $user_id,
                    'userID' => $userID,
		            'roleID' => $roleID,
		            'roleCode' => $roleCode,
		            'user_name'  => $name,
		            'dept'     => $dept,
		            'level'     => $level,
		            'logged_in' => TRUE
                );
                
		        $this->session->set_userdata($sesdata);
                $this->session->set_flashdata('edit_success', 'Welcome, '.$this->session->userdata('user_name'));

                //log transac
                $transac = "LOGGED IN";
                $this->log_model->log($this->session->userdata('userID'), $transac);
                if ($this->session->userdata('roleCode') == 3) {
				    redirect('BH');
                } elseif ($this->session->userdata('roleCode') == 0) {
				    redirect('Superuser/Home');
                } elseif ($this->session->userdata('roleCode') == 1) {
				    redirect('DH');
                } else {
				    redirect('BO');
                }
		    } else {
                $this->session->set_flashdata('edit_failed', 'Invalid Username or Password');
		        redirect('Login');
		    }
		}

        public function Logout()
        {
            //log transac
            $transac = "LOGGED OUT";
            $this->log_model->log($this->session->userdata('userID'), $transac);
            $this->session->sess_destroy();
	        redirect('Login');
        }
    }
    

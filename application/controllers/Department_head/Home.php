<?php
    class Home extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "DEPARTMENT HEAD") {
                redirect('Login/Logout');
            }
        }

        public function index()
        {
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $data['bhprofile'] = $this->ui_model->getBH();
		    $data['content'] = 'Pages/Department_head_view/Homepage_view';
            $data['APPROVED'] = 0; $data['ON_PROCESS'] = 0; $data['PENDING'] = 0; $data['REJECT'] = 0;
            $data['obrs'] = $this->ui_model->obrNotif($this->session->userdata('dept'));

            foreach ($data['obrs'] as $value) {
                if($value['OBR_STATUS'] === "APPROVED") { $data['APPROVED'] += 1; }
                    elseif($value['OBR_STATUS'] === "ON PROCESS") { $data['ON_PROCESS'] += 1; }
                        elseif($value['OBR_STATUS'] === "PENDING") { $data['PENDING'] += 1; }
                            else { $data['REJECT'] += 1; }
            }

            $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
        }
    }
    
<?php
    class Home extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('level') != "DEPARTMENT HEAD" 
                    && $this->session->userdata('level') != "BH_DEPTHEAD") {
                redirect('Login/Logout');
            }
        }

        public function index()
        {
            $deptID = $this->session->userdata('dept');

            $data['bhprofile'] = $this->ui_model->getBH();
            // $data['obrs'] = $this->ui_model->obrNotif($this->session->userdata('dept'));

            // foreach ($data['obrs'] as $value) {
            //     if($value['OBR_STATUS'] === "APPROVED") { $data['APPROVED'] += 1; }
            //         elseif($value['OBR_STATUS'] === "CHECKED") { $data['CHECKED'] += 1; }
            //             elseif($value['OBR_STATUS'] === "PENDING") { $data['PENDING'] += 1; }
            //                 else { $data['DECLINED'] += 1; }
            // }

            $data['obrPending'] = $this->ui_model->getObr_dept($deptID, "PENDING", date('Y'));
            $data['obrChecked'] = $this->ui_model->getObr_dept($deptID, "CHECKED", date('Y'));
            $data['obrApproved'] = $this->ui_model->getObr_dept($deptID, "APPROVED", date('Y'));
            $data['obrRejected'] = $this->ui_model->getObr_dept($deptID, "DECLINED", date('Y'));

            $data['APPROVED'] = count($data['obrApproved']); 
            $data['CHECKED'] = count($data['obrChecked']); 
            $data['PENDING'] = count($data['obrPending']); 
            $data['DECLINED'] = count($data['obrRejected']);

            $data['highlights'] = 'home';
		    $data['content'] = 'Pages/Department_head_view/Homepage_view';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            $this->load->view('Pages/Department_head_view/deskapp/layout', $data);
        }
    }
    
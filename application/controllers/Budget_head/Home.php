<?php
    class Home extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('logged_in')) {
				redirect('Login');
            } else if($this->session->userdata('roleID') < 5) {
                redirect('Login/Logout');
            }            
            date_default_timezone_set('Asia/Manila');
        }

        public function index()
        {
            $data['highlights'] = 'home';
		    $data['content'] = 'Pages/Budget_head_view/home';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            //CATEGORIES::DEPARTMENTS
            $data['categories'] = $this->chart_model->get_dept_category();
            
            //SERIES:: NAME:EXP_CLASS+GRANDTOTAL && DATA:(EXP_AMT-PART_AMT)+TOTAL 
            $data['name'] = $this->chart_model->read_name();
            foreach ($data['name'] as $name) {
                $series[] = array
                (
                    'name' => $name['EXPCLASS_NAME'],
                    'data' => $this->chart_model->get_rembal($name['EXPCLASS_ID'], date('Y'))
                );
            } $series[] = array(
                'name' => "Grand Total", 
                'data' => $this->chart_model->get_grand_total(date('Y'))
            );

            //ADDING AUGMENTATION
            $data['exps'] = $this->chart_model->read_expenditures();
            $data['depts'] = $this->chart_model->get_dept_category(date('Y'));
            
            //COMPILE
            $data['series'] = json_encode($series);
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        public function augmentation()
        {
            $temp = $this->input->post('amount');
            $limit = $this->input->post('limit_amt');
            $amount = str_replace(',', '', $temp);

            if($amount < 1){
                $this->session->set_flashdata('edit_failed', 'Amount can not be zero!');
                redirect('BH');
            }

            if($amount > $limit){
                $this->session->set_flashdata('edit_failed', 'Amount exceeds the remaining budget!');
                redirect('BH');
            }

            if (count($this->chart_model->read_expediture_ifExist($this->input->post('dept_id'), $this->input->post('exp_id'), date('Y'))) < 1) {
                $this->session->set_flashdata('edit_failed', "Expenditure don't exist in lbp this year!");
                redirect('BH');
            } 

            $this->chart_model->create_augmentation($amount);
            $this->session->set_flashdata('edit_success', 'Augmented Successfully!');
            redirect('BH');
        }
        
        public function view_augmentations()
        {
            $data['highlights'] = 'home';
            $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));

            $data['augmentations'] = $this->chart_model->read_augmentations();
		    $data['content'] = 'Pages/Budget_head_view/view_augmentations';
            $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        }

        public function get_augment_amount($classID, $deptID)
        {
            echo $this->chart_model->read_augmentedAmount(date('Y'), $classID, $deptID);
        }
    }
        
        
        
        
        
        
        
        // $first =  str_replace(array('[', ']'), '', htmlspecialchars(json_encode(array($bal_data),JSON_NUMERIC_CHECK), ENT_NOQUOTES));
        // public function tempo() {
        //     $data['highlights'] = 'home';
		//     $data['content'] = 'Pages/Budget_head_view/home';
        //     $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
            
        //     $data['obrs'] = $this->obr_model->readOBRs("BUDGET HEAD", "DESC");
        //     $data['lbps'] = $this->lbp_model->readLbp_proposed((date('Y')+1));
        //     $obr_id = ""; // SET A NULL VALUE
        //     foreach ($data['obrs'] as $ids) { $obr_id = $obr_id.$ids['OBR_ID'].','; } // COMPILE ALL EXP ID THAT CORRESPONDS WITH LBP_EXP
        //     $obr_ids = substr_replace($obr_id ,"",-1); // REMOVE LAST COMMNA 
        //     if ($obr_ids == null) {
        //         $obr_ids = 0;
        //     }
        //     $data['obr_mbo'] = $this->mbo_model->readMBOs($obr_ids); 
        //     $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        // }
        
        // public function temp()
        // {
        //     $sting = "12,10,13";
        //     $pts = explode(',', $sting);
        //     $parts = $pts[0] + $pts[1];
        //     $parts2 = $pts[0] + 2;
        //     echo $parts.' '.$parts2;  
        //     // $data['content'] = 'Pages/Budget_head_view/temp';
        //     // $data['uprofile'] = $this->user_model->fetchUsers($this->session->userdata('id'));
        //     // $this->load->view('Pages/Budget_head_view/deskapp/layout', $data);
        // }
    
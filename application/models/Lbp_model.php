<?php
    class Lbp_model extends CI_model
    {
        function __construct(){
            $this->load->database();
        }

// BUDGET HEAD -------- BUDGET HEAD -------- BUDGET HEAD -------- BUDGET HEAD -------- BUDGET HEAD -------- BUDGET HEAD --------BUDGET HEAD -------- BUDGET HEAD --------
        
        public function readLBPList($yr)
        { // Lbp/Lbp = GET LIST OF LBP BY YEAR
            $query = $this->db->query("SELECT * FROM department
                JOIN user ON user.DEPARTMENT_DPT_ID=department.DPT_ID
                JOIN lbp_form ON lbp_form.USER_USR_ID=user.USR_ID
                WHERE USR_POST != 'SUPERUSER' AND NOT USR_POST LIKE '%BUDGET%'  
                AND USR_STATUS = 'ACTIVE'
                AND DPT_STATUS = 'ACTIVE'
                AND FRM_YEAR = $yr");

            return $query->result_array();
        }

        public function readLbp_proposed($yr)
        {
            $query = $this->db->query("SELECT * FROM lbp_form
                JOIN user ON user.USR_ID=lbp_form.USER_USR_ID
                JOIN department ON department.DPT_ID=user.DEPARTMENT_DPT_ID
                WHERE FRM_STATUS = 'PROPOSED' AND FRM_YEAR = $yr");
            return $query->result_array();
        }

        public function readLbpyrs()
        { // Lbp/Lbp = GET YEARS OF ALL LBP
            $query = $this->db->query("SELECT DISTINCT FRM_YEAR FROM lbp_form");
            return $query->result_array();
        }

        public function readLbp($Lbp_id)
        { // Lbp/Lbp2 = get LBP2 details (dept-lbp) by it's id
                $query = $this->db->query("SELECT * FROM department
                JOIN user ON user.DEPARTMENT_DPT_ID=department.DPT_ID
                JOIN lbp_form ON lbp_form.USER_USR_ID=user.USR_ID
                WHERE FRM_ID = $Lbp_id");
            return $query->row_array();
        }

        public function readLBP1($yr)
        { // GET LBP1 BY YEAR
            $query = $this->db->query("SELECT * from lbp_form
                where FRM_YEAR = $yr");
            return $query->result_array();
        }

        public function readLbp2($Lbp_id)
        { // Lbp/Lbp2 = get LBP2 allocated amount for expenditures (lbp_exp-lbp_form) by it's id
            $query = $this->db->query("SELECT * FROM lbp_expenditure
                LEFT JOIN lbp_form ON lbp_form.FRM_ID=lbp_expenditure.LBP_FORM_FRM_ID  
                WHERE FRM_ID = $Lbp_id");
            return $query->result_array();
        }

        public function updateLbp2_exps($Lbp_id)
        { // Lbp/updateLbp2 = update LBP2 proposed allocated amount for expenditures (lbp_exp-lbp_form) by it's id - FINALIZATION
            $Exp_id = $this->input->post('Exp_id[]');
            $Exp_amt = $this->input->post('Exp_amt[]');
            $Lbp_exp_id = $this->input->post('Lbp_exp_id[]');

            for ($i=0; $i < count($Exp_amt); $i++) {
                $data = array();
                if ($Exp_id[$i] != null && $Exp_amt[$i] != null && $Lbp_exp_id[$i] != null) {
                    $data = array(
                        'LBP_EXP_AMOUNT' => $Exp_amt[$i]
                    );
                    $this->db->where('LBP_EXP_ID', $Lbp_exp_id[$i]);
                    $this->db->where('EXPENDITURE_EXPENDITURE_id', $Exp_id[$i]);
                    $this->db->where('LBP_FORM_FRM_ID', $Lbp_id);
                    $this->db->update('lbp_expenditure', $data);
                } 
            } return true;
        }

        public function updateLbp2()
        { // Lbp/updateLbp2 = update LBP2 proposed allocated amount for expenditures (lbp_exp-lbp_form) by it's id - FINALIZATION
            $Exp_id = $this->input->post('Exp_id[]');
            $Exp_amt = $this->input->post('Exp_amt[]');
            $Lbp_exp_id = $this->input->post('Lbp_exp_id[]');
            $data = array();

            for ($i=0; $i < count($Exp_amt); $i++) {
                if ($Exp_id[$i] != null && $Exp_amt[$i] != null && $Lbp_exp_id[$i] != null) {
                    $data[] = array(
                        'LBP_EXP_ID' => $Lbp_exp_id[$i],
                        'LBP_EXP_AMOUNT' => $Exp_amt[$i],
                        'EXPENDITURE_EXPENDITURE_id' => $Exp_id[$i]
                    );
                }
            } $query = $this->db->update_batch('lbp_expenditure',$data,'LBP_EXP_ID');
        }

        public function updateLbp2_stat($Lbp_id)
        { // Lbp/updateLbp2 = approve LBP2 proposed allocated amount for expenditures (lbp_exp-lbp_form) by it's id - FINALIZATION
            $data = array( 'FRM_STATUS' => "FINALIZED" );
            $this->db->where('FRM_ID', $Lbp_id);
            return $this->db->update('lbp_form', $data);
        }











// DEPARTMENT HEAD ------------ DEPARTMENT HEAD ------------ DEPARTMENT HEAD ------------ DEPARTMENT HEAD ------------ DEPARTMENT HEAD ------------ DEPARTMENT HEAD ------------ DEPARTMENT HEAD ------------ DEPARTMENT HEAD ------------ 
        
        public function createLbp2($lbp_id, $no)
        {
            $data = array(
                'FRM_ID' => $lbp_id,
                'FRM_NO' => $no,
                'FRM_YEAR' => $this->input->post('nxtYr'),
                'USER_USR_ID' => $this->session->userdata('id')
            );
            return $this->db->insert('lbp_form', $data);
        }

        public function createLbp2_exps($lbp_id)
        {
            $Exps_id = $this->input->post('Exps_id[]');
            $Exps_amt = $this->input->post('Exps_amt[]');
            $data = array();
 
            for ($i=0; $i < count($Exps_amt); $i++) {
                if ($Exps_id[$i] != null && $Exps_amt[$i] != null) {
                    $data[] = array(
                        'EXPENDITURE_EXPENDITURE_id' => $Exps_id[$i],
                        'LBP_FORM_FRM_ID' => $lbp_id,
                        'LBP_EXP_AMOUNT' => $Exps_amt[$i]
                    );
                }
            } $this->db->insert_batch('lbp_expenditure', $data);
        }

        public function readMaxId()
        {
            $this->db->select('MAX(FRM_ID) as FRM_ID');
            $this->db->from('LBP_FORM');
            $query = $this->db->get();
            return $query->row()->FRM_ID ?? 0;
        }

        public function readLbp2_id($Dpt_id, $Yr, $status = FALSE)
        {
            if ($status === FALSE) {
                $this->db->select('FRM_ID');
                $this->db->from('LBP_FORM');
                $this->db->join('user', 'lbp_form.USER_USR_ID=user.USR_ID');
                $this->db->join('department', 'user.DEPARTMENT_DPT_ID=department.DPT_ID');
                $this->db->where('DPT_ID', $Dpt_id);
                $this->db->where('FRM_YEAR', $Yr);
                $query = $this->db->get();
                return $query->row()->FRM_ID ?? 0;
            }

            $this->db->select('FRM_ID');
            $this->db->from('LBP_FORM');
            $this->db->join('user', 'lbp_form.USER_USR_ID=user.USR_ID');
            $this->db->join('department', 'user.DEPARTMENT_DPT_ID=department.DPT_ID');
            $this->db->where('DPT_ID', $Dpt_id);
            $this->db->where('FRM_YEAR', $Yr);
            $this->db->where('FRM_STATUS', $status);
            $query = $this->db->get();
            return $query->row()->FRM_ID ?? 0;
        }
        
        

       

        // public function updateLBP2($lbp_id)
        // {
        //     $exp_id = $this->input->post('exp_id[]');
        //     $amount = $this->input->post('amount[]');

        //     $data = array();
 
        //     for ($i=0; $i < count($exp_id); $i++) {
        //         if ($exp_id[$i] != null && $amount[$i] != null) {
        //             $data = array(
        //                 'LBP_EXP_AMOUNT' => $amount[$i]
        //             );
        //             $this->db->where('LBP_FORM_FRM_ID', $lbp_id);
        //             $this->db->where('EXPENDITURE_EXPENDITURE_id', $exp_id[$i]);
        //             $this->db->update('lbp_expenditure', $data);
        //         }
        //     }

        //     return true;
        // }
        // $data = array( 'DPT_NAME' => $this->input->post('dept_name') );
		// 	$this->db->where('DPT_ID', $this->input->post('dept_id'));
		// 	return $this->db->update('department', $data);	
        public function read_AmtApprop($lbp_id, $year, $exp_id = FALSE)
        {   
            if($exp_id === FALSE) {
                $this->db->select('EXPENDITURE_id, EXP_NAME, LBP_EXP_AMOUNT');
                $this->db->from('lbp_expenditure');
                $this->db->join('lbp_form', 'lbp_form.FRM_ID=lbp_expenditure.LBP_FORM_FRM_ID', 'INNER');
                $this->db->join('expenditure', 'expenditure.EXPENDITURE_id = lbp_expenditure.EXPENDITURE_EXPENDITURE_id', 'INNER');
                $this->db->join('expenditure_class', 'expenditure_class.EXPCLASS_ID=expenditure.EXPENDITURE_CLASS_EXPCLASS_ID', 'INNER');
                $this->db->where('FRM_YEAR', $year);
                $this->db->where('FRM_ID', $lbp_id);
    
                $query = $this->db->get();
                return $query->result_array();
            }
            
            $this->db->select('EXPENDITURE_id, EXP_NAME, LBP_EXP_AMOUNT');
            $this->db->from('lbp_expenditure');
            $this->db->join('lbp_form', 'lbp_form.FRM_ID=lbp_expenditure.LBP_FORM_FRM_ID', 'INNER');
            $this->db->join('expenditure', 'expenditure.EXPENDITURE_id = lbp_expenditure.EXPENDITURE_EXPENDITURE_id', 'INNER');
            $this->db->join('expenditure_class', 'expenditure_class.EXPCLASS_ID=expenditure.EXPENDITURE_CLASS_EXPCLASS_ID', 'INNER');
            $this->db->where('FRM_YEAR', $year);
            $this->db->where('FRM_ID', $lbp_id);
            $this->db->where('EXPENDITURE_id', $exp_id);

            $query = $this->db->get();
            return $query->row_array();
        }

        public function readLBP2_exp($year, $dept_code = FALSE)
        {   
            if ($dept_code === FALSE) {
                $query = $this->db->query("SELECT expenditure.EXPENDITURE_id, lbp_expenditure.EXPENDITURE_EXPENDITURE_id, expenditure.EXPENDITURE_CLASS_EXPCLASS_ID, SUM(lbp_expenditure.LBP_EXP_AMOUNT) as LBP_EXP_AMOUNT FROM `lbp_expenditure`
                JOIN lbp_form ON lbp_form.FRM_ID=lbp_expenditure.LBP_FORM_FRM_ID
                JOIN user ON user.USR_ID=lbp_form.USER_USR_ID
                JOIN expenditure ON expenditure.EXPENDITURE_id=lbp_expenditure.EXPENDITURE_EXPENDITURE_id
                AND lbp_form.FRM_YEAR = $year
                GROUP BY expenditure.EXPENDITURE_id");

                return $query->result_array();
            }

            $query = $this->db->query("SELECT * FROM `lbp_expenditure`
                JOIN lbp_form ON lbp_form.FRM_ID=lbp_expenditure.LBP_FORM_FRM_ID
                JOIN user ON user.USR_ID=lbp_form.USER_USR_ID
                JOIN expenditure ON expenditure.EXPENDITURE_id=lbp_expenditure.EXPENDITURE_EXPENDITURE_id
                WHERE USER.DEPARTMENT_DPT_ID = $dept_code
                AND lbp_form.FRM_YEAR = $year");

            return $query->result_array();
        }
    }
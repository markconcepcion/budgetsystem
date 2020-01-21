<?php
    class Lbp_model extends CI_model
    {
        function __construct(){
            $this->load->database();
        }

        public function read_lbpstat($id)
        {
            return $this->db->query("SELECT FRM_STATUS FROM LBP_FORM WHERE FRM_ID = $id")->row()->FRM_STATUS;
        }

// BUDGET HEAD -------- BUDGET HEAD -------- BUDGET HEAD -------- BUDGET HEAD -------- BUDGET HEAD -------- BUDGET HEAD --------BUDGET HEAD -------- BUDGET HEAD --------
        public function read_previous_year_actual_expenditure($prev_year)
        {
            return $this->db->query("SELECT p.EXPENDITURE_EXPENDITURE_id, SUM(p.PART_AMOUNT) as PART_AMOUNT FROM particular p
                                    JOIN obligation_request obr ON obr.OBR_ID=p.OBLIGATION_REQUEST_OBR_ID
                                    AND obr.obrNoYear = $prev_year
                                    AND obr.OBR_STATUS = 'APPROVED'
                                    GROUP BY P.EXPENDITURE_EXPENDITURE_id")->result_array();
        }

        public function read_current_year_actual_expenditure($year)
        {
            return $this->db->query("SELECT p.EXPENDITURE_EXPENDITURE_id, SUM(p.PART_AMOUNT) as PART_AMOUNT FROM particular p
                                    JOIN obligation_request obr ON obr.OBR_ID=p.OBLIGATION_REQUEST_OBR_ID
                                    AND obr.obrNoYear = $year
                                    AND obr.OBR_STATUS = 'APPROVED'
                                    AND month(obr.OBR_DATE) < 7
                                    GROUP BY P.EXPENDITURE_EXPENDITURE_id")->result_array();
        }

        public function read_current_year_estimate_expenditure($year)
        {
            $query = $this->db->query("SELECT lbp_exp.*, SUM(lbp_exp.LBP_EXP_AMOUNT) AS EXP_AMOUNT FROM expenditure e
                                    JOIN lbp_expenditure lbp_exp ON lbp_exp.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                                    JOIN lbp_form lbp ON lbp.FRM_ID=lbp_exp.LBP_FORM_FRM_ID
                                    WHERE lbp.FRM_YEAR = $year
                                    AND lbp.FRM_STATUS = 'FINALIZED'
                                    GROUP BY e.EXPENDITURE_id  
                                    ORDER BY e.EXPENDITURE_id ASC");
            return $query->result_array();
        }

        public function read_next_year_estimate_expenditure($year)
        {
            $query = $this->db->query("SELECT lbp_exp.*, SUM(lbp_exp.LBP_EXP_AMOUNT) AS EXP_AMOUNT FROM expenditure e
                                    JOIN lbp_expenditure lbp_exp ON lbp_exp.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                                    JOIN lbp_form lbp ON lbp.FRM_ID=lbp_exp.LBP_FORM_FRM_ID
                                    WHERE lbp.FRM_YEAR = $year
                                    AND lbp.FRM_STATUS = 'FINALIZED'
                                    GROUP BY e.EXPENDITURE_id  
                                    ORDER BY e.EXPENDITURE_id ASC");
            return $query->result_array();
        }


        public function read_previous_year_actual_expenditure_dept($prev_year, $dept_id)
        {
            return $this->db->query("SELECT p.EXPENDITURE_EXPENDITURE_id, SUM(p.PART_AMOUNT) as PART_AMOUNT FROM particular p
                                    JOIN obligation_request obr ON obr.OBR_ID=p.OBLIGATION_REQUEST_OBR_ID
                                    JOIN user u ON u.USR_ID=obr.USER_USR_ID
                                    JOIN dept_user du ON du.USR_ID=u.USR_ID
                                    AND obr.obrNoYear = $prev_year
                                    AND du.DPT_ID = $dept_id
                                    AND obr.OBR_STATUS = 'APPROVED'
                                    GROUP BY P.EXPENDITURE_EXPENDITURE_id")->result_array();
        }

        public function read_current_year_actual_expenditure_dept($year, $dept_id)
        {
            return $this->db->query("SELECT p.EXPENDITURE_EXPENDITURE_id, SUM(p.PART_AMOUNT) as PART_AMOUNT FROM particular p
                                    JOIN obligation_request obr ON obr.OBR_ID=p.OBLIGATION_REQUEST_OBR_ID
                                    JOIN user u ON u.USR_ID=obr.USER_USR_ID
                                    JOIN dept_user du ON du.USR_ID=u.USR_ID
                                    AND obr.obrNoYear = $year
                                    AND du.DPT_ID = $dept_id
                                    AND obr.OBR_STATUS = 'APPROVED'
                                    AND month(obr.OBR_DATE) < 7
                                    GROUP BY P.EXPENDITURE_EXPENDITURE_id")->result_array();
        }

        public function read_current_year_estimate_expenditure_dept($year, $dept_id)
        {
            $query = $this->db->query("SELECT lbp_exp.*, SUM(lbp_exp.LBP_EXP_AMOUNT) AS EXP_AMOUNT FROM expenditure e
                                    JOIN lbp_expenditure lbp_exp ON lbp_exp.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                                    JOIN lbp_form lbp ON lbp.FRM_ID=lbp_exp.LBP_FORM_FRM_ID
                                    JOIN user u ON u.USR_ID=lbp.USER_USR_ID
                                    JOIN dept_user du ON du.USR_ID=u.USR_ID
                                    WHERE lbp.FRM_YEAR = $year
                                    AND du.DPT_ID = $dept_id
                                    AND lbp.FRM_STATUS = 'FINALIZED'
                                    GROUP BY e.EXPENDITURE_id  
                                    ORDER BY e.EXPENDITURE_id ASC");
            return $query->result_array();
        }

        public function read_next_year_estimate_expenditure_dept($year, $dept_id)
        {
            $query = $this->db->query("SELECT lbp_exp.*, SUM(lbp_exp.LBP_EXP_AMOUNT) AS EXP_AMOUNT FROM expenditure e
                                    JOIN lbp_expenditure lbp_exp ON lbp_exp.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                                    JOIN lbp_form lbp ON lbp.FRM_ID=lbp_exp.LBP_FORM_FRM_ID
                                    JOIN user u ON u.USR_ID=lbp.USER_USR_ID
                                    JOIN dept_user du ON du.USR_ID=u.USR_ID
                                    WHERE lbp.FRM_YEAR = $year
                                    AND du.DPT_ID = $dept_id
                                    AND lbp.FRM_STATUS = 'FINALIZED'
                                    GROUP BY e.EXPENDITURE_id  
                                    ORDER BY e.EXPENDITURE_id ASC");
            return $query->result_array();
        }








        public function readLBPList($yr)
        { // Lbp/Lbp = GET LIST OF LBP BY YEAR
            $query = $this->db->query("SELECT * FROM department d
                join dept_user du on du.DPT_ID = d.DPT_ID
                JOIN user u ON u.USR_ID=du.USR_ID
                JOIN lbp_form ON lbp_form.USER_USR_ID=u.USR_ID
                AND DPT_STATUS = 'ACTIVE'
                AND FRM_YEAR = $yr
                group by d.DPT_ID");

            return $query->result_array();
        }

        public function readLbp_proposed($yr)
        {
            $query = $this->db->query("SELECT * FROM lbp_form
                JOIN user u ON u.USR_ID=lbp_form.USER_USR_ID
                JOIN dept_user du ON du.USR_ID=u.USR_ID
                JOIN department d ON d.DPT_ID=du.DPT_ID
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
                JOIN signature ON signature.signID=lbp_form.signID
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
            $query = $this->db->query("SELECT *, (SELECT IFNULL(SUM(amount),0) from augmentation a 
                                                  WHERE a.exp_id = e.EXPENDITURE_id
                                                  AND a.dept_id = u.DEPARTMENT_DPT_ID) AS augment_amt
                FROM lbp_expenditure le
                LEFT JOIN lbp_form lbp ON lbp.FRM_ID=le.LBP_FORM_FRM_ID  
                LEFT JOIN user u ON u.USR_ID=lbp.USER_USR_ID
                LEFT JOIN expenditure e ON e.EXPENDITURE_id=le.EXPENDITURE_EXPENDITURE_id  
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
                        'LBP_EXP_AMOUNT' => str_replace(',', '', $Exp_amt[$i])
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
                        'LBP_EXP_AMOUNT' => str_replace(',', '', $Exp_amt[$i]),
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
        
        public function createLbp2($lbp_id, $no, $signID)
        {
            $data = array(
                'FRM_ID' => $lbp_id,
                'FRM_NO' => $no,
                'FRM_YEAR' => $this->input->post('nxtYr'),
                'USER_USR_ID' => $this->session->userdata('id'),
                'signID' => $signID
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
                        'LBP_EXP_AMOUNT' => str_replace(',', '', $Exps_amt[$i])
                    );
                }
            } $this->db->insert_batch('lbp_expenditure', $data);
        }

        public function addLbp2_exps($lbp_id)
        {
            $Exps_id = $this->input->post('Exps_id[]');
            $data = array();
 
            for ($i=0; $i < count($Exps_id); $i++) {
                if ($Exps_id[$i] != null) {
                    $data[] = array(
                        'EXPENDITURE_EXPENDITURE_id' => $Exps_id[$i],
                        'LBP_FORM_FRM_ID' => $lbp_id,
                        'LBP_EXP_AMOUNT' => 0
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
                $this->db->join('dept_user', 'dept_user.USR_ID=user.USR_ID');
                $this->db->join('department', 'department.DPT_ID=dept_user.DPT_ID');
                $this->db->where('department.DPT_ID', $Dpt_id);
                $this->db->where('FRM_YEAR', $Yr);
                $query = $this->db->get();
                return $query->row()->FRM_ID ?? 0;
            }

            $this->db->select('FRM_ID');
            $this->db->from('LBP_FORM');
            $this->db->join('user', 'lbp_form.USER_USR_ID=user.USR_ID');
            $this->db->join('dept_user', 'dept_user.USR_ID=user.USR_ID');
            $this->db->join('department', 'department.DPT_ID=dept_user.DPT_ID');
            $this->db->where('department.DPT_ID', $Dpt_id);
            $this->db->where('FRM_YEAR', $Yr);
            $this->db->where('FRM_STATUS', $status);
            $query = $this->db->get();
            return $query->row()->FRM_ID ?? 0;
            // $this->db->join('department', 'user.DEPARTMENT_DPT_ID=department.DPT_ID');
        }
        
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

        public function delete_lbp2($lbp_id)
        {
            $this->db->query("DELETE FROM lbp_expenditure WHERE LBP_FORM_FRM_ID = $lbp_id");
            $this->db->query("DELETE FROM lbp_form WHERE FRM_ID = $lbp_id");
            return true;
        }   
    }
<?php
    /**
     * undocumented class
     */
    class Controlnb_model extends CI_model
    {
        function __construct(){
            $this->load->database();
        }

        public function createNotebooks($dpts)
        {
            $cnArray = array();
            foreach ($dpts as $key) {
                $cnArray[] = array(
                    'CTRL_NTB_YEAR' => date('Y'),
                    'DEPARTMENT_DPT_ID' => $key['DPT_ID']
                );
            } return $this->db->insert_batch('control_notebook', $cnArray);
        }

        public function readNotebook($yr, $dpt_id) {
            $query = $this->db->query("SELECT CTRL_NTB_ID FROM control_notebook
                WHERE DEPARTMENT_DPT_ID = $dpt_id AND CTRL_NTB_YEAR = $yr");
            return $query->row()->CTRL_NTB_ID ?? 0;
        }

        public function readNotebook_id($dept_code, $exp, $lbp_id) {
            $this->db->select('*');
            $this->db->from('control_notebook');
            $this->db->join('mbo_control', 'mbo_control.CONTROL_NOTEBOOK_CTRL_NTB_ID=control_notebook.CTRL_NTB_ID', 'LEFT');
            $this->db->join('obligation_request', 'obligation_request.OBR_ID=mbo_control.OBLIGATION_REQUEST_OBR_ID', 'LEFT');
            $this->db->join('particular', 'particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID', 'LEFT');
            $this->db->join('expenditure', 'expenditure.EXPENDITURE_id=particular.EXPENDITURE_EXPENDITURE_id', 'LEFT');
            $this->db->join('lbp_expenditure', 'lbp_expenditure.EXPENDITURE_EXPENDITURE_id=expenditure.EXPENDITURE_id', 'LEFT');
            
            $this->db->where('control_notebook.DEPARTMENT_DPT_ID', $dept_code);
            $this->db->where('particular.EXPENDITURE_EXPENDITURE_id', $exp);
            $this->db->where('control_notebook.CTRL_NTB_YEAR', 2019);
            $this->db->where('lbp_expenditure.LBP_FORM_FRM_ID', $lbp_id);

            $query = $this->db->get();
            return $query->result_array();

            // $query = $this->db->query("SELECT * FROM control_notebook
            // LEFT JOIN mbo_control ON mbo_control.CONTROL_NOTEBOOK_CTRL_NTB_ID=control_notebook.CTRL_NTB_ID
            // LEFT JOIN obligation_request ON obligation_request.OBR_ID=mbo_control.OBLIGATION_REQUEST_OBR_ID
            // LEFT JOIN particular ON particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
            // WHERE control_notebook.CTRL_NTB_ID = $dept_code");

            // return $query->result_array();
        }

        public function readControlNotebook($year = FALSE, $dept = FALSE)
        {
            if ($year === FALSE && $dept === FALSE) {
                $this->db->order_by('CTRL_NTB_YEAR', 'DESC');
                $this->db->select('*');
                $this->db->from('control_notebook');
                $this->db->join('department', 'control_notebook.DEPARTMENT_DPT_ID=department.DPT_ID');

                $query = $this->db->get();  
                return $query->result_array();
            } elseif ( $dept === FALSE ) {
                $query = $this->db->query('SELECT * 
                    FROM `control_notebook` 
                    WHERE `CTRL_NTB_YEAR` = '.$year.' LIMIT 1'
                );

                return $query->row_array();
            }

            $this->db->select('*');
            $this->db->from('control_notebook');
            $this->db->where('DEPARTMENT_DPT_ID', $dept);
            $this->db->where('YEAR(CTRL_NTB_YEAR)', $year);

            $query = $this->db->get();
            return $query->row_array();
        }

        public function getNotebook_id()
        {
            $this->db->select('CTRL_NTB_ID');
            $this->db->from('control_notebook');
            $this->db->where('CTRL_NTB_YEAR', date('Y'));
            $this->db->where('DEPARTMENT_DPT_ID', $this->input->post('dept_id'));

            $query = $this->db->get();
            return $query->row()->CTRL_NTB_ID;
        }
    }
    
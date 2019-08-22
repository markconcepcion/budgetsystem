<?php defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Report_model extends CI_Model
	{
		function __construct()
		{
			$this->load->database();
        }
        
        public function readDept($id = FALSE)
        {
            if ($id === FALSE) {
                $this->db->order_by('DPT_ID', 'ASC');
                $this->db->select('*');
                $this->db->from('department');

                $query = $this->db->get();  
                return $query->result_array();
            }

            $this->db->select('*');
            $this->db->from('department');
            $this->db->where('DPT_ID', $id);

            $query = $this->db->get();  
            return $query->row_array();
        }

        public function readExpenditure()
        {
            $this->db->order_by('EXPENDITURE_id', 'ASC');
            $this->db->select('*');
            $this->db->from('expenditure');
            $this->db->join('expenditure_class', "expenditure_class.EXPCLASS_ID=expenditure.EXPENDITURE_CLASS_EXPCLASS_ID");
            $query = $this->db->get();  
            return $query->result_array();
        }

        public function readLBP1($yr)
        {
            $query = $this->db->query("SELECT EXPENDITURE_EXPENDITURE_id, SUM(LBP_EXP_AMOUNT) AS LBP_EXP_AMOUNT 
                FROM lbp_form JOIN lbp_expenditure ON lbp_expenditure.LBP_FORM_FRM_ID=lbp_form.FRM_ID
                WHERE FRM_YEAR = 2019 GROUP BY EXPENDITURE_EXPENDITURE_id");
            return $query->result_array();
        }





        public function readActualBudget($dept_id, $year)
        {
            $query = $this->db->query("SELECT * FROM lbp_expenditure
                JOIN expenditure ON expenditure.EXPENDITURE_id=lbp_expenditure.EXPENDITURE_EXPENDITURE_id
                JOIN lbp_form ON lbp_form.FRM_ID=lbp_expenditure.LBP_FORM_FRM_ID
                JOIN user ON user.USR_ID=lbp_form.USER_USR_ID
                WHERE DEPARTMENT_DPT_ID = $dept_id
                AND FRM_YEAR = $year");

            return $query->result_array();
        }

        public function readObligations($dept_id, $year, $qn = FALSE)
        {
            if ($qn === FALSE) {
                $query = $this->db->query("SELECT EXPENDITURE_CLASS_EXPCLASS_ID, EXPENDITURE_id, SUM(PART_AMOUNT) as PART_AMOUNT FROM particular
                    LEFT JOIN expenditure ON expenditure.EXPENDITURE_id =particular.EXPENDITURE_EXPENDITURE_id
                    LEFT JOIN obligation_request ON obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID
                    LEFT JOIN mbo_control ON mbo_control.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                    LEFT JOIN control_notebook ON control_notebook.CTRL_NTB_ID=mbo_control.CONTROL_NOTEBOOK_CTRL_NTB_ID
                    WHERE obligation_request.OBR_STATUS='APPROVED'
                    AND control_notebook.DEPARTMENT_DPT_ID = $dept_id
                    AND control_notebook.CTRL_NTB_YEAR = $year
                    GROUP BY expenditure.EXPENDITURE_id");

                return $query->result_array();
            }

            $query = $this->db->query("SELECT EXPENDITURE_CLASS_EXPCLASS_ID, EXPENDITURE_id, SUM(PART_AMOUNT) as PART_AMOUNT FROM particular
                LEFT JOIN expenditure ON expenditure.EXPENDITURE_id =particular.EXPENDITURE_EXPENDITURE_id
                LEFT JOIN obligation_request ON obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID
                LEFT JOIN mbo_control ON mbo_control.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                LEFT JOIN control_notebook ON control_notebook.CTRL_NTB_ID=mbo_control.CONTROL_NOTEBOOK_CTRL_NTB_ID
                WHERE obligation_request.OBR_STATUS='APPROVED'
                AND month(obligation_request.OBR_DATE) <= $qn
                AND month(obligation_request.OBR_DATE) >= ($qn-3)
                AND control_notebook.DEPARTMENT_DPT_ID = $dept_id
                AND control_notebook.CTRL_NTB_YEAR = $year
                GROUP BY expenditure.EXPENDITURE_id");

            return $query->result_array();
        }

        public function readActualBudget_consol($year)
        {
            $query = $this->db->query("SELECT expenditure.EXPENDITURE_id, lbp_expenditure.EXPENDITURE_EXPENDITURE_id, expenditure.EXPENDITURE_CLASS_EXPCLASS_ID, expenditure.EXP_NAME, SUM(lbp_expenditure.LBP_EXP_AMOUNT) AS LBP_EXP_AMOUNT 
                    FROM lbp_expenditure
                    JOIN expenditure ON expenditure.EXPENDITURE_id=lbp_expenditure.EXPENDITURE_EXPENDITURE_id
                    JOIN lbp_form ON lbp_form.FRM_ID=lbp_expenditure.LBP_FORM_FRM_ID
                    JOIN user ON user.USR_ID=lbp_form.USER_USR_ID
                    WHERE FRM_YEAR = $year
                    GROUP BY expenditure.EXPENDITURE_id");
            
            return $query->result_array();
        }
        
        public function readObligations_consol($year, $qn = FALSE) 
        {
            if ($qn === FALSE) {
                    $query = $this->db->query("SELECT EXPENDITURE_CLASS_EXPCLASS_ID, EXPENDITURE_id, EXPENDITURE_EXPENDITURE_id, SUM(PART_AMOUNT) as PART_AMOUNT FROM particular
                    LEFT JOIN expenditure ON expenditure.EXPENDITURE_id =particular.EXPENDITURE_EXPENDITURE_id
                    LEFT JOIN obligation_request ON obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID
                    LEFT JOIN mbo_control ON mbo_control.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                    LEFT JOIN control_notebook ON control_notebook.CTRL_NTB_ID=mbo_control.CONTROL_NOTEBOOK_CTRL_NTB_ID
                    WHERE obligation_request.OBR_STATUS='APPROVED'
                    AND control_notebook.CTRL_NTB_YEAR = $year
                    GROUP BY expenditure.EXPENDITURE_id, EXPENDITURE_EXPENDITURE_id");

                return $query->result_array();
            }
           
            $query = $this->db->query("SELECT EXPENDITURE_CLASS_EXPCLASS_ID, EXPENDITURE_id, SUM(PART_AMOUNT) as PART_AMOUNT FROM particular
                LEFT JOIN expenditure ON expenditure.EXPENDITURE_id =particular.EXPENDITURE_EXPENDITURE_id
                LEFT JOIN obligation_request ON obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID
                LEFT JOIN mbo_control ON mbo_control.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                LEFT JOIN control_notebook ON control_notebook.CTRL_NTB_ID=mbo_control.CONTROL_NOTEBOOK_CTRL_NTB_ID
                WHERE obligation_request.OBR_STATUS='APPROVED'
                AND month(obligation_request.OBR_DATE) <= $qn
                AND month(obligation_request.OBR_DATE) >= ($qn-3)
                AND control_notebook.CTRL_NTB_YEAR = $year
                GROUP BY expenditure.EXPENDITURE_id");

            return $query->result_array();
        }
    }
            
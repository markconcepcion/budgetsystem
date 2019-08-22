
<?php
    class Exp_model extends CI_Model    
    {
        function __construct() {
			$this->load->database();
        }
        
        public function createParticular($acct_code)
        {
            $data = array ( 
                'EXP_ACCT_CODE' =>  $acct_code,
                'EXP_NAME'      =>  $this->input->post('part_name'),
                'EXPENDITURE_CLASS_EXPCLASS_ID' => $this->input->post('part_class')
            );
            
            return $this->db->insert('expenditure', $data);
        }

        public function readExp($Lbp_id, $Exp_id)
        {
            $query = $this->db->query("SELECT * FROM lbp_expenditure
                WHERE lbp_expenditure.LBP_FORM_FRM_ID = $Lbp_id
                AND lbp_expenditure.EXPENDITURE_EXPENDITURE_id = $Exp_id");
            return $query->row_array(); 
        }

        public function readExps($Exps_id) {
            $query = $this->db->query("SELECT * FROM expenditure 
                WHERE EXPENDITURE_id IN ($Exps_id)");
            return $query->result_array();
        }

        public function readExps_null($Exps_id) {
            $query = $this->db->query("SELECT *, 0 as temp FROM expenditure 
                WHERE EXPENDITURE_id IN ($Exps_id)");
            return $query->result_array();
        }  

        public function readExps_Yr($Exps_id, $Dpt_id, $Year) {
            $query = $this->db->query("SELECT * FROM lbp_form
                LEFT JOIN user ON user.USR_ID=lbp_form.USER_USR_ID
                LEFT JOIN lbp_expenditure ON lbp_expenditure.LBP_FORM_FRM_ID=lbp_form.FRM_ID
                WHERE FRM_YEAR = $Year and user.DEPARTMENT_DPT_ID = $Dpt_id
                AND lbp_expenditure.EXPENDITURE_EXPENDITURE_id IN ($Exps_id)");
            return $query->result_array();
        }

        public function readExpenditure($exp_id = FALSE)
        {
            if ($exp_id === FALSE) {
                $this->db->order_by('EXPENDITURE_id', 'ASC');
                $this->db->select('*');
                $this->db->from('expenditure');
                $this->db->join('expenditure_class', "expenditure_class.EXPCLASS_ID=expenditure.EXPENDITURE_CLASS_EXPCLASS_ID");
				$query = $this->db->get();  
				return $query->result_array();
            }
            
			$this->db->select('*');
			$this->db->from('expenditure');
			$this->db->where('EXPENDITURE_id', $exp_id);
			$query = $this->db->get();
			return $query->row_array();
        }
            

        public function minusAllot($exp_id, $dept_code, $year)
        {
            $this->db->select('*');
            $this->db->from('obligation_request');
            $this->db->join('particular', 'obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID', 'left');
            $this->db->join('expenditure', 'expenditure.EXPENDITURE_id=particular.EXPENDITURE_EXPENDITURE_id', 'left');
            $this->db->join('user', 'user.USR_ID=obligation_request.USER_USR_ID', 'left');
            $this->db->where('YEAR(obligation_request.OBR_DATE)', $year);
            $this->db->where('obligation_request.OBR_STATUS', "APPROVED");
            $this->db->where('expenditure.EXPENDITURE_id', $exp_id);
            $this->db->where('user.DEPARTMENT_DPT_ID', $dept_code);

            $query = $this->db->get();
            return $query->row_array();
        }

        public function readParticular_Expenditure($dp_id, $exp_id)
        {
            $query = $this->db->query("SELECT * FROM particular
                LEFT JOIN expenditure ON expenditure.EXPENDITURE_id =particular.EXPENDITURE_EXPENDITURE_id
                LEFT JOIN obligation_request ON obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID
                LEFT JOIN mbo_control ON mbo_control.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                LEFT JOIN control_notebook ON control_notebook.CTRL_NTB_ID=mbo_control.CONTROL_NOTEBOOK_CTRL_NTB_ID
                WHERE obligation_request.OBR_STATUS='APPROVED'
                AND control_notebook.DEPARTMENT_DPT_ID = '$dp_id'
                AND expenditure.EXPENDITURE_id = '$exp_id'"
            );

            return $query->result_array();
        }

        public function categorizePart()
        {
            $data = array( 'EXPENDITURE_EXPENDITURE_id' => $this->input->post('exp_id') );

            $this->db->where('OBLIGATION_REQUEST_OBR_ID', $this->input->post('obr_id'));
            return $this->db->update('particular', $data);
        }

        public function total_actualRel($exp_id = FALSE){
            if ($exp_id === FALSE) {
                $this->db->select('*');
                $this->db->from('expenditure');
                $this->db->join('particular', 'particular.EXPENDITURE_EXPENDITURE_id=expenditure.EXPENDITURE_id');
                $this->db->join('obligation_request', 'obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID');
                $this->db->where('year(obligation_request.OBR_DATE)', date('Y'));
                $this->db->where('obligation_request.OBR_STATUS', "APPROVED");

                $query = $this->db->get();
                return $query->result_array();
            }

            $this->db->select('*');
            $this->db->from('expenditure');
            $this->db->join('particular', 'particular.EXPENDITURE_EXPENDITURE_id=expenditure.EXPENDITURE_id');
            $this->db->join('obligation_request', 'obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID');
            $this->db->where('year(obligation_request.OBR_DATE)', date('Y'));
            $this->db->where('EXPENDITURE_id', $exp_id);
            $this->db->where('obligation_request.OBR_STATUS', "APPROVED");

            $query = $this->db->get();
            return $query->row_array();
            
        }
    }
    
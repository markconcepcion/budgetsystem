<?php
    class Exp_class_model extends CI_Model    
    {
        function __construct()
		{
			$this->load->database();
        }
        
        public function createExpClass()
        {
            $data = array ( 'EXPCLASS_NAME' =>  $this->input->post('class_name') );
            return $this->db->insert('expenditure_class', $data);
        }

		public function getMin_Class()
		{
            $this->db->select('MIN(EXPCLASS_ID) as EXPCLASS_ID');
            $this->db->from('expenditure_class');
            $query = $this->db->get();
            return $query->row()->EXPCLASS_ID ?? 0;
		}

        public function readExpClass($class_id = FALSE)
		{
			if ($class_id === FALSE) {
				$query = $this->db->get('expenditure_class');
				return $query->result_array();
			}

			$this->db->where('EXPCLASS_ID', $class_id);
			$query = $this->db->get('expenditure_class');
			return $query->row_array();
		}
		
		public function readExpClasses($Exps_id)
        {
            $query = $this->db->query("SELECT EXPCLASS_ID, EXPCLASS_NAME FROM expenditure_class
				LEFT JOIN expenditure ON expenditure_class.EXPCLASS_ID=expenditure.EXPENDITURE_CLASS_EXPCLASS_ID
				WHERE expenditure.EXPENDITURE_id IN ($Exps_id)
				GROUP BY EXPCLASS_ID");
            return $query->result_array();
        } 
        
        public function readExp($exp_id = FALSE)
		{
			if ($exp_id === FALSE) {
				$query = $this->db->get('expenditure');
				return $query->result_array();
			}

			$this->db->where('EXPCLASS_ID', $exp_id);
			$query = $this->db->get('expenditure');
			return $query->result_array();
		}

		public function updateExpClass()
		{
			$data = array( 'EXPCLASS_NAME' => $this->input->post('expenditureClass') );
			$this->db->where('EXPCLASS_ID', $this->input->post('expenditureClassID'));
			return $this->db->update('expenditure_class', $data);
		}
    }
    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Dept_model extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function createDept(){
			$data = array( 
				'DPT_ID' => $this->input->post('dept_code'),
				'DPT_NAME' => $this->input->post('dept_name')
			);
			 
			return $this->db->insert('department', $data);
		}

		public function readDpts()
		{
			$query = $this->db->query("SELECT * FROM department	
				WHERE DPT_STATUS = 'ACTIVE' order by DPT_ID ASC");
			return $query->result_array();
		}
		
		public function readDept($dept_id = FALSE)
		{
			if ($dept_id === FALSE) {
				$query = $this->db->query("SELECT * FROM department
				LEFT JOIN user ON user.DEPARTMENT_DPT_ID = department.DPT_ID
				WHERE department.DPT_STATUS = 'ACTIVE'");
	
				return $query->result_array();
			}

			$this->db->where('DPT_ID', $dept_id);
			$query = $this->db->get('department');
			return $query->row_array();
		}

		public function updateDept(){
			$data = array( 
				'DPT_ID' => $this->input->post('dept-code'),
				'DPT_NAME' => $this->input->post('dept-name') 
			);

			$this->db->where('DPT_ID', $this->input->post('dept-id'));
			return $this->db->update('department', $data);	
		}

		

		public function readInactiveDepartments()
		{
			$query = $this->db->query("SELECT * from department where DPT_STATUS = 'INACTIVE'");
			return $query->result_array();
		}

		public function updateDeparmentStatus($deptID, $deptStatus){
			$data = array( 'DPT_STATUS' => $deptStatus);
			$this->db->where('DPT_ID', $deptID);
			return $this->db->update('department', $data);	
		}
	}
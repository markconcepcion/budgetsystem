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
			 
			$this->db->insert('department', $data);
			$deptID = $this->db->insert_id();

			$data2 = array(
				'USR_FNAME' => $this->input->post('fname'),
				'USR_MNAME' => $this->input->post('mname'),
				'USR_LNAME' => $this->input->post('lname'),
				'DEPARTMENT_DPT_ID' => $deptID
			);

			$this->db->insert('user', $data2);
			$user_id = $this->db->insert_id();

			$data1 = array(
				'DPT_ID' => $deptID,
				'USR_ID' => $user_id,
				'user_name' => $this->input->post('username'),
				'user_pass' => $this->input->post('password'),
				'role_id' => 2
			);
			
			$this->db->insert('dept_user', $data1);
			return $deptID;
		}

		public function read_deptIDs()
		{
			$query = $this->db->query("SELECT d.DPT_ID FROM department d GROUP BY d.DPT_ID");
			return $query->result_array();
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
				$query = $this->db->query("SELECT * FROM department d
				left join dept_user du on du.DPT_ID=d.DPT_ID
				left join user u on u.USR_ID = du.USR_ID
				WHERE d.DPT_STATUS = 'ACTIVE'");

				return $query->result_array();
			}

			$this->db->where('DPT_ID', $dept_id);
			$query = $this->db->get('department');
			return $query->row_array();
		}
		public function codeCheck($deptCode)
		{
			return $this->db->query("SELECT DPT_ID FROM department where DPT_ID = $deptCode")->DPT_ID;
		}

		public function readDepartment()
		{
			$query = $this->db->query("SELECT * FROM department d
									join dept_user du on du.DPT_ID=d.DPT_ID
									join user u ON u.USR_ID=du.USR_ID
									WHERE d.DPT_STATUS = 'ACTIVE'
									ORDER BY d.DPT_ID ASC");
			return $query->result_array();
		}

		public function updateDept(){
			$data = array( 
				'DPT_NAME' => $this->input->post('dept-name'),
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
<?php
	/**
	* 
	*/
	class User_model extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		// BUDGET HEAD FUNCTIONS
		
		public function getUsrD($dpt_id, $usr_post)
		{
			$this->db->where('USR_POST', "$usr_post");
		    $this->db->where('DEPARTMENT_DPT_ID', $dpt_id);
		    $this->db->where('USR_STATUS', "ACTIVE");
		    $result = $this->db->get('user');
		    return $result;
		}
		// END OF BH FUNCTIONS
		public function createUser($post)
		{
			$data = array(
				'USR_FNAME' => $this->input->post('fname'),
				'USR_MNAME' => $this->input->post('mname'),
				'USR_LNAME' => $this->input->post('lname'),
				'USR_USERNAME' => $this->input->post('uname'),
				'USR_PASSWORD' => $this->input->post('password'),
				'USR_POST' => $post,
				'USR_STATUS' => "ACTIVE",
				'DEPARTMENT_DPT_ID' => $this->input->post('udept')
			);

			return $this->db->insert('user', $data);
		}

		public function readDept($dept_id = FALSE)
		{
			if ($dept_id === FALSE) {
				$query = $this->db->get('department');
				return $query->result_array();
			}

			$this->db->where('DPT_ID', $dept_id);
			$query = $this->db->get('department');
			return $query->row_array();
		}

		public function fetchUsers($user_id = FALSE)
		{
			if ($user_id === FALSE) {
				$this->db->order_by('USR_POST', 'ASC');
				$this->db->select('user.*, department.*');
				$this->db->from('user');
				$this->db->join('department', 'user.DEPARTMENT_DPT_ID = department.DPT_ID');
				$this->db->where('USR_STATUS', "ACTIVE");
				$query = $this->db->get();
				return $query->result_array();
			}

			$this->db->where('USR_ID', $user_id);
			$query = $this->db->get('user');
			return $query->row_array();
		}

		public function checkPostVacancy($deptID, $userPost)
		{
			$query = $this->db->query("SELECT * FROM user
				WHERE DEPARTMENT_DPT_ID = $deptID
				AND USR_POST = '$userPost'
				and USR_STATUS = 'ACTIVE'");
			return $query;
		}

		public function getInactiveAccts()
		{
			$this->db->order_by('USR_POST', 'ASC');
			$this->db->select('user.*, department.*');
			$this->db->from('user');
			$this->db->join('department', 'user.DEPARTMENT_DPT_ID = department.DPT_ID');
			$this->db->where('USR_STATUS', "INACTIVE");
			$query = $this->db->get();
			return $query->result_array();
		}

		public function fetchBH()
		{
		    $this->db->where('USR_POST', "BUDGET HEAD");
		    $this->db->where('USR_STATUS', "ACTIVE");
		    $result = $this->db->get('user', 1);
		    return $result->row_array();
		}

		function validate($username,$password){
			$query = $this->db->query("SELECT * FROM user
				WHERE USR_USERNAME = '$username'
				AND BINARY USR_PASSWORD = '$password'
				AND USR_STATUS = 'ACTIVE'
				LIMIT 1");

			return $query;
		}

		function ifExist($udept, $upost, $n){
		    $this->db->where('DEPARTMENT_DPT_ID',$udept);
		    $this->db->where('USR_POST', $upost);
		    $this->db->where('USR_STATUS', "ACTIVE");
		    $result = $this->db->get('user', $n);
		    return $result;
		}

		public function validate_oldpass($old_pass)
		{
			$this->db->where('USR_PASSWORD', $old_pass);
		    $result = $this->db->get('user',1);
		    return $result;
		}

		public function updatePass($id, $new_pass)
		{
			$data = array( 'USR_PASSWORD' => $new_pass );
			$this->db->where('USR_ID', $id);
			return $this->db->update('user', $data);	
		}

		public function updateProf($id)
		{
			$data = array( 
				'USR_FNAME' => $this->input->post('fname'),
				'USR_MNAME' => $this->input->post('mname'),
				'USR_LNAME' => $this->input->post('lname'),
				'USR_USERNAME' => $this->input->post('uname')
			);
			
			$this->db->where('USR_ID', $id);
			return $this->db->update('user', $data);	
		}

		public function getAssign($data)
		{
			$this->db->order_by('assign_id', 'DESC');
			$this->db->select('*');
			$this->db->from('assignation');
			$this->db->where('assign_post', $data);
			$this->db->limit(1);

			$query = $this->db->get();
			return $query->row_array();
		}

		public function changeAssign()
		{
			$data = array(
				'assign_name' => $this->input->post('newAssign'),
				'assign_post' => $this->input->post('post'),
				'assign_date' => Date('Y-m-d')
			);

			return $this->db->insert('assignation', $data);
		}
		
		public function updateAccountStatus($userID, $userStatus)
		{
			$data = array( 'USR_STATUS' => $userStatus);
			$this->db->where('USR_ID', $userID);
			return $this->db->update('user', $data);
		}

		public function updateAccountEntry($userID, $userName, $deptID)
		{
			$newData = array (
				'USR_PASSWORD' => $deptID,
				'USR_USERNAME' => $userName
			);

			$this->db->where('USR_ID', $userID);
			return $this->db->update('user', $newData);
		}
	}
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
		
		public function getUsrD($deptID, $roleID)
		{
			return $this->db->query("SELECT du.*, u.*, r.role_code FROM dept_user du
				join user u on u.USR_ID=du.USR_ID
				join user_role r on r.role_id=du.role_id
				WHERE du.DPT_ID = $deptID
				AND r.role_id = $roleID
				AND du.status = 'ACTIVE'
				LIMIT 1");
		}
		// END OF BH FUNCTIONS
		public function createUser($post)
		{
			$data = array(
				'USR_FNAME' => $this->input->post('fname'),
				'USR_MNAME' => $this->input->post('mname'),
				'USR_LNAME' => $this->input->post('lname'),
				'DEPARTMENT_DPT_ID' => $this->input->post('udept')
			);

			$this->db->insert('user', $data);
			$user_id = $this->db->insert_id();

			$data1 = array(
				'DPT_ID' => $this->input->post('udept'),
				'USR_ID' => $user_id,
				'user_name' => $this->input->post('uname'),
				'user_pass' => $this->input->post('password'),
				'role_id' => $post
			);
			
			return $this->db->insert('dept_user', $data1);
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
				$this->db->order_by('user_role.role_id', 'DESC');
				$this->db->select('*');
				$this->db->from('user');
				$this->db->join('dept_user', 'dept_user.USR_ID = user.USR_ID');
				$this->db->join('user_role', 'user_role.role_id = dept_user.role_id');
				$this->db->join('department', 'department.DPT_ID = dept_user.DPT_ID');
				$this->db->where('dept_user.status', "ACTIVE");
				$query = $this->db->get();
				return $query->result_array();
			}

			$this->db->where('user.USR_ID', $user_id);
			$this->db->join('dept_user', 'dept_user.USR_ID = user.USR_ID');
			$this->db->join('user_role', 'user_role.role_id = dept_user.role_id');
			$this->db->join('department', 'department.DPT_ID = dept_user.DPT_ID');
			$query = $this->db->get('user');
			return $query->row_array();
		}

		public function checkPostVacancy($deptID, $roleID)
		{
			$query = $this->db->query("SELECT * FROM user u
				join dept_user du on du.USR_ID=u.USR_ID
				WHERE du.DPT_ID = $deptID
				AND du.role_id = $roleID
				and du.status = 'ACTIVE'");
			return $query;
		}

		public function getInactiveAccts()
		{
			$query = $this->db->query("SELECT * FROM user u
					LEFT JOIN dept_user du ON du.USR_ID=u.USR_ID 
					LEFT JOIN user_role r ON du.role_id=r.role_id 
					LEFT JOIN department d ON d.DPT_ID=du.DPT_ID 
					WHERE du.status = 'INACTIVE'
					ORDER BY du.USR_ID DESC");
			return $query->result_array();
		}

		function validate($username,$password){
			$query = $this->db->query("SELECT du.*, u.*, r.role_code FROM dept_user du
				join user u on u.USR_ID=du.USR_ID
				join user_role r on r.role_id=du.role_id
				WHERE du.user_name = '$username'
				AND BINARY du.user_pass = '$password'
				AND du.status = 'ACTIVE'
				LIMIT 1");

			return $query;
		}

		function ifExist($udept, $roleID, $n){
		    $this->db->where('DPT_ID',$udept);
		    $this->db->where('role_id', $roleID);
		    $this->db->where('status', "ACTIVE");
		    $result = $this->db->get('dept_user', $n);
		    return $result;
		}

		public function validate_oldpass($userID, $old_pass)
		{
			$this->db->where('user_pass', $old_pass);
			$this->db->where('id', $userID);
		    $result = $this->db->get('dept_user',1);
		    return $result;
		}

		public function updatePass($id, $new_pass)
		{
			$data = array( 'user_pass' => $new_pass );
			$this->db->where('id', $id);
			return $this->db->update('dept_user', $data);	
		}

		public function updateProf($id)
		{
			$data = array( 
				'USR_FNAME' => $this->input->post('fname'),
				'USR_MNAME' => $this->input->post('mname'),
				'USR_LNAME' => $this->input->post('lname'),
			);
			
			$this->db->where('user.USR_ID', $id);
			$this->db->update('user', $data);

			$data1 = array( 'user_name' => $this->input->post('uname') );			
			$this->db->where('dept_user.USR_ID', $id);
			return $this->db->update('dept_user', $data1);	
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

		
		
		public function updateAccountStatus($userID, $userStatus)
		{
			$data = array( 'status' => $userStatus);
			$this->db->where('USR_ID', $userID);
			return $this->db->update('dept_user', $data);
		}

		public function updateAccountEntry($userID, $userName, $deptID)
		{
			$newData = array (
				'user_name' => $userName,
				'user_pass' => $deptID
			);

			$this->db->where('USR_ID', $userID);
			return $this->db->update('dept_user', $newData);
		}
	}
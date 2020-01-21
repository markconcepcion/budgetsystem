<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Log_model extends CI_Model
    {
        function __construct()
		{
			$this->load->database();
        }
        
        public function log($id, $transac)
        {
            $data = array(
                'log_transaction' => $transac,
                'dept_user_id' => $id
            );
            return $this->db->insert('log', $data);
        }

        public function readLogs($date)
        {
            return $this->db->query("SELECT * from log l
                                    join dept_user du on du.id=l.dept_user_id
                                    join department d on d.DPT_ID=du.DPT_ID
                                    join user u on u.USR_ID=du.USR_ID
                                    WHERE DATE(l.timestamp) = '$date'
                                    ORDER BY l.timestamp DESC")->result_array();
        }
    }
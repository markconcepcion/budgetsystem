<?php
    class Ui_model extends CI_Model
    {
        function __construct()
        {
            $this->load->database();	
        }

        public function obrNotif($dept_code)
        {
            $query = $this->db->query("SELECT * FROM obligation_request 
                JOIN user ON user.USR_ID=obligation_request.USER_USR_ID
                JOIN particular ON particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                WHERE user.DEPARTMENT_DPT_ID = $dept_code
                ORDER BY OBR_DATE DESC");
            return $query->result_array();
        }

        public function submitted_obrNotif($day)
        {
            $query = $this->db->query("SELECT * FROM obligation_request 
                JOIN user ON user.USR_ID=obligation_request.USER_USR_ID
                JOIN department ON department.DPT_ID=user.DEPARTMENT_DPT_ID
                JOIN particular ON particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                WHERE day(OBR_DATE) <= $day
                AND day(OBR_DATE) >= ($day-2)
                AND OBR_STATUS = 'PENDING'
                ORDER BY OBR_DATE DESC");
            return $query->result_array();
        }

        public function reviewed_obrNotif($day)
        {
            $query = $this->db->query("SELECT * FROM obligation_request 
                JOIN user ON user.USR_ID=obligation_request.USER_USR_ID
                JOIN department ON department.DPT_ID=user.DEPARTMENT_DPT_ID
                JOIN particular ON particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                WHERE day(OBR_DATE) <= $day
                AND day(OBR_DATE) >= ($day-2)
                AND OBR_STATUS = 'ON PROCESS'
                ORDER BY OBR_DATE DESC");
            return $query->result_array();
        }

        public function getBH()
        {
            $query = $this->db->query("SELECT * FROM user 
                WHERE USR_POST = 'BUDGET HEAD'
                AND USR_STATUS = 'ACTIVE'");
            return $query->row_array();
        }

        public function getAdmin()
        {
            $query = $this->db->query("SELECT * FROM user 
                WHERE USR_POST = 'SUPERUSER'
                AND USR_STATUS = 'ACTIVE'");
            return $query->row_array();
        }

        public function getMayor()
        {
            $query = $this->db->query("
                SELECT * FROM assignation 
                WHERE assign_id = (SELECT MAX(assign_id) as assign_id FROM assignation
                                    WHERE assign_post = 'MAYOR')
            ");
            return $query->row_array();
        }

        public function getBudgetHead()
        {
            $query = $this->db->query("
                SELECT * FROM assignation 
                WHERE assign_id = (SELECT MAX(assign_id) as assign_id FROM assignation
                                    WHERE assign_post = 'BUDGET HEAD')
            ");
            return $query->row_array();
        }
    }
    
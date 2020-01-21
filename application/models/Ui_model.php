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

        public function clear_fcache($user_id)
        {
            $this->db->query("UPDATE obligation_request SET obrViewStatus = 0 where obrViewStatus = $user_id");
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

        public function getSignature($deptID)
        {
            $query = $this->db->query("SELECT * FROM department d 
                                WHERE d.DPT_STATUS = 'ACTIVE'
                                AND d.DPT_ID = $deptID");
            return $query->row_array();
        }

        public function getObr_dept($deptID, $obrStatus, $year)
        {
            $query = $this->db->query("SELECT obr.OBR_DATE, obr.OBR_PAYEE, p.PART_PARTICULARS, p.PART_AMOUNT FROM obligation_request obr
                                    join particular p on p.OBLIGATION_REQUEST_OBR_ID=obr.OBR_ID
                                    join user u on u.USR_ID=obr.USER_USR_ID
                                    where u.DEPARTMENT_DPT_ID = $deptID
                                    and obr.OBR_STATUS = '{$obrStatus}'
                                    and year(obr.OBR_DATE) = $year
                                    ORDER BY obr.OBR_DATE DESC");
            return $query->result_array();
        }
    }
    
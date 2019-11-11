<?php
    class Obr_model extends CI_Model
    {
        function __construct()
        {
            $this->load->database();
            date_default_timezone_set('Asia/Manila');
        }
        
        public function createOBR($obr_id, $lb_id)
        {
            $data = array(
                'OBR_ID' => $obr_id,
                'OBR_DATE' => date('Y-m-d'),
                'LOGBOOK_LB_ID' => $lb_id,
                'USER_USR_ID' => $this->session->userdata('id'),
                'OBR_STATUS' => "PENDING",
                'OBR_PAYEE' => $this->input->post('obr_payee')
            );

            return $this->db->insert('obligation_request', $data);
        }

        public function createOBR_Expenditure($obr_id)
        {
            $data = array(
                'PART_PARTICULARS' => $this->input->post('obr_part'),
                'PART_AMOUNT' => $this->input->post('obr_amount'),
                'OBLIGATION_REQUEST_OBR_id' => $obr_id
            );

            $this->db->insert('particular', $data);
        }

        public function readMaxObrID(){
            $this->db->select("MAX(OBR_ID) as OBR_ID");
			$this->db->from('obligation_request');
			$query = $this->db->get();
			return $query->row()->OBR_ID ?? 0;
        }

        public function readObr_No($Level, $Yr)
        {
            if ($Level === "BUDGET OFFICER 2") {
                $query = $this->db->query("SELECT MAX(OBR_NO) AS OBR_NO FROM obligation_request 
                    WHERE OBR_NO > 1500 AND obrNoYear = $Yr");
                return $query->row()->OBR_NO ?? 1500;
            } else {
                $query = $this->db->query("SELECT MAX(OBR_NO) AS OBR_NO FROM obligation_request 
                    WHERE OBR_NO <= 1500 AND obrNoYear = $Yr");
                return $query->row()->OBR_NO ?? 0;
            }
        }

        public function readOBR($Obr_id)
        {
            $query = $this->db->query("SELECT * FROM obligation_request
                JOIN particular ON obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID
                WHERE OBR_ID = $Obr_id");
           return $query->row_array();
        }

        public function readOBRs($level, $order)
        {
            if ($level === "BUDGET HEAD") {
                $query = $this->db->query("SELECT * FROM obligation_request
                    JOIN user ON user.USR_ID=obligation_request.USER_USR_ID
                    JOIN department ON department.DPT_ID=user.DEPARTMENT_DPT_ID
                    WHERE OBR_STATUS = 'PENDING' OR OBR_STATUS = 'CHECKED'
                    ORDER BY OBR_APPROVED_DATE $order, OBR_ID $order");
            } else {
                $query = $this->db->query("SELECT * FROM obligation_request
                    JOIN user ON user.USR_ID=obligation_request.USER_USR_ID
                    JOIN department ON department.DPT_ID=user.DEPARTMENT_DPT_ID
                    WHERE OBR_STATUS = 'PENDING'
                    ORDER BY OBR_ID $order");
            } return $query->result_array();
        }

        public function readObr_checked($obr_id) // WITHOUT 'S' AND DIFF ARGUMENT - 1 ROW
        {
            $query = $this->db->query("SELECT * FROM obligation_request
                JOIN mbo_control ON mbo_control.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                JOIN user ON user.USR_ID=mbo_control.USER_USR_ID
                JOIN particular ON particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                JOIN expenditure ON expenditure.EXPENDITURE_id=particular.EXPENDITURE_EXPENDITURE_id
                WHERE OBR_ID = $obr_id");
            return $query->row_array();
        }

        public function readObrInfo($obr_id)
        {
            $query = $this->db->query("SELECT *, a.DEPARTMENT_DPT_ID as deptID FROM obligation_request
                left JOIN mbo_control ON mbo_control.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                left JOIN user a ON a.USR_ID=obligation_request.USER_USR_ID
                left JOIN user b ON b.USR_ID=mbo_control.USER_USR_ID
                left JOIN particular ON particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
                left JOIN expenditure ON expenditure.EXPENDITURE_id=particular.EXPENDITURE_EXPENDITURE_id
                left JOIN expenditure_class ON expenditure_class.EXPCLASS_ID=expenditure.EXPENDITURE_CLASS_EXPCLASS_ID
                WHERE OBR_ID = $obr_id");
            return $query->row_array();
        }

        public function readObrs_approved($exps, $dpt_id, $yr) // WITH 'S' - 3 ARG - MANY ROWS
        {
            $query = $this->db->query("SELECT * FROM obligation_request
                JOIN particular ON obligation_request.OBR_ID=particular.OBLIGATION_REQUEST_OBR_ID
                JOIN user ON obligation_request.USER_USR_ID=user.USR_ID
                WHERE DEPARTMENT_DPT_ID = $dpt_id AND YEAR(OBR_DATE) = $yr
                AND OBR_STATUS = 'APPROVED' AND EXPENDITURE_EXPENDITURE_id IN ($exps)");
            return $query->result_array();
        }

        public function updateParticular($obr_id)
        { // FIRST PHASE IN OBR PROCESS
            $data = array( 'EXPENDITURE_EXPENDITURE_id' => $this->input->post('exp_id') );
            $this->db->where('OBLIGATION_REQUEST_OBR_ID', $obr_id);
            return $this->db->update('particular', $data);
        }

        public function updateObr($obr_id)
        { // FIRST PHASE IN OBR PROCESS
            $data = array( 
                'OBR_NO' => $this->input->post('obr_no'),
                'obrNoYear' => date('Y'),
                'OBR_STATUS' => $this->input->post('obr_check_btn'),
                'OBR_APPROVED_DATE' => $this->input->post('obr_checked_date')
            ); 
            $this->db->where('OBR_ID', $obr_id);
            return $this->db->update('obligation_request', $data);
        }

        public function updateApproval($obr_id)
        {
            $arrayOBR = array(
                'OBR_APPROVED_DATE' => $this->input->post('obr_approved_date'),
                'OBR_STATUS' => "APPROVED"
            );

            $this->db->where('OBR_ID', $obr_id);
            return $this->db->update('obligation_request', $arrayOBR);
        }

        public function reject($obr_id)
        {
            $arrayOBR = array( 
                'OBR_NO' => $this->input->post('obr_no'),
                'OBR_STATUS' => "DECLINED", 
                'OBR_HANDLER' => $this->session->userdata('id') 
            ); 

            $this->db->where('OBR_ID', $obr_id);
            return $this->db->update('obligation_request', $arrayOBR);
        }

        public function reviewOBR()
        {
            $arrayOBR = array( 
                'OBR_NO' => $this->input->post('obr_no'),
                'OBR_STATUS' => "ON PROCESS", 
                'OBR_HANDLER' => $this->session->userdata('id') 
            );

            $this->db->where('OBR_ID', $this->input->post('obr_id'));
            return $this->db->update('obligation_request', $arrayOBR);
        }
        










        public function readOBRexp_id($obr_id)
        {
            $this->db->select('*');
            $this->db->from('obligation_request');
            $this->db->join('particular', 'particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID');
            $this->db->where('OBR_ID', $obr_id);

            $query = $this->db->get();
            return $query->result_array();  
        }

        public function readOBRdet_id($obr_id)
        {
            $this->db->select('*');
            $this->db->from('obligation_request');
            $this->db->join('user', 'user.USR_ID=obligation_request.USER_USR_ID');
            $this->db->join('department', 'department.DPT_ID=user.DEPARTMENT_DPT_ID');
            $this->db->join('logbook', 'logbook.LB_id=obligation_request.LOGBOOK_LB_ID');
            $this->db->join('particular', 'particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID');
            $this->db->where('OBR_ID', $obr_id);

            $query = $this->db->get();
            return $query->row_array();
        }

        public function readMax_ObrNo($u_id)
        {
            $this->db->select('MAX(OBR_NO) as OBR_NO');
            $this->db->from('obligation_request');
            $this->db->where('OBR_HANDLER', $u_id);

            $query = $this->db->get();
			return $query->row()->OBR_NO ?? 0;
        }
    }

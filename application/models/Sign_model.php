<?php
    class Sign_model extends CI_Model
    {
        function __construct()
        {
            $this->load->database();	
        }

        public function createSignature()
        {
            $data = array(
                'signPrepared' => $this->input->post('preparedBy'),
                'signReviewed' => $this->input->post('reviewedBy'),
                'signApproved' => $this->input->post('approvedBy')
            );
            
            $this->db->insert('signature', $data);
            return $this->db->insert_id();
        }

        public function create_initial_signature($preparedBy, $reviewedBy, $approvedBy)
        {
            $data = array(
                'signID' => 1,
                'signPrepared' => $preparedBy,
                'signReviewed' => $reviewedBy,
                'signApproved' => $approvedBy
            );
            
            $this->db->insert('signature', $data);
        }

        public function readSignature($preparedBy, $reviewedBy, $approvedBy)
        {
            $query = $this->db->query("SELECT max(s.signID) as signID FROM signature s 
                                    WHERE signPrepared = '$preparedBy' AND signReviewed = '$reviewedBy'
                                    AND signApproved = '$approvedBy'");
            return $query->row()->signID??0;
        }

        public function read_signature_id($signID)
        {
            $query = $this->db->query("SELECT s.* FROM signature s 
                        WHERE signID = $signID");
            return $query->row_array();
        }

        public function read_budgetSignature()
        {
            $query = $this->db->query("SELECT s.* FROM signature s
                                    JOIN lbp_form lbp ON lbp.signID=s.signID
                                    JOIN user u ON u.USR_ID=lbp.USER_USR_ID
                                    WHERE u.DEPARTMENT_DPT_ID = 1071
                                    ORDER BY s.signID DESC
                                    LIMIT 1");
            return $query->row_array();
        }

        public function change_sign_approval($signID, $name)
		{
			$data = array( 'signApproved' => $name );
            $this->db->where('signID', $signID);
			return $this->db->update('signature', $data);
        }
        
        public function change_sign_reviewal($signID, $name)
		{
			$data = array( 'signReviewed' => $name );
            $this->db->where('signID', $signID);
			return $this->db->update('signature', $data);
		}
    }
    
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

        public function readSignature($preparedBy, $reviewedBy, $approvedBy)
        {
            $query = $this->db->query("SELECT max(s.signID) as signID FROM signature s 
                                    WHERE signPrepared = '$preparedBy' AND signReviewed = '$reviewedBy'
                                    AND signApproved = '$approvedBy'");
            return $query->row()->signID??0;
        }
    }
    
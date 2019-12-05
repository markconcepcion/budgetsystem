<?php
    class Mbo_model extends CI_Model    
    {
        function __construct()
		{
			$this->load->database();
        }

        public function createMBO($obr_id, $cn_id)
        {
            $data = array( 
                'MBO_NO' => $this->input->post('mbo_no'),
                'mboIDYear' => date('Y'),
                'OBLIGATION_REQUEST_OBR_ID' => $obr_id,
                'USER_USR_ID' => $this->session->userdata('id'),
                'CONTROL_NOTEBOOK_CTRL_NTB_ID' => $cn_id,
                'MBO_REMARKS' => $this->input->post('remarks'),
                'MBO_TMP' => $this->input->post('add_approp'),
                'MBO_INITIAL' => $this->input->post('initial')
            );

            return $this->db->insert('mbo_control', $data);
        }
        
        public function readMax_MBO($u_id)
        {
            $this->db->select('MAX(MBO_ID) as MBO_ID');
            $this->db->from('mbo_control');
            $this->db->where('USER_USR_ID', $u_id);

            $query = $this->db->get();
			return $query->row()->MBO_ID ?? 0;
        }
        
        public function readMBO($obr_id)
        {
            $this->db->select('*');
            $this->db->from('mbo_control');
            $this->db->where('OBLIGATION_REQUEST_OBR_ID', $obr_id);
            
            $query = $this->db->get();
            return $query->row_array();
        }

        public function readMBOs($obr_ids)
        {
            $query = $this->db->query("SELECT * FROM mbo_control
                JOIN user ON user.USR_ID=mbo_control.USER_USR_ID 
                WHERE OBLIGATION_REQUEST_OBR_ID IN ($obr_ids)");
            return $query->result_array();
        }
        
        public function readMbo_no($level, $yr)
        {
            if ($level === "BUDGET OFFICER 2") {
                $query = $this->db->query("SELECT MAX(MBO_NO) AS MBO_NO FROM mbo_control
                WHERE MBO_NO > 1500 AND mboIDYear = '$yr'");
                return $query->row()->MBO_NO ?? 1500;
            } else {
                $query = $this->db->query("SELECT MAX(MBO_NO) AS MBO_NO FROM mbo_control
                    WHERE MBO_NO < 1500 AND mboIDYear = '$yr'");
                return $query->row()->MBO_NO ?? 0;
            }
        }
    }
    
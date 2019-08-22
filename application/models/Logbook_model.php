<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logbook_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function createLogbook($date)
    {
        $data = array( 'LB_YEAR' => $date );
        return $this->db->insert('logbook', $data);
    }

    public function readLogbook($year = FALSE)
    {
        if ($year === FALSE) {
            $this->db->order_by('LB_YEAR', 'DESC');
            $this->db->select('*');
            $this->db->from('logbook');
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->where('LB_YEAR ', $year);
        $query = $this->db->get('logbook');
        return $query->row_array();
    }

    public function read_currLogbook($year)
    {
        $this->db->select('LB_YEAR');
        $this->db->from('logbook');
        $this->db->where('LB_YEAR', $year);
        $query = $this->db->get();
        return $query->row();
    }

    public function readLogs($yr)
    {
        $query = $this->db->query("SELECT * FROM logbook
            LEFT JOIN obligation_request ON obligation_request.LOGBOOK_LB_ID=logbook.LB_ID
            LEFT JOIN user ON user.USR_ID=obligation_request.USER_USR_ID
            LEFT JOIN mbo_control ON mbo_control.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
            LEFT JOIN particular ON particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
            WHERE OBR_STATUS = 'DECLINED' OR OBR_STATUS = 'APPROVED' AND LB_YEAR = $yr");
        return $query->result_array();
    }
}

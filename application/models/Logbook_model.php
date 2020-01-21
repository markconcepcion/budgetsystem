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

        $this->db->where('LB_YEAR', $year);
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
            LEFT JOIN department ON department.DPT_ID=user.DEPARTMENT_DPT_ID
            LEFT JOIN mbo_control ON mbo_control.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
            LEFT JOIN particular ON particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID
            WHERE OBR_STATUS != 'PENDING' AND OBR_STATUS != 'CHECKED' AND LB_YEAR = $yr
            ORDER BY OBR_NO ASC");
        return $query->result_array();
    }

    public function read_supplementations($year)
    {
        $query = $this->db->query("SELECT * FROM mbo_control mbo
                    LEFT JOIN obligation_request obr ON obr.OBR_ID=mbo.OBLIGATION_REQUEST_OBR_ID
                    LEFT JOIN user u ON u.USR_ID=obr.USER_USR_ID
                    LEFT JOIN department d ON d.DPT_ID=u.DEPARTMENT_DPT_ID
                    LEFT JOIN particular p ON p.OBLIGATION_REQUEST_OBR_ID=obr.OBR_ID
                    LEFT JOIN expenditure e ON e.EXPENDITURE_id=p.EXPENDITURE_EXPENDITURE_id
                    WHERE OBR_STATUS = 'APPROVED'
                    AND obr.obrNoYear = $year
                    AND mbo.MBO_TMP > 0
                    ORDER BY obr.OBR_APPROVED_DATE ASC");
        return $query->result_array();
    }
}

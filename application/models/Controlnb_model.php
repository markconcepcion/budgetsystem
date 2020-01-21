<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Controlnb_model extends CI_model
    {
        function __construct(){
            $this->load->database();
        }

        public function createNotebooks($dpts)
        {
            $cnArray = array();
            foreach ($dpts as $key) {
                $cnArray[] = array(
                    'CTRL_NTB_YEAR' => date('Y'),
                    'DEPARTMENT_DPT_ID' => $key['DPT_ID']
                );
            } return $this->db->insert_batch('control_notebook', $cnArray);
        }

        public function create_deptNotebook($deptID)
        {
            $data = array(
                'CTRL_NTB_YEAR' => date('Y'),
                'DEPARTMENT_DPT_ID' => $deptID
            );
            return $this->db->insert('control_notebook', $data);
        }

        public function read_ifExist()
        {
            $query = $this->db->query("SELECT * FROM control_notebook cn WHERE cn.CTRL_NTB_YEAR = ".date('Y')." ");
			return $query->result_array();
        }

        public function read_existYear()
        {
            return $this->db->query("SELECT * FROM control_notebook cn GROUP BY cn.CTRL_NTB_YEAR")->result_array();
        }
        
        public function readNotebook($yr, $dpt_id) {
            $query = $this->db->query("SELECT CTRL_NTB_ID FROM control_notebook
                WHERE DEPARTMENT_DPT_ID = $dpt_id AND CTRL_NTB_YEAR = $yr");
            return $query->row()->CTRL_NTB_ID ?? 0;
        }

        public function readNotebook_id($dept_code, $exp, $lbp_id) {
            $this->db->select('*');
            $this->db->from('control_notebook');
            $this->db->join('mbo_control', 'mbo_control.CONTROL_NOTEBOOK_CTRL_NTB_ID=control_notebook.CTRL_NTB_ID', 'LEFT');
            $this->db->join('obligation_request', 'obligation_request.OBR_ID=mbo_control.OBLIGATION_REQUEST_OBR_ID', 'LEFT');
            $this->db->join('particular', 'particular.OBLIGATION_REQUEST_OBR_ID=obligation_request.OBR_ID', 'LEFT');
            $this->db->join('expenditure', 'expenditure.EXPENDITURE_id=particular.EXPENDITURE_EXPENDITURE_id', 'LEFT');
            $this->db->join('lbp_expenditure', 'lbp_expenditure.EXPENDITURE_EXPENDITURE_id=expenditure.EXPENDITURE_id', 'LEFT');
            
            $this->db->where('control_notebook.DEPARTMENT_DPT_ID', $dept_code);
            $this->db->where('particular.EXPENDITURE_EXPENDITURE_id', $exp);
            $this->db->where('control_notebook.CTRL_NTB_YEAR', 2019);
            $this->db->where('lbp_expenditure.LBP_FORM_FRM_ID', $lbp_id);

            $query = $this->db->get();
            return $query->result_array();
        }

        public function readControlNotebook($year = FALSE, $dept = FALSE)
        {
            if ($year === FALSE && $dept === FALSE) {
                $this->db->order_by('CTRL_NTB_YEAR', 'DESC');
                $this->db->select('*');
                $this->db->from('control_notebook');
                $this->db->join('department', 'control_notebook.DEPARTMENT_DPT_ID=department.DPT_ID');

                $query = $this->db->get();  
                return $query->result_array();
            } elseif ( $dept === FALSE ) {
                $query = $this->db->query("SELECT * FROM control_notebook
                    JOIN department ON control_notebook.DEPARTMENT_DPT_ID=department.DPT_ID
                    WHERE CTRL_NTB_YEAR = $year"
                );

                return $query->result_array();
            }

            $this->db->select('*');
            $this->db->from('control_notebook');
            $this->db->where('DEPARTMENT_DPT_ID', $dept);
            $this->db->where('YEAR(CTRL_NTB_YEAR)', $year);

            $query = $this->db->get();
            return $query->row_array();
        }

        // public function getNotebook_id()
        // {
        //     $this->db->select('CTRL_NTB_ID');
        //     $this->db->from('control_notebook');
        //     $this->db->where('CTRL_NTB_YEAR', date('Y'));
        //     $this->db->where('DEPARTMENT_DPT_ID', $this->input->post('dept_id'));

        //     $query = $this->db->get();
        //     return $query->row()->CTRL_NTB_ID;
        // }

        // public function readNotebook_exp($year, $deptID)
        // {
        //     return $this->db->query("SELECT *, SUM(p.PART_AMOUNT) as AMOUNT FROM particular p
        //                     JOIN obligation_request obr ON obr.OBR_ID=p.OBLIGATION_REQUEST_OBR_ID
        //                     JOIN mbo_control mbo ON mbo.OBLIGATION_REQUEST_OBR_ID=obr.OBR_ID
        //                     JOIN user u ON u.USR_ID=obr.USER_USR_ID
        //                     AND obr.obrNoYear = $year
        //                     AND u.DEPARTMENT_DPT_ID = $deptID
        //                     AND obr.OBR_STATUS = 'APPROVED'
        //                     GROUP BY P.EXPENDITURE_EXPENDITURE_id")->result_array();
        // }
    }
    
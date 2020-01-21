<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Chart_model extends CI_Model
    {
        public function create_augmentation($amount)
        {
            $data = array(
                'exp_id' => $this->input->post('exp_id'),
                'dept_id' => $this->input->post('dept_id'),
                'amount' => $amount,
                'augmented_date' => date('y-m-d')
            );

            return $this->db->insert('augmentation', $data);
        }

        public function read_name()
        {
            return $this->db->query("SELECT * FROM expenditure_class ORDER BY EXPCLASS_ID")->result_array();
        }

        public function read_expenditures()
        {
            return $this->db->query("SELECT * FROM expenditure ORDER BY EXPENDITURE_id")->result_array();
        }

        public function read_augmentations()
        {
            return $this->db->query("SELECT e.EXP_NAME,ec.EXPCLASS_NAME, d.DPT_NAME, a.amount, a.augmented_date 
                                    FROM department d
                                    JOIN augmentation a ON a.dept_id=d.DPT_ID
                                    JOIN expenditure e ON e.EXPENDITURE_id=a.exp_id
                                    JOIN expenditure_class ec ON ec.EXPCLASS_ID=e.EXPENDITURE_CLASS_EXPCLASS_ID
                                    ORDER BY a.augment_id DESC")->result_array();
        }

        public function read_expediture_ifExist($d_id, $e_id, $year)
        {
            $query = $this->db->query("SELECT le.LBP_EXP_ID FROM lbp_expenditure le
                JOIN lbp_form lf ON lf.FRM_ID=le.LBP_FORM_FRM_ID
                JOIN user u ON u.USR_ID=lf.USER_USR_ID
                JOIN department d ON d.DPT_ID=u.DEPARTMENT_DPT_ID
                WHERE lf.FRM_YEAR = $year
                AND le.EXPENDITURE_EXPENDITURE_id = $e_id
                AND d.DPT_ID = $d_id");
            return $query->result_array();
        }

        //X-AXIS :: CATEGORIES IN HIGHCHART
        public function get_dept_category($year = FALSE)
        {
            if ($year === FALSE) {
                $depts = $this->db->query("SELECT * FROM department ORDER BY DPT_ID");
                foreach ($depts->result_array() as $key) {
                    $cat[] = $key['DPT_NAME'];
                }
                return json_encode($cat);
            }
            return $this->db->query("SELECT * FROM department d
                                    JOIN user u ON u.DEPARTMENT_DPT_ID=d.DPT_ID
                                    JOIN lbp_form lf ON lf.USER_USR_ID=u.USR_ID
                                    WHERE lf.FRM_YEAR = $year
                                    AND lf.FRM_STATUS = 'FINALIZED'
                                    GROUP BY d.DPT_ID
                                    ORDER BY d.DPT_ID ASC")->result_array();
        }

        //Y-AXIS :: SERIES IN HIGHCHART = ARRAY ('NAME' => 'EXP_CLASS', 'DATA' => ARRAY([EACH.DEPT(REM.BAL(KEY.NAME))]))
        public function get_expclass_series($year)
        {
            $classes = $this->db->query("SELECT * FROM expenditure_class ORDER BY EXPCLASS_ID");

            $series = array();
            foreach ($classes->result_array() as $class) 
            {
                $temp['name'] = $class['EXPCLASS_NAME'];
                $temp['data'] = $this->get_rembal($class['EXPCLASS_ID'], $year);
                $series[] = $temp;
            }
            return json_encode($series);
        }

        

        public function get_rembal($id, $year)
        {
            $exp_classes = $this->db->query("SELECT d1.DPT_NAME, 
                                            ( (
                                                SELECT IFNULL(SUM(le.LBP_EXP_AMOUNT),0)
                                                FROM expenditure_class ec
                                                LEFT JOIN expenditure e ON e.EXPENDITURE_CLASS_EXPCLASS_ID=ec.EXPCLASS_ID
                                                LEFT JOIN lbp_expenditure le ON le.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                                                LEFT JOIN lbp_form lf ON lf.FRM_ID=le.LBP_FORM_FRM_ID
                                                LEFT JOIN user u ON u.USR_ID=lf.USER_USR_ID
                                                LEFT JOIN department d2 ON d2.DPT_ID=u.DEPARTMENT_DPT_ID
                                                WHERE d2.DPT_STATUS = 'ACTIVE'
                                                AND ec.EXPCLASS_ID = $id
                                                AND d2.DPT_ID = d1.DPT_ID
                                                AND lf.FRM_STATUS = 'FINALIZED'
                                                AND lf.FRM_YEAR = $year
                                              ) 
                                              - 
                                              (
                                                SELECT IFNULL(SUM(p.PART_AMOUNT),0)
                                                FROM expenditure_class ec
                                                LEFT JOIN expenditure e ON e.EXPENDITURE_CLASS_EXPCLASS_ID=ec.EXPCLASS_ID
                                                LEFT JOIN particular p ON p.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                                                LEFT JOIN obligation_request obr ON obr.OBR_ID=p.OBLIGATION_REQUEST_OBR_ID
                                                LEFT JOIN user u ON u.USR_ID=obr.USER_USR_ID
                                                LEFT JOIN department d2 ON d2.DPT_ID=u.DEPARTMENT_DPT_ID
                                                WHERE d2.DPT_STATUS = 'ACTIVE'
                                                AND ec.EXPCLASS_ID = $id
                                                AND d2.DPT_ID = d1.DPT_ID
                                                AND obr.OBR_STATUS = 'APPROVED'
                                                AND obr.obrNoYear = $year
                                              ) 
                                                -
                                              (
                                                SELECT IFNULL(SUM(a.amount),0) FROM department d2
                                                LEFT JOIN augmentation a ON a.dept_id=d2.DPT_ID
                                                LEFT JOIN expenditure e ON e.EXPENDITURE_id=a.exp_id
                                                LEFT JOIN expenditure_class ec ON ec.EXPCLASS_ID=e.EXPENDITURE_CLASS_EXPCLASS_ID
                                                WHERE d2.DPT_STATUS = 'ACTIVE'
                                                AND d2.DPT_ID = d1.DPT_ID
                                                AND YEAR(a.augmented_date) = $year
                                                AND ec.EXPCLASS_ID = $id
                                              ) 
                                            ) AS bal
                                            FROM department d1
                                            GROUP BY d1.DPT_ID
                                            ORDER BY d1.DPT_ID")->result_array();
            $data = array();
            foreach ($exp_classes as $key) {
                $data[] = $key['bal']+0.001;
            }
            return $data;
        }

        public function get_grand_total($year)
        {
            $query = $this->db->query("SELECT d1.DPT_NAME, 
                                            ( (
                                                SELECT IFNULL(SUM(le.LBP_EXP_AMOUNT),0)
                                                FROM expenditure_class ec
                                                LEFT JOIN expenditure e ON e.EXPENDITURE_CLASS_EXPCLASS_ID=ec.EXPCLASS_ID
                                                LEFT JOIN lbp_expenditure le ON le.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                                                LEFT JOIN lbp_form lf ON lf.FRM_ID=le.LBP_FORM_FRM_ID
                                                LEFT JOIN user u ON u.USR_ID=lf.USER_USR_ID
                                                LEFT JOIN department d2 ON d2.DPT_ID=u.DEPARTMENT_DPT_ID
                                                WHERE d2.DPT_STATUS = 'ACTIVE'
                                                AND lf.FRM_STATUS = 'FINALIZED'
                                                AND d2.DPT_ID = d1.DPT_ID
                                                AND lf.FRM_YEAR = $year
                                              ) 
                                                - 
                                              (
                                                SELECT IFNULL(SUM(p.PART_AMOUNT),0)
                                                FROM expenditure_class ec
                                                LEFT JOIN expenditure e ON e.EXPENDITURE_CLASS_EXPCLASS_ID=ec.EXPCLASS_ID
                                                LEFT JOIN particular p ON p.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                                                LEFT JOIN obligation_request obr ON obr.OBR_ID=p.OBLIGATION_REQUEST_OBR_ID
                                                LEFT JOIN user u ON u.USR_ID=obr.USER_USR_ID
                                                LEFT JOIN department d2 ON d2.DPT_ID=u.DEPARTMENT_DPT_ID
                                                WHERE d2.DPT_STATUS = 'ACTIVE'
                                                AND d2.DPT_ID = d1.DPT_ID
                                                AND obr.OBR_STATUS = 'APPROVED'
                                                AND obr.obrNoYear = $year
                                              ) 
                                                -
                                              (
                                                SELECT IFNULL(SUM(a.amount),0) FROM department d2
                                                LEFT JOIN augmentation a ON a.dept_id=d2.DPT_ID
                                                LEFT JOIN expenditure e ON e.EXPENDITURE_id=a.exp_id
                                                LEFT JOIN expenditure_class ec ON ec.EXPCLASS_ID=e.EXPENDITURE_CLASS_EXPCLASS_ID
                                                WHERE YEAR(a.augmented_date) = $year
                                                AND d2.DPT_STATUS = 'ACTIVE'
                                                AND d2.DPT_ID = d1.DPT_ID
                                              )  
                                            ) AS bal
                                            FROM department d1
                                            GROUP BY d1.DPT_ID
                                            ORDER BY d1.DPT_ID")->result_array();
            $data = array();
            foreach ($query as $q) {
                $data[] = $q['bal']+0.001;
            }
            return $data;
        }

        public function read_augmentedAmount($year, $classID, $deptID)
        {
            $data1 = $this->db->query("SELECT IFNULL(SUM(le.LBP_EXP_AMOUNT),0) as amt
                    FROM expenditure_class ec
                    LEFT JOIN expenditure e ON e.EXPENDITURE_CLASS_EXPCLASS_ID=ec.EXPCLASS_ID
                    LEFT JOIN lbp_expenditure le ON le.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                    LEFT JOIN lbp_form lf ON lf.FRM_ID=le.LBP_FORM_FRM_ID
                    LEFT JOIN user u ON u.USR_ID=lf.USER_USR_ID
                    LEFT JOIN department d2 ON d2.DPT_ID=u.DEPARTMENT_DPT_ID
                    WHERE d2.DPT_STATUS = 'ACTIVE'
                    AND ec.EXPCLASS_ID = $classID
                    AND d2.DPT_ID = $deptID
                    AND lf.FRM_STATUS = 'FINALIZED'
                    AND lf.FRM_YEAR = $year")->row()->amt;
            $data2 = $this->db->query("SELECT IFNULL(SUM(p.PART_AMOUNT),0) as amt1
                    FROM expenditure_class ec
                    LEFT JOIN expenditure e ON e.EXPENDITURE_CLASS_EXPCLASS_ID=ec.EXPCLASS_ID
                    LEFT JOIN particular p ON p.EXPENDITURE_EXPENDITURE_id=e.EXPENDITURE_id
                    LEFT JOIN obligation_request obr ON obr.OBR_ID=p.OBLIGATION_REQUEST_OBR_ID
                    LEFT JOIN user u ON u.USR_ID=obr.USER_USR_ID
                    LEFT JOIN department d2 ON d2.DPT_ID=u.DEPARTMENT_DPT_ID
                    WHERE d2.DPT_STATUS = 'ACTIVE'
                    AND ec.EXPCLASS_ID = $classID
                    AND d2.DPT_ID = $deptID
                    AND obr.OBR_STATUS = 'APPROVED'
                    AND obr.obrNoYear = $year")->row()->amt1;
            $data3 = $this->db->query("SELECT IFNULL(SUM(a.amount),0) as amt2 FROM department d2
                    LEFT JOIN augmentation a ON a.dept_id=d2.DPT_ID
                    LEFT JOIN expenditure e ON e.EXPENDITURE_id=a.exp_id
                    LEFT JOIN expenditure_class ec ON ec.EXPCLASS_ID=e.EXPENDITURE_CLASS_EXPCLASS_ID
                    WHERE d2.DPT_STATUS = 'ACTIVE'
                    AND d2.DPT_ID = $deptID
                    AND YEAR(a.augmented_date) = $year
                    AND ec.EXPCLASS_ID = $classID")->row()->amt2;
            echo ($data1-$data2-$data3);
        }
    }
    
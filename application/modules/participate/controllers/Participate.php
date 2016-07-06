<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Participate extends MY_Controller {

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->model('participate/Participate_manager_model');
        $this->load->model('department/Degree_model');
        $this->load->model('branch/Course_model');
        $this->load->model('batch/Batch_model');
        $this->load->model('semester/Semester_model');
        $this->load->model('classes/Class_model');
        $this->load->model('student/Student_model');
        $this->load->model('participate/Survey_question_model');
    }
    
    /**
     * list of participate, survey question suevey , student upload document
     */

    function index() {
        $this->data['title'] = 'Participate';
        $this->data['page'] = 'participate';
        $this->data['participate'] = $this->Participate_manager_model->order_by_column('created_date');
        $this->data['course'] = $this->Course_model->order_by_column('c_name');
        $this->data['semester'] = $this->Semester_model->order_by_column('s_name');
        $this->data['batch'] = $this->Batch_model->order_by_column('b_name');
        $this->data['degree'] = $this->Degree_model->order_by_column('d_name');
        $this->data['questions'] = $this->Participate_manager_model->get_question();
        $this->data['student'] = $this->Participate_manager_model->get_students();
        $this->data['survey'] = $this->Participate_manager_model->get_survey();
        $this->data['page'] = 'participate';
        $this->data['title'] = 'Participate';
        $this->data['edit_participate'] = 'Edit Participate';
        $this->data['add_title'] = 'Add Participate';
        $this->data['volunteer'] = $this->Participate_manager_model->get_volunteer();
        $this->data['uploads'] = $this->Participate_manager_model->get_uploads();
        $this->data['page'] = 'participate';
        $this->__template('participate/index', $this->data);
    }

    /**
     * Add Participate
     */
    function create() {

        if ($_POST) {
            $data = array();
            $data['pp_degree'] = $this->input->post('degree');
            $data['pp_title'] = $this->input->post('title');
            $data['pp_batch'] = $this->input->post('batch');

            $data['pp_semester'] = $this->input->post('semester');
            $data['pp_desc'] = $this->input->post('description');
            $data['pp_dos'] = $this->input->post('dateofsubmission');
            $data['pp_status'] = 1;

            $data['pp_course'] = $this->input->post('course');
            $data['created_date'] = date('Y-m-d');


            $this->db->insert('participate_manager', $data);
            $last_id = $this->db->insert_id();
            $batch = $data['pp_batch'];
            $degree = $data['pp_degree'];
            $semester = $data['pp_semester'];
            $course = $data['pp_course'];
            if ($degree == 'All') {
                $this->db->select('std_id');
                $students = $this->db->get('student')->result();
            } else {
                if ($course == 'All') {
                    $this->db->select('std_id');
                    $this->db->where('std_degree', $degree);
                    $students = $this->db->get('student')->result();
                } else {
                    if ($batch == 'All') {
                        $this->db->select('std_id');
                        $this->db->where('std_degree', $degree);
                        $this->db->where('course_id', $course);
                        $students = $this->db->get('student')->result();
                    } else {
                        if ($semester == 'All') {
                            $this->db->select('std_id');
                            $this->db->where('std_batch', $batch);
                            $this->db->where('std_degree', $degree);
                            $this->db->where('course_id', $course);
                            $students = $this->db->get('student')->result();
                        } else {
                            $this->db->select('std_id');
                            $this->db->where('std_batch', $batch);
                            $this->db->where('std_degree', $degree);
                            $this->db->where('course_id', $course);
                            $this->db->where('semester_id', $semester);
                            $students = $this->db->get('student')->result();
                        }
                    }
                }
            }
            $std_id = '';
            foreach ($students as $std) {
                $id = $std->std_id;
                $std_id[] = $id;
                //  $student_id = implode(",",$id);
                // $std_ids[] =$student_id;
            }
            if ($std_id != '') {
                $student_ids = implode(",", $std_id);
            } else {
                $student_ids = '';
            }
            $this->db->where("notification_type", "participate_manager");
            $res = $this->db->get("notification_type")->result();
            if ($res != '') {
                $notification_id = $res[0]->notification_type_id;
                $notify['notification_type_id'] = $notification_id;
                $notify['student_ids'] = $student_ids;
                $notify['degree_id'] = $data['pp_degree'];
                $notify['course_id'] = $data['pp_course'];
                $notify['batch_id'] = $data['pp_batch'];
                $notify['semester_id'] = $data['pp_semester'];
                $notify['data_id'] = $last_id;
                $this->db->insert("notification", $notify);
            }
            $this->flash_notification('Participate Added successfully');
            redirect(base_url() . 'participate/', 'refresh');
        }

        redirect(base_url('participate'));
    }

    /**
     * Delete Participate
     * @param int $id
     */
    function delete($id) {
        $this->Participate_manager_model->delete($id);
        $this->flash_notification('Participate is successfully deleted');
        redirect(base_url('participate'));
    }
    
    /**
     * Update Participate
     * @param int $id
     */

    function update($id = '') {
        $data = array();
        if ($_POST) {
            $data['pp_degree'] = $this->input->post('degree');
            $data['pp_title'] = $this->input->post('title');
            $data['pp_batch'] = $this->input->post('batch');
            $data['pp_semester'] = $this->input->post('semester');
            $data['pp_desc'] = $this->input->post('description');
            $data['pp_dos'] = $this->input->post('dateofsubmission1');
            $data['pp_course'] = $this->input->post('course');
            $data['pp_status'] = 1;
            $this->Participate_manager_model->update($id, $data);
            $this->flash_notification('Participate Updated Successfully');
        }

        redirect(base_url('participate'));
    }
    
    function delete_question($id='')
    {
         $this->Survey_question_model->delete($id);
         $this->flash_notification('Survey Question is successfully deleted');
        redirect(base_url('participate'));
    }
    
    /**
     * add survey question
     */
    function create_question()
    {
        if($_POST)
        {

            $indata['question'] = $this->input->post('question');
            $indata['question_status'] = $this->input->post('status');
            $indata['question_description'] = $this->input->post('description');

            $this->Survey_question_model->insert($indata);
            $this->flash_notification('Question Added Successfully');
            redirect(base_url('participate'));
        }
    }
    
    /**
     * Update Survey Question 
     * @param int $param
     */
    
    public function update_question($param='')
    {
         $indata['question'] = $this->input->post('question');
         $indata['question_status'] = $this->input->post('status');
         $indata['question_description'] = $this->input->post('description');         
         $this->Survey_question_model->update($param, $indata);
         $this->flash_notification('Question Update Successfully');
         redirect(base_url('participate'));
    }

    /**
     * Get Course
     * @param string $param
     */
    function get_cource($param = '') {
        $did = $this->input->post("degree");
        if ($did != '') {
            if ($did == "All") {
                
            } else {
                $cource = $this->db->get_where("course", array("degree_id" => $did))->result_array();
                $html = '<option value="">Select Branch</option>';
                if ($param == '') {
                    $html .= '<option value="All">All</option>';
                }
                foreach ($cource as $crs):
                    $html .='<option value="' . $crs['course_id'] . '">' . $crs['c_name'] . '</option>';

                endforeach;
                echo $html;
            }
        }
    }

    /**
     * Get batches
     * @param string $param
     */
    function get_batchs($param = '') {
        $cid = $this->input->post("course");
        $did = $this->input->post("degree");
        $html = '';
        if ($cid != '') {
            if ($cid == "All") {
                $html .= '<option value="All">All</option>';
            } else {
                $batch = $this->db->query("SELECT * FROM batch WHERE FIND_IN_SET('" . $did . "',degree_id) AND FIND_IN_SET('" . $cid . "',course_id)")->result_array();
                $html = '<option value="">Select Batch</option>';
                if ($param == "") {
                    $html .= '<option value="All">All</option>';
                }
                foreach ($batch as $btc):
                    $html .='<option value="' . $btc['b_id'] . '">' . $btc['b_name'] . '</option>';

                endforeach;
            }
            echo $html;
        }
    }

    /**
     * get all semester
     */
    function get_semesterall() {

        $cid = $this->input->post("course");

        if ($cid == 'All') {
            $course = $this->db->get('course')->result_array();
        } else {

            $course = $this->db->get_where('course', array('course_id' => $cid))->result_array();
        }

        $semexplode = explode(',', $course[0]['semester_id']);
        $semester = $this->db->get('semester')->result_array();
        $semdata = '';
        foreach ($semester as $sem) {
            if (in_array($sem['s_id'], $semexplode)) {
                $semdata[] = $sem;
            }
        }
        $option = "<option value=''>Select semester</option>";
        $option .="<option value='All'>All</option>";

        foreach ($semdata as $s) {
            $option .="<option value=" . $s['s_id'] . ">" . $s['s_name'] . "</option>";
        }
        echo $option;
    }

}

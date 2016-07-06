<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment extends MY_Controller {

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->model('assignment/Assignment_manager_model');
        $this->load->model('department/Degree_model');
        $this->load->model('branch/Course_model');
        $this->load->model('batch/Batch_model');
        $this->load->model('semester/Semester_model');
        $this->load->model('classes/Class_model');
        $this->load->model('assignment/Assignment_submission_model');
    }

    function index() {
        $this->data['title'] = 'Assignment';
        $this->data['page'] = 'assignment';
        $this->data['assignment'] = $this->Assignment_manager_model->order_by_column('assign_dos');
        $this->data['submitedassignment'] = $this->Assignment_submission_model->get_submitted_assignments();
        $this->data['course'] = $this->Course_model->order_by_column('c_name');
        $this->data['semester'] = $this->Semester_model->order_by_column('s_name');
        $this->data['batch'] = $this->Batch_model->order_by_column('b_name');
        $this->data['degree'] = $this->Degree_model->order_by_column('d_name');       
        $this->data['page'] = 'assignment';
        $this->data['late_submitted'] = $this->Assignment_submission_model->get_late_submitted_assignment();
        $this->data['not_submitted'] = $this->Crud_model->get_not_submitted_assignment();
        $this->__template('assignment/index', $this->data);
    }

    function create() {
        if ($_POST) {


            if ($_FILES['assignmentfile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('assignmentfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'assignment/', 'refresh');
                } else {
                    $file = $this->upload->data();

                    $data['assign_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['assign_filename'];
                }
            } else {
                $data['assign_filename'] = '';
                $file_url = '';
            }

            $data['course_id'] = $this->input->post('course');
            $data['assign_title'] = $this->input->post('title');
            $data['assign_batch'] = $this->input->post('batch');
            $data['assign_url'] = $file_url;
            $data['assign_sem'] = $this->input->post('semester');
            $data['class_id'] = $this->input->post('class');
            $data['assign_desc'] = $this->input->post('description');
            $data['assign_dos'] = nice_date($this->input->post('submissiondate'), 'Y-m-d');
            $data['assignment_instruction'] = $this->input->post('instruction');
            $data['assign_status'] = 1;
            $data['created_date'] = date('Y-m-d');
            $data['assign_degree'] = $this->input->post('degree');

            $last_id = $this->Assignment_manager_model->insert($data);


            $assign_degree = $data['assign_degree'];
            $assign_sem = $data['assign_sem'];
            $assign_batch = $data['assign_batch'];
            $course_id = $data['course_id'];
            $this->db->where('std_batch', $assign_batch);
            $this->db->where('semester_id', $assign_sem);
            $this->db->where('std_degree', $assign_degree);
            $this->db->where('course_id', $course_id);
            $students = $this->db->get('student')->result();
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
            $this->db->where("notification_type", "assignment_manager");
            $res = $this->db->get("notification_type")->result();
            if ($res != '') {
                $notification_id = $res[0]->notification_type_id;
                $notify['notification_type_id'] = $notification_id;
                $notify['student_ids'] = $student_ids;
                $notify['degree_id'] = $assign_degree;
                $notify['course_id'] = $course_id;
                $notify['batch_id'] = $assign_batch;
                $notify['semester_id'] = $assign_sem;
                $notify['data_id'] = $last_id;
                $this->db->insert("notification", $notify);
            }

            $this->session->set_flashdata('flash_message', 'Assignment Added Successfully');
            redirect(base_url() . 'assignment/', 'refresh');
        }

        redirect(base_url('assignment'));
    }

    function delete($id) {
        $this->Assignment_manager_model->delete($id);
        $this->session->set_flashdata('flash_message', 'Assignment is successfully deleted.');
        redirect(base_url('assignment'));
    }

    function update($id = '') {
        $data = array();
        if ($_POST) {

            if ($_FILES['assignmentfile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('assignmentfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'assignment/', 'refresh');
                } else {
                    $file = $this->upload->data();

                    $data['assign_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['assign_filename'];
                }
            } else {

                $file_url = $this->input->post('assignmenturl');
            }


            $data['course_id'] = $this->input->post('course');
            $data['assign_title'] = $this->input->post('title');
            $data['assign_batch'] = $this->input->post('batch');
            $data['assign_url'] = $file_url;
            $data['assignment_instruction'] = $this->input->post('instruction');
            $data['assign_sem'] = $this->input->post('semester');
            $data['class_id'] = $this->input->post('class');
            $data['assign_desc'] = $this->input->post('description');
            $data['assign_dos'] = nice_date($this->input->post('submissiondate1'), 'Y-m-d');
            $data['assign_degree'] = $this->input->post('degree');
            $data['assign_status'] = 1;

            $this->Assignment_manager_model->update($id, $data);
            $this->session->set_flashdata('flash_message', 'Assignment Updated Successfully');
        }

        redirect(base_url('assignment'));
    }

    function reopen($id = '') {
        if ($_POST) {
            $implode = implode(",", $this->input->post('student'));
            if (!empty($implode)) {
                $insert['student_id'] = $implode;
                $insert['assign_id'] = $id;
                $this->Assignment_submission_model->insert_update_assignment_reopen($insert, $id);
                $this->session->set_flashdata('flash_message', 'Assignment reopen Successfully');
                redirect(base_url() . 'assignment/', 'refresh');
            } else {
                $this->session->set_flashdata('flash_message', 'Assignment reopen failed');
                redirect(base_url() . 'assignment/', 'refresh');
            }
        }
    }

    function getassignment($param = '') {
        $data['degree'] = $this->Degree_model->order_by_column('d_name');
        $data['course'] = $this->Course_model->order_by_column('c_name');
        $data['batch'] = $this->Batch_model->order_by_column('b_name');
        $data['semester'] = $this->Semester_model->order_by_column('s_name');
        $data['class'] = $this->Class_model->order_by_column('class_name');


        if ($param == 'allassignment') {
            $degree = $this->input->post('degree');
            $course = $this->input->post('course');
            $batch = $this->input->post('batch');
            $semester = $this->input->post("semester");
            $class = $this->input->post("divclass");
            $get_by_many = array("assign_degree" => $degree,
                "course_id" => $course,
                "assign_batch" => $batch,
                "assign_sem" => $semester,
                "class_id" => $class);
            $data['assignment'] = $this->Assignment_manager_model->get_many_by($get_by_many);

            $data['param'] = $param;
        }


        if ($param == "submitted") {

            $degree = $this->input->post('degree');
            $course = $this->input->post('course');
            $batch = $this->input->post('batch');
            $semester = $this->input->post("semester");
            $data['submitedassignment'] = $this->Assignment_submission_model->get_submitted_assignment($course, $batch, $degree, $semester);
            $data['param'] = $param;
        }

        if ($param == "notsubmitted") {
            $degree = $this->input->post('degree');
            $course = $this->input->post('course');
            $batch = $this->input->post('batch');
            $semester = $this->input->post("semester");
            $class = $this->input->post("divclass");
            $assign_id = $this->input->post("assign_id");
            $data['not_submitted'] = $this->Assignment_submission_model->not_submitted_assignment($course, $batch, $degree, $semester, $class, $assign_id);
            $data['param'] = $param;
            $data['assign_id'] = $assign_id;
        }
         if ($param == "assessments") {
            $degree = $this->input->post('degree');
            $course = $this->input->post('course');
            $batch = $this->input->post('batch');
            $semester = $this->input->post("semester");
            $data['submitedassignment'] = $this->Assignment_submission_model->filter_assessment($course, $batch, $degree, $semester);
            $data['param'] = $param;
        }
        $this->load->view("assignment/getassignment", $data);
    }

    function getassignment_list() {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post("semester");
        $class = $this->input->post("divclass");


        $get_by_many = array("assign_degree" => $degree,
            "course_id" => $course,
            "assign_batch" => $batch,
            "assign_sem" => $semester,
            "class_id" => $class);
        $res = $this->Assignment_manager_model->get_many_by($get_by_many);
        echo json_encode($res);
    }

    function checkassignments() {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post('semester');
        $title = $this->input->post('title');
        $get_by_many = array("assign_degree" => $degree,
            "course_id" => $course,
            "assign_batch" => $batch,
            "assign_sem" => $semester,
            'assign_title' => $title);
        $res = $this->Assignment_manager_model->get_many_by($get_by_many);
        echo json_encode($res);
    }

    /**
     * check assignment
     */
    function checkassignment($id = '') {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post('semester');
        $title = $this->input->post('title');
        $get_by_many = array("assign_degree" => $degree,
            "course_id" => $course,
            "assign_batch" => $batch,
            "assign_sem" => $semester,
            'assign_title' => $title,
            'assign_id!=' => $id);
        $res = $this->Assignment_manager_model->get_many_by($get_by_many);


        echo json_encode($res);
    }

}

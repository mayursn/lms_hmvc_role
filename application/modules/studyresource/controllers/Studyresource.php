<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Studyresource extends MY_Controller {
    

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->model('studyresource/Study_resources_model');
        $this->load->model('department/Degree_model');
        $this->load->model('branch/Course_model');
        $this->load->model('batch/Batch_model');
        $this->load->model('semester/Semester_model');
<<<<<<< HEAD
        $this->load->model('classes/Class_model');        
=======
        $this->load->model('classes/Class_model');     
       // $this->load->model('notification');
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

    function index() {
        $this->data['title'] = 'Study Resource';
        $this->data['page'] = 'studyresource';
        $this->data['studyresource'] = $this->Study_resources_model->order_by_column('created_date');        
         $this->data['course'] = $this->Course_model->order_by_column('c_name');
        $this->data['semester'] = $this->Semester_model->order_by_column('s_name');
        $this->data['batch'] = $this->Batch_model->order_by_column('b_name');
        $this->data['degree'] = $this->Degree_model->order_by_column('d_name');          
        $this->__template('studyresource/index', $this->data);
    }

    function create() {
        if ($_POST) {
              
            if ($_FILES['resourcefile']['name'] != "") {

                    $config['upload_path'] = 'uploads/project_file';
                    $config['allowed_types'] = '*';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    //$this->upload->set_allowed_types('*');	

                    if (!$this->upload->do_upload('resourcefile')) {
                        $this->session->set_flashdata('flash_message', "Invalid File!");
                        redirect(base_url() . 'studyresource/', 'refresh');
                    } else {
                        $file = $this->upload->data();
                        $data['study_filename'] = $file['file_name'];
                        $file_url = base_url() . 'uploads/project_file/' . $data['study_filename'];
                    }
                } else {

                    $file_url = '';
                }
                $data['study_degree'] = $this->input->post('degree');
                $data['study_title'] = $this->input->post('title');
                $data['study_batch'] = $this->input->post('batch');
                $data['study_url'] = $file_url;
                $data['study_sem'] = $this->input->post('semester');
                $data['study_course'] = $this->input->post('course');
                $data['study_status'] = 1;
                $data['created_date'] = date('Y-m-d');               
                $last_id = $this->Study_resources_model->insert($data);                 
                $batch = $data['study_batch'];
                $degree = $data['study_degree'];
                $semester = $data['study_sem'];
                $course = $data['study_course'];
                if ($degree == 'All') {
                    $students = $this->db->get('student')->result();
                } else {
                    if ($course == 'All') {
                        $this->db->where('std_degree', $degree);
                        $students = $this->db->get('student')->result();
                    } else {
                        if ($batch == 'All') {
                            $this->db->where('std_degree', $degree);
                            $this->db->where('course_id', $course);
                            $students = $this->db->get('student')->result();
                        } else {
                            if ($semester == 'All') {
                                $this->db->where('std_batch', $batch);
                                $this->db->where('std_degree', $degree);
                                $this->db->where('course_id', $course);
                                $students = $this->db->get('student')->result();
                            } else {
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
                $this->db->where("notification_type", "study_resources");
<<<<<<< HEAD
                $res = $this->db->get("notification_type")->result();
                if ($res != '') {
                    $notification_id = $res[0]->notification_type_id;
=======
                $res = $this->db->get("notification_type")->row();
                if ($res != '') {
                    $notification_id = $res->notification_type_id;
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    $notify['notification_type_id'] = $notification_id;
                    $notify['student_ids'] = $student_ids;
                    $notify['degree_id'] = $degree;
                    $notify['course_id'] = $course;
                    $notify['batch_id'] = $batch;
                    $notify['semester_id'] = $semester;
                    $notify['data_id'] = $last_id;
                    $this->db->insert("notification", $notify);
<<<<<<< HEAD
=======
                 
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                }
                $this->flash_notification('Study Resource Added Successfully');
               
        }

        redirect(base_url('studyresource'));
    }

    function delete($id) {
        $this->Study_resources_model->delete($id);
        $this->flash_notification('study Resource is successfully deleted.');
        redirect(base_url('studyresource'));
    }

    function update($id = '') {
        $data = array();
        if ($_POST) {
           
              
                if ($_FILES['resourcefile']['name'] != "") {
                    $config['upload_path'] = 'uploads/project_file';
                    $config['allowed_types'] = '*';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    //$this->upload->set_allowed_types('*');	

                    if (!$this->upload->do_upload('resourcefile')) {
                        $this->session->set_flashdata('flash_message', "Invalid File!");
                        redirect(base_url() . 'studyresource/', 'refresh');
                    } else {
                        $file = $this->upload->data();
                        $data['study_filename'] = $file['file_name'];
                        $file_url = base_url() . 'uploads/project_file/' . $data['study_filename'];
                    }
                } else {
                    $file_url = $this->input->post('pageurl');
                }
                $data['study_degree'] = $this->input->post('degree');
                $data['study_title'] = $this->input->post('title');
                $data['study_batch'] = $this->input->post('batch');
                $data['study_url'] = $file_url;
                $data['study_sem'] = $this->input->post('semester');
                $data['study_course'] = $this->input->post('course');
                $data['study_status'] = 1;
  
               $this->Study_resources_model->update($id,$data);
                $this->session->set_flashdata('flash_message', 'Studyresource Updated Successfully');
        }

        redirect(base_url('studyresource'));
    }
    
    /**
     * Get Course
     * @param string $param
     */
    function get_cource($param = '') {
        $did = $this->input->post("degree");
<<<<<<< HEAD
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
=======
         $cource = $this->db->get_where("course", array("degree_id" => $did))->result_array();
        echo json_encode($cource);
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

    /**
     * Get batches
     * @param string $param
     */
    function get_batchs($param = '') {
        $cid = $this->input->post("course");
        $did = $this->input->post("degree");
<<<<<<< HEAD
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
=======
        $batch = $this->db->query("SELECT * FROM batch WHERE FIND_IN_SET('" . $did . "',degree_id) AND FIND_IN_SET('" . $cid . "',course_id)")->result_array();
        echo json_encode($batch);
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

    /**
     * get all semester
     */
    function get_semesterall() {

        $cid = $this->input->post("course");

<<<<<<< HEAD
        if ($cid == 'All') {
            $course = $this->db->get('course')->result_array();
        } else {

=======
        if($cid == 'All'){
            $course = $this->db->get('course')->result_array();
        }else{
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
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
    
    /**
     * Get Course
     * @param string $param
     */
    function get_cource_all($param = '') {
        $did = $this->input->post("degree");
<<<<<<< HEAD
        $html = '';
        if ($did != '') {
            if ($did == "All") {
                $html = '<option value="">Select Branch</option>';
                $html .= '<option value="All">All</option>';
            } else {
                $this->db->select('course_id,c_name');
                 $this->db->order_by('c_name','ASC');
                $cource = $this->db->get_where("course", array("degree_id" => $did))->result_array();
                $html = '<option value="">Select Branch</option>';
                if ($param == '') {
                    $html .= '<option value="All">All</option>';
                }
                foreach ($cource as $crs):
                    $html .='<option value="' . $crs['course_id'] . '">' . $crs['c_name'] . '</option>';

                endforeach;
            }
        }
        echo $html;
=======
        $this->load->model('branch/Course_model');
       $cource = $this->Course_model->get_many_by(array("degree_id" => $did));
       echo json_encode($cource);
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }
    
    
    /**
     * Get batches
     * @param string $param
     */
    function get_batchs_all($param = '') {
        $cid = $this->input->post("course");
        $did = $this->input->post("degree");
<<<<<<< HEAD
        $html = '';
        if ($cid != '') {
            if ($cid == "All") {
                $html .= '<option value="">Select Batch</option>';
                $html .= '<option value="All">All</option>';
            } else {
                $batch = $this->db->query("SELECT b_id,b_name FROM batch WHERE FIND_IN_SET('" . $did . "',degree_id) AND FIND_IN_SET('" . $cid . "',course_id)")->result_array();
                $html .= '<option value="">Select Batch</option>';
                if ($param == "") {
                    $html .= '<option value="All">All</option>';
                }
                foreach ($batch as $btc):
                    $html .='<option value="' . $btc['b_id'] . '">' . $btc['b_name'] . '</option>';

                endforeach;
            }
            echo $html;
        }
=======
        $this->load->model('batch/Batch_model');
       $batch = $this->Batch_model->department_branch_batch($did,$cid);
        echo json_encode($batch);
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }
    
     function getstudyresource() {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post("semester");
<<<<<<< HEAD
        $data['course'] = $this->Crud_model->get_all_course_optimize();
        $data['semester'] = $this->Crud_model->get_all_semester_optimize();
        $data['batch'] = $this->Crud_model->get_all_batch_optimize();
        $data['degree'] = $this->Crud_model->get_all_degree_optimize();
        //   $data['student'] = $this->db->get('student')->result();

        if ($degree == "All") {
            $this->db->select('study_id,study_title,study_degree,study_course,study_batch,study_sem,study_dos,study_filename');
            $data['studyresource'] = $this->db->get('study_resources')->result();
=======
        $this->data['course'] = $this->Course_model->order_by_column('c_name');
        $this->data['semester'] = $this->Semester_model->order_by_column('s_name');
        $this->data['batch'] = $this->Batch_model->order_by_column('b_name');
        $this->data['degree'] = $this->Degree_model->order_by_column('d_name');
        //   $data['student'] = $this->db->get('student')->result();

        if ($degree == "All") {
            
            $this->data['studyresource'] = $this->Study_resources_model->order_by_column('study_id');
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        } else {
            if ($course == "All") {
                $this->db->select('study_id,study_title,study_degree,study_course,study_batch,study_sem,study_dos,study_filename');
                $this->db->where("study_degree", $degree);
<<<<<<< HEAD
                $data['studyresource'] = $this->db->get('study_resources')->result();
=======
                $array = array("study_degree"=> $degree);
                $this->Study_resources_model->get_many_by('study_id');
                $this->data['studyresource'] = $this->db->get('study_resources')->result();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
            } else {
                if ($batch == 'All') {
                    $this->db->select('study_id,study_title,study_degree,study_course,study_batch,study_sem,study_dos,study_filename');
                    $this->db->where("study_course", $course);
                    $this->db->where("study_degree", $degree);
<<<<<<< HEAD
                    $data['studyresource'] = $this->db->get('study_resources')->result();
=======
                    $this->data['studyresource'] = $this->db->get('study_resources')->result();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                } else {
                    if ($semester == "All") {
                        $this->db->select('study_id,study_title,study_degree,study_course,study_batch,study_sem,study_dos,study_filename');
                        $this->db->where("study_batch", $batch);
                        $this->db->where("study_course", $course);
                        $this->db->where("study_degree", $degree);
<<<<<<< HEAD
                        $data['studyresource'] = $this->db->get('study_resources')->result();
=======
                        $this->data['studyresource'] = $this->db->get('study_resources')->result();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    } else {
                        $this->db->select('study_id,study_title,study_degree,study_course,study_batch,study_sem,study_dos,study_filename');
                        $this->db->where("study_sem", $semester);
                        $this->db->where("study_batch", $batch);
                        $this->db->where("study_course", $course);
                        $this->db->where("study_degree", $degree);
<<<<<<< HEAD
                        $data['studyresource'] = $this->db->get('study_resources')->result();
=======
                        $this->data['studyresource'] = $this->db->get('study_resources')->result();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    }
                }
            }
        }
<<<<<<< HEAD
        $this->load->view("studyresource/getstudyresource", $data);
=======
        $this->load->view("studyresource/getstudyresource", $this->data);
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }
    
       /**
     * studyresource course
     * @param int $param
     */
    function get_courcestudy($param = '') {

        $did = $this->input->post("degree");
<<<<<<< HEAD

        if ($did != '') {


             $this->db->order_by('c_name','ASC');
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
=======
        
         $this->db->order_by('c_name','ASC');
         $cource = $this->db->get_where("course", array("degree_id" => $did))->result_array();
         echo json_encode($cource);
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }


}

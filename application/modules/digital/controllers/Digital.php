<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Digital extends MY_Controller {

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->model('digital/Library_manager_model');
        $this->load->model('department/Degree_model');
        $this->load->model('branch/Course_model');
        $this->load->model('batch/Batch_model');
        $this->load->model('semester/Semester_model');
        $this->load->model('classes/Class_model');
    
    }
    
    /**
     * list of participate, survey question suevey , student upload document
     */

    function index() {
        $this->data['title'] = 'Digital Library';
        $this->data['page'] = 'library';
        $this->data['library'] = $this->Library_manager_model->order_by_column('created_date');
        $this->data['course'] = $this->Course_model->order_by_column('c_name');
        $this->data['semester'] = $this->Semester_model->order_by_column('s_name');
        $this->data['batch'] = $this->Batch_model->order_by_column('b_name');
        $this->data['degree'] = $this->Degree_model->order_by_column('d_name');
        $this->data['edit_participate'] = 'Edit Digital Library';
        $this->data['add_title'] = 'Add Digital Library';
        
        $this->__template('digital/index', $this->data);
    }

    /**
     * Add Participate
     */
    function create() {

        if ($_POST) {
            $data = array();
             if ($_FILES['libraryfile']['name'] != "") {
                    $config['upload_path'] = 'uploads/project_file';
                    $config['allowed_types'] = '*';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    //$this->upload->set_allowed_types('*');	

                    if (!$this->upload->do_upload('libraryfile')) {
                        $this->session->set_flashdata('flash_message', "Invalid File!");
                        redirect(base_url() . 'digital/', 'refresh');
                    } else {
                        $file = $this->upload->data();

                        $data['lm_filename'] = $file['file_name'];
                        $file_url = base_url() . 'uploads/project_file/' . $data['lm_filename'];
                    }
                } else {
                    $file_url = '';
                }

                $data['lm_degree'] = $this->input->post('degree');
                $data['lm_title'] = $this->input->post('title');
                $data['lm_batch'] = $this->input->post('batch');
                $data['lm_url'] = $file_url;
                $data['lm_semester'] = $this->input->post('semester');
                $data['lm_desc'] = $this->input->post('description');
                $data['lm_status'] = 1;
                //  $data['lm_student_id'] = $this->input->post('student');
                $data['lm_course'] = $this->input->post('course');
                $data['created_date'] = date('Y-m-d');                
                $last_id = $this->Library_manager_model->insert($data);
                $batch = $data['lm_batch'];
                $degree = $data['lm_degree'];
                $semester = $data['lm_semester'];
                $course = $data['lm_course'];
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
                $this->db->where("notification_type", "library_manager");
                $res = $this->db->get("notification_type")->result();
                if ($res != '') {
                    $notification_id = $res[0]->notification_type_id;
                    $notify['notification_type_id'] = $notification_id;
                    $notify['student_ids'] = $student_ids;
                    $notify['degree_id'] = $degree;
                    $notify['course_id'] = $course;
                    $notify['batch_id'] = $batch;
                    $notify['semester_id'] = $semester;
                    $notify['data_id'] = $last_id;
                    $this->db->insert("notification", $notify);
                }
                $this->flash_notification('Digital library added successfully');
                redirect(base_url() . 'digital/', 'refresh');
        }

        redirect(base_url('digital'));
    }

    /**
     * Delete Participate
     * @param int $id
     */
    function delete($id) {
        $this->Library_manager_model->delete($id);
        $this->flash_notification('Digital Library is successfully deleted');
        redirect(base_url('digital'));
    }
    
    /**
     * Update Participate
     * @param int $id
     */

    function update($id = '') {
        $data = array();
        if ($_POST) {
            if ($_FILES['libraryfile']['name'] != "") {
                    if (file_exists("uploads/project_file/" . $this->input->post('txtoldfile'))) {
                        unlink("uploads/project_file/" . $this->input->post('txtoldfile'));
                    }
                    $config['upload_path'] = 'uploads/project_file';
                    $config['allowed_types'] = '*';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('libraryfile')) {
                        $this->flash_notification("Invalid File!");
                        redirect(base_url() . 'digital/', 'refresh');
                    } else {
                        $file = $this->upload->data();
                        $data['lm_filename'] = $file['file_name'];
                        $file_url = base_url() . 'uploads/project_file/' . $data['lm_filename'];
                    }
                } else {
                    $file_url = $this->input->post('pageurl');
                }
                $data['lm_degree'] = $this->input->post('degree');
                $data['lm_title'] = $this->input->post('title');
                $data['lm_batch'] = $this->input->post('batch');
                $data['lm_url'] = $file_url;
                $data['lm_semester'] = $this->input->post('semester');
                $data['lm_desc'] = $this->input->post('description');
                $data['lm_status'] = 1;
                //  $data['lm_student_id'] = $this->input->post('student');
                $data['lm_course'] = $this->input->post('course');                
                
                $this->Library_manager_model->update($id, $data);
                $this->flash_notification('Digital Library Updated Successfully');

                redirect(base_url() . 'digital/', 'refresh');
            
        }

    redirect(base_url() . 'digital/', 'refresh');
    }
    
    
    /**
     * get library list
     * @param String $param
     */
    function getlibrary($param = '') {

        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post("semester");
<<<<<<< HEAD
        $data['course'] = $this->Course_model->order_by_column('c_name');
        $data['semester'] = $this->Semester_model->order_by_column('s_name');
        $data['batch'] = $this->Batch_model->order_by_column('b_name');
        $data['degree'] = $this->Degree_model->order_by_column('d_name');

        if ($degree == "All") {
          $data['library'] =  $this->Library_manager_model->order_by_column('created_date');
=======
        $this->data['course'] = $this->Course_model->order_by_column('c_name');
        $this->data['semester'] = $this->Semester_model->order_by_column('s_name');
        $this->data['batch'] = $this->Batch_model->order_by_column('b_name');
        $this->data['degree'] = $this->Degree_model->order_by_column('d_name');

        if ($degree == "All") {
          $this->data['library'] =  $this->Library_manager_model->order_by_column('created_date');
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        } else {
            if ($course == "All") {
                $this->db->select('lm_id, lm_title, lm_degree, lm_batch, lm_course, lm_url, lm_semester, lm_filename');
                $this->db->where("lm_degree", $degree);
<<<<<<< HEAD
                $data['library'] = $this->db->get('library_manager')->result();
=======
                $this->data['library'] = $this->db->get('library_manager')->result();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
            } else {
                if ($batch == 'All') {
                    $this->db->select('lm_id, lm_title, lm_degree, lm_batch, lm_course, lm_url, lm_semester, lm_filename');
                    $this->db->where("lm_course", $course);
                    $this->db->where("lm_degree", $degree);
<<<<<<< HEAD
                    $data['library'] = $this->db->get('library_manager')->result();
=======
                    $this->data['library'] = $this->db->get('library_manager')->result();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                } else {
                    if ($semester == "All") {
                        $this->db->select('lm_id, lm_title, lm_degree, lm_batch, lm_course, lm_url, lm_semester, lm_filename');
                        $this->db->where("lm_batch", $batch);
                        $this->db->where("lm_course", $course);
                        $this->db->where("lm_degree", $degree);
<<<<<<< HEAD
                        $data['library'] = $this->db->get('library_manager')->result();
=======
                        $this->data['library'] = $this->db->get('library_manager')->result();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    } else {
                        $this->db->select('lm_id, lm_title, lm_degree, lm_batch, lm_course, lm_url, lm_semester, lm_filename');
                        $this->db->where("lm_semester", $semester);
                        $this->db->where("lm_batch", $batch);
                        $this->db->where("lm_course", $course);
                        $this->db->where("lm_degree", $degree);
<<<<<<< HEAD
                        $data['library'] = $this->db->get('library_manager')->result();
=======
                        $this->data['library'] = $this->db->get('library_manager')->result();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    }
                }
            }
        }



<<<<<<< HEAD
        $this->load->view("digital/getlibrary", $data);
=======
        $this->load->view("digital/getlibrary", $this->data);
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

    
   
    
    
    /**
     * Get Course
     * @param string $param
     */
    function get_cource($param = '') {
<<<<<<< HEAD
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
=======
        
        $did = $this->input->post("degree");
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
<<<<<<< HEAD
        $option = "<option value=''>Select semester</option>";
        $option .="<option value='All'>All</option>";

        foreach ($semdata as $s) {
            $option .="<option value=" . $s['s_id'] . ">" . $s['s_name'] . "</option>";
        }
        echo $option;
=======
        echo json_encode($semdata);
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
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

}

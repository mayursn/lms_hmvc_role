<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('student/Student_model');
        $this->load->model('department/Degree_model');
<<<<<<< HEAD
=======
         $this->load->model('examschedual/Exam_time_table_model');
         if($this->session->userdata('std_id'))
         {
         $notification = show_notification($this->session->userdata('std_id'));                            
         $this->session->set_userdata('notifications', $notification);
         }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

    /**
     * Index action
     */
    function index() {
        $this->data['title'] = 'Student';
        $this->data['page'] = 'student';
        $this->data['department'] = $this->Degree_model->order_by_column('d_name');
        $this->__template('student/index', $this->data);
    }
<<<<<<< HEAD
=======
    
    function dashboard()
    {
        
            
            $this->load->model('studyresource/Study_resources_model');
            $this->load->model('digital/Library_manager_model');
            $this->load->model('student/Student_model');
            $this->load->model('todo/Todo_list_model');
            $this->data['studyresource'] = $this->Study_resources_model->order_by_column('created_date');
             $student_detail = $this->db->select('std_id, semester_id, std_degree, course_id, class_id, std_batch')
                ->from('student')
                ->where('std_id', $this->session->userdata('std_id'))
                ->get()
                ->row();
        $this->data['title'] = 'Student Dashboard';

        
        $this->data['library'] = $this->Library_manager_model->order_by_column('created_date');
        $this->data['exam_listing'] = $this->student_exam_listing_widget($student_detail);
        $this->data['cms_pages'] = $this->student_cms_page_list_widget($student_detail);
        $streaming = $this->streaming_list_widget($student_detail);
        $this->data['all'] = $streaming['all'];
        $this->data['live_streaming'] = $streaming['live_streaming'];
        $this->data['todolist'] = $this->Todo_list_model->get_todo();
        // $this->data['timeline'] = $this->Student_model->get_timline();
        $this->data['timline_todolist'] = $this->Student_model->get_timline_todolist();
        $this->data['timline_event'] = $this->Student_model->get_timline_event();
        $this->data['timelinecount'] = $this->Student_model->get_timeline_date_count();
         $user_id = $this->session->userdata('std_id');
        $this->data['growth']  = $this->Student_model->get_growth($user_id);
        $this->data['page'] = 'dashboard';
        $this->__template('student/dashboard', $this->data);
    }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4

    /**
     * Create student
     */
    function create() {
        if ($_POST) {
<<<<<<< HEAD
            $user_id = $this->create_student_user($_POST, $_FILES);
            $student_id = $this->Student_model->insert(array(
                'user_id' => $user_id,
                'email' => $_POST['email_id'],
                'name' => $_POST['f_name'] . ' ' . $_POST['l_name'],
                'std_first_name' => $_POST['f_name'],
                'std_last_name' => $_POST['l_name'],
                'std_gender' => ucfirst($_POST['gen']),
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'zip' => $_POST['zip'],
                'std_birthdate' => date('Y-m-d', strtotime($_POST['birthdate'])),
                'std_marital' => $_POST['maritalstatus'],
                'std_batch' => $_POST['batch'],
                'semester_id' => $_POST['semester'],
                'std_degree' => $_POST['degree'],
                'course_id' => $_POST['course'],
                'class_id' => $_POST['class'],
                'std_about' => $_POST['std_about'],
                'std_mobile' => $_POST['mobileno'],
                'parent_name' => $_POST['parentname'],
                'parent_contact' => $_POST['parentcontact'],
                'parent_email' => $_POST['parent_email_id'],
                'degree' => $_POST['degree'],
                'admission_type_id' => $_POST['admissiontype'],
                'std_fb' => $_POST['facebook'],
                'std_twitter' => $_POST['twitter'],
                'std_status' => 1
            ));
            $this->assign_student_roll($_POST['course'], $_POST['semester'], $student_id);
            $this->flash_notification('Student is successfully created.');
        }

        redirect(base_url('student'));
    }

    /**
     * Generate student roll no
     * @param string $branch
     * @param string $semester
     * @param string $student_id
     * @return int
     */
    function generate_student_roll($branch, $semester, $student_id) {
        //$roll_no = 0;
        $student = $this->Student_model->last_record_by_condition(array(
            'course_id' => $branch,
            'semester_id' => $semester
        ));
        if ($student) {
            $roll_no = (int) $student[1]->std_roll;
            $roll_no++;
        } else {
            $roll_no = date('Y') . $branch . $semester . $student_id;
        }

        return $roll_no;
    }

    /**
     * Assign student roll number
     * @param string $branch
     * @param string $semester
     * @param string $student_id
     */
    function assign_student_roll($branch, $semester, $student_id) {
        $student_roll_number = $this->generate_student_roll($branch, $semester, $student_id);
        $data['std_roll'] = $student_roll_number;
        $this->Student_model->update($student_id, $data);
    }

    /**
     * Email student credentials
     * @param type $student
     */
    function email_student_credential($student) {
        $subject = 'LMS Login Credentials';
        $message = 'Hello, ' . $student['f_name'] . ' ' . $student['l_name'];
        $message .= "<br/>Your email address is registered with LMS. ";
        $message .= "Now you can access your LMS account by following credentials.";
        $message .= "<br/>Email: " . $student['email_id'];
        $message .= "<br/>Password: " . $student['password'];
=======
            $this->load->model('user/Role_model');
            $this->load->model('user/User_model');
            $role = $this->Role_model->get_by(array(
                'role_name' => 'Student'
            ));
            
            $role_array = array("first_name"=>$_POST['f_name'],
                            "last_name"=>$_POST['l_name'],
                            "email"=>$_POST['email_id'],
                            "password"=>$this->__hash($_POST['password']),
                             "role_id"=>"3");
            $insert_id = $this->User_model->insert($role_array);
            $array = array("user_id"=>$insert_id,
                            "name"=>$_POST['f_name'].' '.$_POST['l_name'],
                            "std_first_name"=>$_POST['f_name'],
                            "std_last_name"=>$_POST['l_name'],
                            "email"=>$_POST['email_id'],
                            "std_batch"=>$_POST['batch'],
                            "semester_id"=>$_POST['semester'],
                            "std_degree"=>$_POST['degree'],
                            "course_id"=>$_POST['course'],
                            "class_id"=>$_POST['class']);
            
            
             $this->Student_model->insert($array);
        }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

    /**
     * Upload student profile picture
     * @param array $_FILES
     * @return string
     */
    function upload_student_profile_pic($files) {
        if ($files['profilefile']['name'] != '') {
            $config['upload_path'] = 'uploads/student_image';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('profilefile')) {
                $this->session->set_flashdata('flash_message', "Invalid File!");
                redirect(base_url('student'));
            } else {
                $file = $this->upload->data();
                $data['profile_photo'] = $file['file_name'];
                //$file_url = base_url().'uploads/project_file/'.$data['lm_filename'];
            }
        } else {
            $data['profile_photo'] = '';
        }
<<<<<<< HEAD

        return $data['profile_photo'];
    }

    /**
     * Create student user
     * @param array $student
     * @return int
     */
    function create_student_user($student, $files) {
        $user_id = 0;
        if ($student) {
            $this->load->model('user/Role_model');
            $this->load->model('user/User_model');
            $role = $this->Role_model->get_by(array(
                'role_name' => 'Student'
            ));

            $user_id = $this->User_model->insert(array(
                'first_name' => $student['f_name'],
                'last_name' => $student['l_name'],
                'email' => $student['email_id'],
                'password' => Modules::run('user/__hash', $student['password']),
                'gender' => ucfirst($student['gen']),
                'zip_code' => $student['zip'],
                'role_id' => $role->role_id,
                'is_active' => 1,
                'profile_pic' => $this->upload_student_profile_pic($files)
            ));
        }

        return $user_id;
    }

    /**
     * Delete student
     * @param string $id
     */
    function delete($id) {
        
    }

    /**
     * Update student
     * @param string $id
     */
    function update($id) {
        if ($_POST) {
            $this->Student_model->update($id, array(
                //'email' => $_POST['email_id'],
                'name' => $_POST['f_name'] . ' ' . $_POST['l_name'],
                'std_first_name' => $_POST['f_name'],
                'std_last_name' => $_POST['l_name'],
                'std_gender' => ucfirst($_POST['gen']),
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'zip' => $_POST['zip'],
                'std_birthdate' => date('Y-m-d', strtotime($_POST['birthdate'])),
                'std_marital' => $_POST['maritalstatus'],
                'std_batch' => $_POST['batch'],
                'semester_id' => $_POST['semester'],
                'std_degree' => $_POST['degree'],
                'course_id' => $_POST['course'],
                'class_id' => $_POST['class'],
                'std_about' => $_POST['std_about'],
                'std_mobile' => $_POST['mobileno'],
                'parent_name' => $_POST['parentname'],
                'parent_contact' => $_POST['parentcontact'],
                'parent_email' => $_POST['parent_email_id'],
                'degree' => $_POST['degree'],
                'admission_type_id' => $_POST['admissiontype'],
                'std_fb' => $_POST['facebook'],
                'std_twitter' => $_POST['twitter'],
                'std_status' => 1
            ));
            $this->password_compare_and_update($_POST['user_id'], $_POST['password']);
            $this->flash_notification('Student is successfully updated.');
        }

        redirect(base_url('student'));
    }

    /**
     * Compare and update password
     * @param string $user_id
     * @param string $password
     * @return string
     */
    function password_compare_and_update($user_id, $password) {
        $this->load->model('user/User_model');
        $user = $this->User_model->get($user_id);

        if ($user->password !== $password) {
            $password = Modules::run('user/__hash', $password);
            $this->User_model->update($user_id, array(
                'password' => $password
            ));
        }
    }

    function update_student_user($id) {
=======
        
        return $data['profile_photo'];
    }
    
    function create_student_user($student) {
        
    }

    function delete() {
        
    }

    function update($id) {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        
    }

    /**
     * Load filtered students
     */
    function filtered_student() {
        $data['datastudent'] = $this->Student_model->get_many_by(array(
            'std_degree' => $_POST['degree'],
            'course_id' => $_POST['course'],
            'std_batch' => $_POST['batch'],
            'semester_id' => $_POST['sem'],
            'class_id' => $_POST['divclass'],
            'std_status' => 1
        ));

        $this->load->view('student/filtered_student', $data);
    }

    /**
     * Check student email
     */
    function check_student_email() {
        $this->load->model('user/User_model');
        $email = $this->input->post('eid');
        $data = $this->User_model->get_by(array(
            'email' => $email
        ));
        if ($data) {
            echo "false";
        } else {
            echo "true";
        }
    }
<<<<<<< HEAD

    /**
     * Get student by department, branch, batch and semester
     * @param string $department
     * @param string $branch
     * @param string $batch
     * @param string $semester
     */
    function student_list($department, $branch, $batch, $semester) {
        $students = $this->Student_model->get_many_by(array(
            'std_degree' => $department,
            'course_id' => $branch,
            'std_batch' => $batch,
            'semester_id' => $semester
        ));
        
        echo json_encode($students);
    }   
=======
    
   /**
     * Student list by degree, course, batch, and semester
     * @param type $degree
     * @param type $course
     * @param type $batch
     * @param type $semester
     */
    function student_list_from_degree_course_batch_semester($degree, $course, $batch, $semester) {
     
        $student = $this->Student_model->student_list_from_degree_course_batch_semester($degree, $course, $batch, $semester);

        echo json_encode($student);
    }
    
    /**
     * Generate hash of the data
     * @param string $str
     * @return string
     */
    function __hash($str) {
        return hash('md5', $str . config_item('encryption_key'));
    }
    
    
    function student_exam_listing_widget($student_details) {       
       
        
        $page_data['exam_listing'] = $this->Exam_time_table_model->get_exam_listing($student_details);
        //check for time table
        $student_id = $this->session->userdata('std_id');
        foreach ($page_data['exam_listing'] as $exam) {
            $is_pass = TRUE;
            //find exam schedule
            $exam_schedule = $this->Exam_time_table_model->get_exam_subject_details($exam);
            //find marks
            $exam_marks = $this->Exam_time_table_model->get_marks_subject($student_id,$exam);

            //check for pass or fail
            foreach ($exam_marks as $mark) {
                if ($mark->mark_obtained < $exam->passing_mark) {
                    $is_pass = FALSE;
                    break;
                }
            }

            //find remedial exams if fail
            
        }

        return $page_data['exam_listing'];
    }
    
    
    /**
     * 
     * @param mixed $student_detail
     * @return mixed
     */
    
     function student_cms_page_list_widget($student_detail) {
        //echo $student_detail->std_batc
        $cms_pages = $this->db->get_where('cms_pages', array(
                    'am_course' => $student_detail->course_id,
                    'am_semester' => $student_detail->semester_id,
                    'am_batch' => $student_detail->std_batch
                ))->result();
        return $cms_pages;
    }
    
    /**
     * 
     * @param mixed $student_details
     * @return mixed
     */
     function streaming_list_widget($student_details) {
        $date = date('Y-m-d');
        //var_dump($student_details);
        $where = array(
            'course' => $student_details->course_id,
            'semester' => $student_details->semester_id,
            'is_active' => '1'
        );
        $live_streaming = $this->db->select()
                        ->from('broadcast_and_streaming')
                        ->where($where)
                        ->like('created_at', $date)
                        ->get()->result();
        $all = $this->db->select()->from('broadcast_and_streaming')
                ->where('course', 'all')
                //->or_where('semester', 'all')
                ->where('is_active', '1')
                ->like('created_at', $date)
                ->get()
                ->result();
        $data['all'] = $all;
        $data['live_streaming'] = $live_streaming;


        return $data;
    }

    /**
     * Exam marks
     * @param string $exam_id
     */
    function exam_marks($exam_id = '') {
        $student_id = $this->session->userdata('std_id');
        $this->data['page'] = 'exam_marks';
        $this->data['title'] = 'Exam Marks';
        $this->data['exam_id'] = $exam_id;
        $this->data['exam_details'] = $this->Exam_time_table_model->exam_detail($exam_id);
        $student_details = $this->Student_model->get($this->session->userdata('std_id'));
        $this->data['student_detail'] = $student_details;
        $this->data['department'] = $this->Degree_model->get($student_details->std_degree);
        $this->data['batch_detail'] = $this->Student_model->student_batch_course_detail($student_details->std_id);
        $this->data['student_marks'] = $this->Student_model->student_marks($student_details->std_id, $exam_id);
        $this->data['exam_listing'] = $this->Student_model->student_exam_list($student_details->course_id, $student_details->semester_id);

        $student_id = $this->session->userdata('std_id');
        foreach ($this->data['exam_listing'] as $exam) {
            $is_pass = TRUE;
            //find exam schedule
            $exam_schedule = $this->Exam_time_table_model->exam_schedule($exam->em_id);

            //find marks
            $exam_marks = $this->Student_model->student_marks($student_id, $exam->em_id);

            //check for pass or fail
            foreach ($exam_marks as $mark) {
                if ($mark->mark_obtained < $exam->passing_mark) {
                    $is_pass = FALSE;
                    break;
                }
            }

            
            
        }

        clear_notification('marks_manager', $this->session->userdata('std_id'));
        unset($this->session->userdata('notifications')['marks_manaher']);
        $this->__template('student/exam_marks', $this->data);
    }

      /**
     * Statements of marks
     */
    function statement_of_marks() {
        $this->data['student_details'] = $this->Student_model->get($this->session->userdata('std_id'));
        $this->data['exam_listing'] = $this->Student_model->student_exam_list($this->data['student_details']->course_id, $this->data['student_details']->semester_id);
        $this->data['page'] = 'statement_of_marks';
        $this->data['title'] = 'Statement of Marks';
        $this->__template('student/statement_of_marks', $this->data);
    }
 
     /**
     * Students of the particular course
     * @param int $course_id
     */
    function course_students($course_id = '') {
   
        $students = $this->Student_model->get_many_by(array('course_id'=>$course_id));
        echo json_encode($students);
        
    }

     /**
     * Clear Library Notification
     */
    function digitallibrary() {

        clear_notification('library_manager', $this->session->userdata('std_id'));
        unset($this->session->userdata('notifications')['library_manager']);
        redirect(base_url() . 'student/dashboard/', 'refresh');
    }
    
     /**
     * Clear Notification
     */
    function studyresources() {
        clear_notification('study_resources', $this->session->userdata('std_id'));
        unset($this->session->userdata('notifications')['study_resources']);        
        redirect(base_url() . 'student/dashboard/', 'refresh');
    }

     /**
     * Exam listing
     */
    function exam_listing() {
        $std_id = $this->session->userdata('std_id');
        $student_details = $this->Student_model->get($std_id);
       
        $course_id = $student_details->course_id;
        $semester_id = $student_details->semester_id;
        $this->data['exam_listing'] = $this->Student_model->student_exam_list($course_id,$semester_id );

        //check for time table
        $student_id = $this->session->userdata('std_id');
        foreach ($this->data['exam_listing'] as $exam) {
            $is_pass = TRUE;
            //find exam schedule
            $exam_schedule = $this->Student_model->exam_schedule($exam->em_id);

            //find marks
            $exam_marks = $this->Student_model->student_marks($student_id, $exam->em_id);

            //check for pass or fail
            foreach ($exam_marks as $mark) {
                if ($mark->mark_obtained < $exam->passing_mark) {
                    $is_pass = FALSE;
                    break;
                }
            }
            
        }
        $this->data['page'] = 'exam';
        $this->data['title'] = 'Exam';
        clear_notification('exam_manager', $this->session->userdata('std_id'));
        clear_notification('exam_time_table', $this->session->userdata('std_id'));
        unset($this->session->userdata('notifications')['exam_manager']);
        unset($this->session->userdata('notifications')['exam_time_table']);
        $this->__template('student/exam_listing', $this->data);
    }
    
    function attendance_report() {
        $this->data['title'] = 'Attendance Report';
        $this->data['page'] = 'attendance_report';
        $std_id =$this->session->userdata('std_id');
        $this->data['student'] = $this->Student_model->get($std_id);
        $student = $this->data['student'];
       $course_id = $student->course_id;
        $semester_id = $student->semester_id;
        
        $this->data['subjects'] = $this->Student_model->student_subject_list(
       $course_id,$semester_id );
        
        $this->__template('student/attendance_report', $this->data);
    }
    
    function attendance_report_detail($subject_id) {
        $this->data['title'] = 'Attendance reports details';
        $this->data['page'] = 'attendance';
        $this->data['report'] = $this->Student_model->attendance_detail_report(
                $this->session->userdata('std_id'), $subject_id);
        $this->__template('student/attendance_report_detail', $this->data);
    }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4

}

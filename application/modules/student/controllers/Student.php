<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('student/Student_model');
        $this->load->model('department/Degree_model');
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

    /**
     * Create student
     */
    function create() {
        if ($_POST) {
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

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->model('user/User_model');
<<<<<<< HEAD
=======
        $this->load->model('todo/Todo_list_model');
        $this->load->model('professor/Professor_model');
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

    /**
     * Index
     */
    function index() {
        if ($this->is_user_logged_in()) {
            redirect('user/dashboard');
        }
        $this->dashboard();
    }

    /**
     * Login
     */
    function login() {
        if ($this->is_user_logged_in()) {
            redirect('user/dashboard');
        }

        if ($_POST) {
            $email = trim($this->input->post('email'));
            $password = $this->__hash(trim($this->input->post('password')));
            $this->process_login($email, $password);
        }
        $this->data['title'] = 'User Login';
        $this->load->view('user/user/login', $this->data);
    }

    /**
     * Process login
     * @param string $email
     * @param string $passowrd
     */
    function process_login($email = '', $passowrd = '') {
        if ($email && $passowrd) {
            $user = $this->User_model->with('role')
                    ->get_by(array(
                'email' => $email,
                'password' => $passowrd,
                'is_active' => 1
                    )
            );

            if ($user) {
<<<<<<< HEAD
                $session_data = array(
                    'user_id' => $user->user_id,
                    'email' => $user->email,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
=======
                if ($user->role->role_id == "3") {
                    $this->load->model('student/Student_model');
                    $user_id = $user->user_id;
                    $this->db->where("user_id", $user_id);
                    $std = $this->db->get("student")->row()->std_id;
                    
                    $this->session->set_userdata("std_id", $std);
                   
                }

                if ($user->role->role_id == "2") {
                    $this->load->model('professor/Professor_model');
                    $user_id = $user->user_id;
                    $this->db->where("user_id", $user_id);
                    $professor = $this->db->get("professor")->row();
                    $this->session->set_userdata("professor_id", $professor->professor_id);
                    $this->session->set_userdata("professor_department", $professor->department);
                }
                $session_data = array(
                    'user_id' => $user->user_id,
                    'email' => $user->email,
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    'is_logged_in' => TRUE,
                    'role_id' => $user->role->role_id,
                    'role_name' => $user->role->role_name
                );
                $this->session->set_userdata($session_data);

                redirect(base_url('user/dashboard'));
            } else {
                $this->session->set_flashdata('message', 'Invalid username or password');
                $this->session->set_flashdata('type', 'danger');
                redirect(base_url('user/login'));
            }
        } else {
            redirect(base_url('user/login'));
        }
    }

    /**
     * Generate hash of the data
     * @param string $str
     * @return string
     */
    function __hash($str) {
        return hash('md5', $str . config_item('encryption_key'));
    }

    /**
     * Dashboard
     */
    function dashboard() {
        $this->redirect_if_user_not_logged_in();
        $this->data['title'] = 'Dashboard';
        $this->data['page'] = 'dashboard';
<<<<<<< HEAD
        $this->data['todolist'] = $this->Crud_model->get_todo();
        $this->data['timeline'] = $this->Crud_model->get_timline();
        $this->__template('user/user/dashboard', $this->data);
=======
        $this->data['todolist'] = $this->Todo_list_model->get_todo();

        if ($this->session->userdata('std_id')) {
            $this->data['timeline'] = $this->Crud_model->get_timline();
            redirect(base_url() . 'student/dashboard');
        } elseif ($this->session->userdata('professor_id')) {
            redirect(base_url() . 'professor/dashboard');
        } else {

            $this->load->helper('report_chart');

            $this->data['new_student_joining'] = new_student_registration();
            $this->data['male_vs_female_course_wise'] = male_vs_female_course_wise();
            $this->calendar_json();
            $this->data['todolist'] = $this->Todo_list_model->get_todo();
            $this->data['recent_professor'] = $this->Professor_model->get_recent_professor();
            $this->data['title'] = 'Dashboard';
            $this->data['page'] = 'dashboard';
            $this->__template('user/user/dashboard', $this->data);
        }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

    /**
     * Logout from the system
     */
    function logout() {
        $this->session->sess_destroy();

        redirect(base_url('user/login'));
    }

    function change_password() {
        
    }

<<<<<<< HEAD
    /**
     * Forgot password
     */
    function forgot_password() {
        if ($_POST) {
            //check for student
            $record = $this->User_model->get_by(array(
                'email' => $_POST['email']
            ));
            
            if ($record) {                
                $user_id = $record->user_id;
                $random_string = $this->random_string_generate();
                
                $this->update_forgot_password_key($user_id, $random_string);
                $url = $this->forgot_password_url($user_id, $random_string);

                // email configuration
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'mayur.ghadiya@searchnative.in',
                    'smtp_pass' => 'the mayurz97375',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('mayur.ghadiya@searchnative.in', 'Learning Management System');
                $this->email->to($_POST['email']);
                $this->email->subject('Reset your LMS password');
                $message .= "Please click on below link to reset your LMS password";
                $message .= "<br/>";
                $message .= $url;
                $this->email->message($message);
                $this->email->send();
                $this->session->set_flashdata('message', 'Please check your email to reset your password.');
                $this->session->set_flashdata('type', 'success');
                redirect(base_url('user/login'));
            } else {
                // email is not registered in the system
                $this->session->set_flashdata('email_not_found', 'Email is not registered in the system.');
                redirect(base_url('user/login'));
            }
            //check for admin
            //check for professor
        } else {
            redirect(base_url('user/login'));
        }
    }

    /**
     * Generate random string
     * @return string
     */
    function random_string_generate() {
        $this->load->helper('string');
        return random_string('alnum', 16);
    }

    /**
     * Forgot password url
     * @param string $user_type
     * @param string $user_id
     * @param string $random_string
     * @return string
     */
    function forgot_password_url($user_id, $random_string) {
        $this->load->library('encrypt');
        $base_url = base_url();
        $user_type = hash('md5', $user_type . config_item('encryption_key'));

        return $base_url . 'user/reset_password/' . $user_id . '/' . $random_string;
    }

    /**
     * Update forgot password key for user
     * @param string $user_type
     * @param string $user_id
     * @param string $key
     */
    function update_forgot_password_key($user_id, $key) {
        if ($user_id != '' && $key != '') {
            $this->User_model->update($user_id, array(
                'password_key'  => $key
            ));
        } else {
            redirect(base_url('user/login'));
        }
    }

    /**
     * Reset password
     * @param string $user_id
     * @param string $user_type
     * @param string $key
     */
    function reset_password($user_id = '', $key = '') {
        if ($_POST) {
            if ($this->compare_reset_password($_POST['password'], $_POST['confirm_password'])) {
                // update password
                $this->User_model->update($user_id, array(
                    'password' => $this->__hash($_POST['password']),
                    'password_key'  => ''
                ));
                $this->session->set_flashdata('message', 'Password was successully reseted.');
                $this->session->set_flashdata('type', 'success');
                redirect(base_url('user/login'));
            } else {
                $this->session->set_flashdata('message', 'Password was mismatched.');
                $this->session->set_flashdata('type', 'danger');
                redirect(base_url('user/reset_password/' . $user_id  . '/' . $key));
            }
        }

        if ($user_id && $key) {       
            $is_key_present = $this->User_model->get_by(array(
                'password_key'  => $key
            ));
            
            if ($is_key_present) {
                $this->data['title'] = 'Forgot Password';
                $this->load->view('user/user/reset_password', $this->data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
=======
    function forgot_password() {
        
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

    /**
     * User list
     */
    function user_list() {
        $this->data['title'] = 'Users List';
        $this->data['page'] = 'user';
        $this->data['users'] = $this->User_model->get_users();
        $this->__template('user/user/user_list', $this->data);
    }

    /**
<<<<<<< HEAD
     * Compare reset password
     * @param string $password
     * @param strin $confirm_password
     * @return boolean
     */
    function compare_reset_password($password, $confirm_password) {
        if (trim($password) == trim($confirm_password)) {
            return TRUE;
        }

        return FALSE;
    }

    /**
=======
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
     * Create user
     */
    function create() {
        if ($_POST) {
            $this->User_model->insert(array(
                'first_name' => $_POST['first_name'],
                'middle_name' => $_POST['middle_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => $this->__hash($_POST['password']),
                'gender' => $_POST['gender'],
                'mobile' => $_POST['mobile'],
                'phone' => $_POST['phone'],
                'city' => $_POST['city'],
                'zip_code' => $_POST['zip_code'],
                'address' => $_POST['address'],
                'role_id' => $_POST['role'],
                'is_active' => 1
            ));
            $this->flash_notification('New user is successfully created.');
        }

        redirect(base_url('user/user_list'));
    }

<<<<<<< HEAD
    function delete($id) {
        
    }

    /**
     * Update user information
     * @param string $id
     */
    function update($id = '') {
        if ($_POST) {
            $this->User_model->update($id, array(
                'first_name' => $_POST['first_name'],
                'middle_name' => $_POST['middle_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                //'password' => $this->__hash($_POST['password']),
                'gender' => $_POST['gender'],
                'mobile' => $_POST['mobile'],
                'phone' => $_POST['phone'],
                'city' => $_POST['city'],
                'zip_code' => $_POST['zip_code'],
                'address' => $_POST['address'],
                'role_id' => $_POST['role'],
                'is_active' => $_POST['status']
            ));
            $this->password_compare_and_update($id, $_POST['password']);
            $this->flash_notification('User is successfully updated.');
        }

        redirect(base_url('user/user_list'));
    }

    /**
     * Compare and update password
     * @param string $user_id
     * @param string $password
     * @return string
     */
    function password_compare_and_update($user_id, $password) {
        $user = $this->User_model->get($user_id);

        if ($user->password !== $password) {
            $password = Modules::run('user/__hash', $password);
            $this->User_model->update($user_id, array(
                'password' => $password
            ));
        }
    }

    /**
     * Check user email
     */
    function check_user_email($param = '') {
        $email = $this->input->post('email');
        if ($param == '') {
            $data = $this->User_model->get_by(array(
                'email' => $email
            ));
            if ($data) {
                echo "false";
            } else {
                echo "true";
            }
        } else {
            $data = $this->User_model->get_by(array(
                'user_id !=' => $param,
                'email' => $email
            ));
            if ($data) {
                echo "false";
            } else {
                echo "true";
            }
        }
    }

    function users_with_role($role_id) {
        $users = $this->User_model->with('role')
                ->get_many_by(array(
            'role_id' => $role_id
        ));

        echo json_encode($users);
=======
    function delete() {
        
    }

    function update() {
        
    }

    /**
     * Calendate json
     */
    function calendar_json() {
        $this->load->helper('file');
        $this->db->select('event_date AS date, event_name AS title, event_location AS Location, event_desc AS description');
        $this->db->select('DATE_FORMAT(event_date, "%d %b %Y") AS event_start_date, TIME_FORMAT(event_date, "%h:%i %p") AS event_start_time');
        $this->db->from('event_manager');
        $query = $this->db->get();
        $file = FCPATH . 'event.humanDate.json.php';
        $result = json_encode($query->result());

        write_file($file, $result);
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    }

}

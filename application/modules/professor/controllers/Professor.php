<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends MY_Controller {

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->model('professor/Professor_model');
    }

    /**
     * Index action
     */
    function index() {
        $this->data['title'] = 'Staff';
        $this->data['page'] = 'professor';
        $this->data['professor'] = $this->Professor_model->get_all();
        $this->__template('professor/index', $this->data);
    }

    /**
     * Create professor
     */
    function create() {
        if ($_POST) {
            $this->Professor_model->insert(array(
                'name' => $this->input->post('professor_name'),
                'email' => $this->input->post('email'),
                'password' => hash('md5', $this->input->post('password')),
                'real_pass' => $this->input->post('password'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'zip' => $this->input->post('zip_code'),
                'mobile' => $this->input->post('mobile'),
                'dob' => $this->input->post('dob'),
                'occupation' => $this->input->post('occupation'),
                'designation' => $this->input->post('designation'),
                'department' => $this->input->post('degree'),
                'branch' => $this->input->post('branch'),
                'about' => $this->input->post('about'),
                'subjects' => implode(',', $_POST['subjects'])
            ));
        }

        redirect(base_url('professor'));
    }

    function create_professor_user($professor, $files) {
        $this->load->model('user/User_model');
        $this->load->model('user/Role_model');
        $role = $this->Role_model->get_by(array(
            'role_name' => 'Professor'
        ));

        $user_id = $this->User_model->insert(array(
            'first_name' => $professor['professor_name'],
            'last_name' => '',
            'email' => $student['email'],
            'password' => Modules::run('user/__hash', $student['password']),
            'gender' => ucfirst($student['gen']),
            'zip_code' => $student['zip_code'],
            'role_id' => $role->role_id,
            'is_active' => 1,
            //'profile_pic' => $this->upload_student_profile_pic($files)
        ));
    }

    function delete($id) {
        
    }

    function update($id) {
        if($_POST) {
            echo '<pre>';
            var_dump($_POST);
            exit;
        }
    }

}

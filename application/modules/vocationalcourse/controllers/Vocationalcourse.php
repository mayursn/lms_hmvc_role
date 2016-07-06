<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vocationalcourse extends MY_Controller {

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->model('vocationalcourse/vocational_course_model');
    }

    function index() {
        $this->data['title'] = 'Vocational Course';
        $this->data['page'] = 'Vocationalcourse';
        $this->data['vocationalcourse'] = $this->vocational_course_model->order_by_column('course_name');
       
        $this->__template('vocationalcourse/index', $this->data);
    }
    
     function create() {
        if ($_POST) {
            $data['course_name'] = $this->input->post('course_name');
                $data['course_startdate'] = date('Y-m-d', strtotime($this->input->post('startdate')));
                $data['course_enddate'] = date('Y-m-d', strtotime($this->input->post('enddate')));
                $data['course_fee'] = $this->input->post('fee');
                $data['professor_id'] = $this->input->post('professor');
                $data['category_id'] = $this->input->post('category_id');
                $data['status'] = $this->status($this->input->post('course_status'));
                $this->vocational_course_model->insert($data);
            $this->flash_notification('Vocational course is successfully added.');
        }
        redirect(base_url('vocationalcourse'));
    }
    
     function update($id = '') {
        if ($_POST) {
                  $data['course_name'] = $this->input->post('course_name');
                $data['course_startdate'] = date('Y-m-d', strtotime($this->input->post('startdate1')));
                $data['course_enddate'] = date('Y-m-d', strtotime($this->input->post('enddate1')));
                $data['course_fee'] = $this->input->post('fee');
                $data['professor_id'] = $this->input->post('professor');
                $data['category_id'] = $this->input->post('category_id');
                $data['status'] = $this->input->post('course_status');
                $data['updated_date'] = date('Y-m-d');
                $this->vocational_course_model->update($id, $data);

            $this->flash_notification('Vocational course is successfully updated.');
        }

        redirect(base_url('vocationalcourse'));
    }
    function delete($id) {
        $this->vocational_course_model->delete($id);
        $this->flash_notification('Vocational course is successfully deleted.');

        redirect(base_url('vocationalcourse'));
    }
    function vocational_registered_student($param1 = '')
    {
        $this->data['title'] = 'Vocational Course';
        $this->data['page'] = 'Vocationalcourse';
        $this->data['student'] = $this->vocational_course_model->get_vocational_student($param1);
        $this->load->view('vocationalcourse/student', $this->data);
    }
}

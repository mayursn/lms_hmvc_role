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
        $this->load->model('attendance/Attendance_model');
        $this->load->model('department/Degree_model');
        $this->load->model('branch/Course_model');
        $this->load->model('batch/Batch_model');
        $this->load->model('semester/Semester_model');
        $this->load->model('classes/Class_model');
      
    }

    function index() {
        $this->data['title'] = 'Attendance';
        $this->data['page'] = 'attendance';
        $this->data['assignment'] = $this->Attendance_model->order_by_column('created_at');
      
        $this->data['course'] = $this->Course_model->order_by_column('c_name');
        $this->data['semester'] = $this->Semester_model->order_by_column('s_name');
        $this->data['batch'] = $this->Batch_model->order_by_column('b_name');
        $this->data['degree'] = $this->Degree_model->order_by_column('d_name');          
       
        $this->__template('attendance/index', $this->data);
    }

}

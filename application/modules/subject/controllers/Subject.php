<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('subject/Subject_model');
    }
    
    function index() {}
    
    function create() {}
    
    function delete() {}
    
    function update() {}
    
    /**
     * Branch subjects
     * @param string $branch_id
     */
    function branch_subject($branch_id) {
        $subjects = $this->Subject_model->get_many_by(array(
            'sm_course_id'  => $branch_id
        ));
        
        echo json_encode($subjects);
    }
}
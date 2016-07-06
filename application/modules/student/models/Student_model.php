<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends MY_Model {

    protected $primary_key = 'std_id';
    public $belongs_to = array('user');
    public $before_create = array('timestamps');

    /**
     * Set the timestamp fields
     * @param array $student
     * @return array
     */
    protected function timestamps($student) {
        $student['created_date'] = date('Y-m-d H:i:s');

        return $student;
    }

}

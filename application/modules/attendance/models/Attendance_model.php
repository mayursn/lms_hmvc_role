<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends MY_Model {
    
    protected $primary_key = 'attendance_id';
    
    public $before_create = array('timestamps');
    
    /**
     * Set timestamp field
     * @param array $attendance
     * @return array
     */
    protected function timestamps($attendance) {
        $attendance['created_at'] = date('Y-m-d H:i:s');        
        return $attendance;
    }
}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment_manager_model extends MY_Model {
    
    protected $primary_key = 'assign_id';
    
    public $before_create = array('timestamps');
    
    /**
     * Set timestamp field
     * @param array $degree
     * @return array
     */
    protected function timestamps($assignment) {
        $assignment['created_date'] = date('Y-m-d H:i:s');        
        return $assignment;
    }
}
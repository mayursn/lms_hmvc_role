<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Smart_syllabus_model extends MY_Model {
    
    protected $primary_key = 'syllabus_id';
    
    public $before_create = array('timestamps');
    
    /**
     * Set timestamp field
     * @param array $syallbus
     * @return array
     */
    protected function timestamps($syallbus) {
        $syallbus['created_date'] = date('Y-m-d H:i:s');        
        return $syallbus;
    }
}
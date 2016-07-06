<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Professor_model extends MY_Model {

    protected $primary_key = 'professor_id';
    public $before_create = array('timestamps');
    public $before_update = array('update_timestamps');

    /**
     * Set timestamp fields
     * @param array $professor
     * @return array
     */
    protected function timestamps($professor) {
        $professor['created_at'] = $professor['updated_at'] = date('Y-m-d H:i:s');
        
        return $professor;
    }

    /**
     * Set update timestamp field
     * @param array $professor
     * @return array
     */
    protected function update_timestamps($professor) {
        $professor['updated_at'] = date('Y-m-d H:i:s');
        
        return $professor;
    }

}

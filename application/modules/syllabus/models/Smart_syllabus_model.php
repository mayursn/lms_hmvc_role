<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Smart_syllabus_model extends MY_Model {
    
    protected $primary_key = 'syllabus_id';
    
    public $before_create = array('timestamps');
<<<<<<< HEAD
=======
     public $before_get = array('department_filter');
    
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    
    /**
     * Set timestamp field
     * @param array $syallbus
     * @return array
     */
    protected function timestamps($syallbus) {
        $syallbus['created_date'] = date('Y-m-d H:i:s');        
        return $syallbus;
    }
<<<<<<< HEAD
=======
    
    function department_filter()
    {
        if($this->session->userdata('professor_id'))
        {
            $dept = $this->session->userdata('professor_department');
            $this->db->where('syllabus_degree',$dept);
        }
    }
   
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
}
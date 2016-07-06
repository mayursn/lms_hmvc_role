<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Degree_model extends MY_Model {
<<<<<<< HEAD

    protected $primary_key = 'd_id';
    public $before_create = array('timestamps');
=======
    
    protected $primary_key = 'd_id';
    
    public $before_create = array('timestamps');
    public $before_get = array('department_filter');
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4

    /**
     * Set timestamp field
     * @param array $degree
     * @return array
     */
    protected function timestamps($degree) {
        $degree['created_date'] = date('Y-m-d H:i:s');
<<<<<<< HEAD

        return $degree;
    }

}
=======
        
        return $degree;
    }
    
   function department_filter()
   {
       
       if($this->session->userdata('professor_id'))
       {           
          $this->db->where('d_id',$this->session->userdata('professor_department'));
       }   
   }
    
}
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4

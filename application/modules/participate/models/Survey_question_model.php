<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_question_model extends MY_Model {
    
    protected $primary_key = 'sq_id';
    
<<<<<<< HEAD
=======
    
    function get_survey_question()
    {
        return $this->db->get_where('survey_question', array('question_status' => '1'))->result();
    }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
   
}
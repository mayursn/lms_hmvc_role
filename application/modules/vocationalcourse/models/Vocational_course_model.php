<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vocational_course_model extends MY_Model {
    
    protected $primary_key = 'vocational_course_id';
    
    public $before_create = array('timestamps');
    
<<<<<<< HEAD
    /**
     * Set timestamp field
     * @param array $degree
     * @return array
     */
    protected function timestamps($holiday) {
        $vocationalcourse['created_date'] = date('Y-m-d H:i:s');
        
        return $vocationalcourse;
    }
=======
    public $before_get = array('professor_vocational_course');


    /**
     * Set timestamp field
     * @param array $vocationalcourse
     * @return array
     */
    protected function timestamps($vocationalcourse) {
        $vocationalcourse['created_date	'] = date('Y-m-d H:i:s');
        
        return $vocationalcourse;
    }
    function professor_vocational_course()
    {
        if($this->session->userdata('professor_id'))
        {
            $id = $this->session->userdata('professor_id');
            $this->db->where('professor_id',$id);
        }
    }
    
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    function get_vocational_student($id)
    {
         return $this->db->select('vocational_course_fee.*, student.std_first_name,student.std_last_name,student.name, vocational_course.course_name,course_category.*,d.d_name,c.c_name,s.s_name')
                        ->from('vocational_course_fee')
                        ->where('vocational_course_fee.vocational_course_id',$id)
                        ->join('student', 'student.std_id = vocational_course_fee.student_id')
                        ->join('vocational_course', 'vocational_course.vocational_course_id = vocational_course_fee.vocational_course_id')
                        ->join('course_category', 'course_category.category_id = vocational_course.category_id')
                        ->join('degree d','d.d_id=student.std_degree')
                        ->join('course c','c.course_id=student.course_id')
                        ->join('semester s','s.s_id=student.semester_id')
                        ->get()
                        ->result();
    }
    
}
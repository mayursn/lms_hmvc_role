<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Project_manager_model extends MY_Model {

    protected $primary_key = 'pm_id';
    public $before_create = array('timestamps');
<<<<<<< HEAD

=======
    public $before_get = array('department_filter');
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    /**
     * Set timestamp field
     * @param array $degree
     * @return array
     */
<<<<<<< HEAD
=======
    
    
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    protected function timestamps($assignment) {
        $assignment['created_date'] = date('Y-m-d H:i:s');
        return $assignment;
    }
<<<<<<< HEAD
=======
    
    function department_filter()
    {
        if($this->session->userdata('professor_id'))
        {
            $dept = $this->session->userdata('professor_department');
            $this->db->where("pm_degree",$dept);
        }
    }
    
    public function get_student_project_list($degree,$batch,$sem,$course,$class,$std_id)
    {
        return $this->db->query("SELECT * FROM project_manager WHERE pm_degree='$degree' AND pm_batch = '$batch' AND pm_semester = '$sem' AND pm_course = '$course' AND class_id='$class' AND FIND_IN_SET('$std_id',pm_student_id)")->result();
    }
    public function submitted_project_by_student($std_id)
    {
        
                                $this->db->select('s.dos,s.document_file,a.pm_title');
                                $this->db->from('project_document_submission s');
                                $this->db->join('project_manager a', 'a.pm_id=s.project_id');
                                $this->db->where('s.student_id', $std_id);
                                 return $this->db->get();                               
    }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MY_Controller
{
    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->model('event/Event_manager_model');
    }
    
    function index() {
        $this->data['title'] = 'Event';
        $this->data['page'] = 'event';
        $this->data['events'] = $this->Event_manager_model->order_by_column('event_date');
        $this->__template('event/index', $this->data);
    }
    
    function create()
    {
         if ($_POST) {
             $data = array();
             $data['event_name'] = $this->input->post('event_name');
                $data['event_location'] = $this->input->post('event_location');
                $data['event_desc'] = $this->input->post('event_desc');
                $event_date = nice_date($this->input->post('event_date'),'Y-m-d');                
                $data['event_date'] = date('Y-m-d H:i:s', strtotime($event_date.' '.$_POST['event_time']));                                
                $data['event_end_date'] = $this->input->post('event_end_date');
                $data['group_id'] = $this->input->post('group');
<<<<<<< HEAD
            $this->Event_manager_model->insert($data);
            $this->session->set_flashdata('flash_message', 'Event is successfully added.');
=======
            $this->Event_manager_model->insert($data);            
             $this->flash_notification('Event is successfully added.');   
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        }

        redirect(base_url('event'));
    }
    
      function delete($id) {
        $this->Event_manager_model->delete($id);
<<<<<<< HEAD
        $this->session->set_flashdata('flash_message', 'Event is successfully deleted.');
=======
         $this->flash_notification('Event is successfully deleted.');   
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4

        redirect(base_url('event'));
    }
    
    function update($id='')
    {
        $data = array();
                  if ($_POST) {
                $data['event_name'] = $this->input->post('event_name');
                $data['event_location'] = $this->input->post('event_location');
                $data['event_desc'] = $this->input->post('event_desc');
                $event_date = nice_date($this->input->post('event_date'),'Y-m-d');                
                $data['event_date'] = date('Y-m-d H:i:s', strtotime($event_date.' '.$_POST['event_time']));                                
                $data['event_end_date'] = $this->input->post('event_end_date');
                $data['group_id'] = $this->input->post('group');
            $this->Event_manager_model->update($id,$data);
            $this->flash_notification('Event is successfully updated.');
        }

        redirect(base_url('event'));
    }


}

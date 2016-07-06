<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Degree_model extends MY_Model {

    protected $primary_key = 'd_id';
    public $before_create = array('timestamps');

    /**
     * Set timestamp field
     * @param array $degree
     * @return array
     */
    protected function timestamps($degree) {
        $degree['created_date'] = date('Y-m-d H:i:s');

        return $degree;
    }

}

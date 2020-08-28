<?php

class M_login extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function user_login($login_data) {
        $result = $this->db->select('*')->get_where('customer_master', $login_data);
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return '';
        }
    }

    public function register_login($cust_id) {
        $result = $this->db->select('*')->get_where('customer_master', array("cust_id" => $cust_id));
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return '';
        }
    }

}

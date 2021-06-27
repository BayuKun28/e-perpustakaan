<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getlistuser()
    {
        $query = "SELECT * FROM user where role_id = 2";
        return $this->db->query($query)->result_array();
    }
}

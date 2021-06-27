<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function info()
    {
        $query = " SELECT * FROM tb_dashboard ORDER BY id ASC limit 2 ";
        return $this->db->query($query)->result_array();
    }

    public function getdetail($id)
    {
        $detail = " SELECT * from tb_dashboard where id = $id ";
        return $this->db->query($detail)->row_array();
    }
    public function getJmlMember()
    {
        $jml = "SELECT COUNT(*) as jml FROM user where role_id = 2";
        return $this->db->query($jml)->result_array();
    }
}

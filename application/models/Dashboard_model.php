<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function info()
    {
        $query = " SELECT isi FROM tb_dashboard where keterangan = 'mading' limit 1";
        return $this->db->query($query)->result_array();
    }

    public function getdetail()
    {
        $detail = " SELECT * from tb_dashboard where id = 1 ";
        return $this->db->query($detail)->row_array();
    }
}

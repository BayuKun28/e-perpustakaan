<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    public function getdetail($id)
    {
        $detail = " SELECT *
        FROM supplier
        WHERE id = $id
        ORDER BY id ";
        return $this->db->query($detail)->row_array();
    }
}

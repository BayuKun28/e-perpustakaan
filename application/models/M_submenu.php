<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_submenu extends CI_Model
{
    public function delete($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->delete('user_sub_menu');
    }
}

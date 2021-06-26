<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = " SELECT a.id  as idm ,a.menu , b.* FROM user_menu a LEFT JOIN user_sub_menu b on (b.menu_id=a.id)
                    ";
        return $this->db->query($query)->result_array();
    }
    public function getSubMenuDet($id)
    {
        $query = " SELECT a.id  as idm ,a.menu , 
        b.* FROM user_menu a LEFT JOIN user_sub_menu b on (b.menu_id=a.id)
        where b.id = $id
        ";
        return $this->db->query($query)->row_array();
    }
    public function getmenu($id)
    {
        $query = " SELECT * FROM user_menu where id = $id
                ";
        return $this->db->query($query)->row_array();
    }
}

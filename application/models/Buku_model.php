<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{
    public function getBuku()
    {
        $query = " SELECT tb.id ,tb.nama_buku ,
        tb.pengarang ,tb.penerbit ,tb.tahun , 
        s.nama_supplier ,tb.ket ,tb.status,tb.stok  
        FROM tb_buku tb 
        LEFT JOIN supplier s on (s.id=tb.id_supplier)
        ORDER BY tb.id";
        return $this->db->query($query)->result_array();
    }
    public function getJmlBuku()
    {
        $jml = "SELECT COUNT(id) as jml FROM tb_buku";
        return $this->db->query($jml)->result_array();
    }
    public function getdetail($id)
    {
        $detail = " SELECT tb.id_supplier,tb.id ,tb.nama_buku ,
        tb.pengarang ,tb.penerbit ,tb.tahun , 
        s.nama_supplier ,tb.ket ,tb.status  
        FROM tb_buku tb 
        LEFT JOIN supplier s on (s.id=tb.id_supplier)
        WHERE tb.id = $id
        ORDER BY tb.id ";
        return $this->db->query($detail)->row_array();
    }
    public function getedit($id)
    {
        $up = [
            'nama_buku' =>  $this->input->post('nama'),
            'pengarang' =>  $this->input->post('pengarang'),
            'penerbit' =>  $this->input->post('penerbit'),
            'tahun' => $this->input->post('tahun'),
            'status' => $this->input->post('status'),
            'ket' => $this->input->post('ket')
        ];
        $this->db->where('id', $id);
        $this->db->update('tb_buku', $up);
    }
}

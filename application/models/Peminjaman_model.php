<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    public function getpeminjaman()
    {
        $query = "SELECT tp.id ,u.name as nama_peminjam ,
         tb.nama_buku,tp.tanggal_pinjam,tp.tanggal_harus_kembali,tp.catatan 
         FROM tb_peminjaman tp JOIN user u on (u.id=tp.id_peminjam) 
         JOIN tb_buku tb on (tb.id=tp.id_buku)
         ORDER BY tp.id ASC ";
        return $this->db->query($query)->result_array();
    }
    public function getpeminjam()
    {
        $query = "SELECT * FROM user WHERE role_id <> 1";
        return $this->db->query($query)->result_array();
    }
    public function getbuku()
    {
        $query = "SELECT * FROM tb_buku where status ilike '%ada%' ";
    }
    public function getbukuselect2($buk)
    {
        $this->db->select('*');
        $this->db->limit(10);
        $this->db->from('tb_buku');
        $this->db->like('nama_buku', $buk);
        $this->db->like('status', 'ada');
        return $this->db->get()->result_array();
    }
    public function getpeminjamselect2($peminjam)
    {
        $this->db->select('*');
        $this->db->limit(10);
        $this->db->from('user');
        $this->db->like('name', $peminjam);
        // $this->db->where('role_id', '2');
        return $this->db->get()->result_array();
    }
    public function getdetail($id)
    {
        $query = "SELECT tp.id , u.name as nama_peminjam, 
        tb.nama_buku , tp.tanggal_pinjam ,tp.tanggal_harus_kembali,
        tp.catatan FROM tb_peminjaman tp 
        JOIN user u on (u.id=tp.id_peminjam)
         JOIN tb_buku tb on (tb.id=tp.id_buku)
         WHERE tp.id = $id
         ";
        return $this->db->query($query)->row_array();
    }
    public function getkembali()
    {
        $query = "SELECT tpk.id, u.name as nama_peminjam,tb.nama_buku,
         tp.tanggal_pinjam ,tp.tanggal_harus_kembali,tp.catatan,
         tpk.tgl_kembali,tpk.denda FROM tb_pengembalian tpk JOIN 
         tb_peminjaman tp on (tp.id=tpk.id_pinjam) JOIN user u on 
         (u.id=tp.id_peminjam) JOIN tb_buku tb on (tb.id=tp.id_buku)
        WHERE tp.status = 'Pinjam'";
        return $this->db->query($query)->result_array();
    }
}

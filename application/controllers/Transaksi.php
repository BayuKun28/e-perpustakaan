<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function peminjaman()
    {
        $data['title'] = 'Peminjaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['pinjam'] = $this->pinjam->getpeminjaman();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/peminjaman', $data);
        $this->load->view('templates/footer', $data);
    }
    public function pinjamadd()
    {
        $data['title'] = 'Peminjaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['peminjam'] = $this->pinjam->getpeminjam();
        $data['buku'] = $this->db->get('tb_buku')->result_array();
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'trim|required');
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'trim|required');
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'trim|required');
        $this->form_validation->set_rules('tanggal_harus_kembali', 'Tanggal Harus Kembali', 'trim|required');
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/pinjamadd', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $ins = [
                'id_peminjam' => $this->input->post('nama_peminjam'),
                'id_buku' => $this->input->post('nama_buku'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_harus_kembali' => $this->input->post('tanggal_harus_kembali'),
                'catatan' => $this->input->post('catatan'),
                'status' => 'Pinjam'
            ];
            $this->db->insert('tb_peminjaman', $ins);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambah</div>');
            redirect('transaksi/peminjaman');
        }
    }
    public function getdatabuku()
    {
        $buk = $this->input->get('buk');
        $this->load->model('Peminjaman_model', 'pinjam');
        $query = $this->pinjam->getbukuselect2($buk, 'nama_buku');
        echo json_encode($query);
    }
    public function getdatapeminjam()
    {
        $peminjam = $this->input->get('peminjam');
        $this->load->model('Peminjaman_model', 'pinjam');
        $query = $this->pinjam->getpeminjamselect2($peminjam, 'name');
        echo json_encode($query);
    }
    public function detail()
    {
        $data['title'] = 'Peminjaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['detail'] = $this->pinjam->getdetail(
            $this->uri->segment(3)
        );
        $data['buku'] = $this->db->get('tb_buku')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/detail', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detailkembali()
    {
        $data['title'] = 'Pengembalian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Pengembalian_model', 'kembali');
        $data['detail'] = $this->kembali->getdetailkembali(
            $this->uri->segment(3)
        );
        $data['buku'] = $this->db->get('tb_buku')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/detailkembali', $data);
        $this->load->view('templates/footer', $data);
    }
    public function pengembalian()
    {
        $data['title'] = 'Pengembalian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['pinjam'] = $this->pinjam->getkembali();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/pengembalian', $data);
        $this->load->view('templates/footer', $data);
    }
    public function kembaliadd()
    {
        $data['title'] = 'Pengembalian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['pinjam'] = $this->pinjam->getpeminjaman();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/kembaliadd', $data);
        $this->load->view('templates/footer', $data);
    }
}

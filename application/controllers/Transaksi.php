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
        $userr = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['role'] = $this->db->get_where('user', ['role_id' => $this->session->userdata('role_id')])->row_array();
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['peminjam'] = $this->pinjam->getpeminjam();
        $data['buku'] = $this->db->get('tb_buku')->result_array();
        $role = $this->db->get_where('user', ['role_id' => $this->session->userdata('role_id')])->row_array();

        if ($role == 1){
            $namas = "<div class='form-row'>
                            <div class='col-md-6'>
                                <b><label for='nama_peminjam'>Nama Peminjam</label></b>
                                <br> <select class='form-control itemNamepeminjam form-control-user' id='nama_peminjam' name='nama_peminjam'>
                                </select>
                                <?= form_error('nama_peminjam', '<small class='text-danger pl-3'>', '</small>'); ?>
                            </div>
                        </div>";
        }else{
            $namas = "<input type='text' class='form-control' placeholder='Judul Buku' id='judul_buku' name='judul_buku' value='".$userr['name']."'>";
            
        }
        $data['namas'] = $namas;

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
            //die($ins);
            $this->db->insert('tb_peminjaman', $ins);
            $this->session->set_flashdata('message', 'Berhasil Pinjam');
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

    public function getdatabukuparam()
    {
        $buk = $this->input->get('kodee');
        $this->load->model('Peminjaman_model', 'pinjam');
        $data = $this->pinjam->getbukuauto($buk, 'stok');
        echo json_encode($data);
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
        // $this->load->model('Pengembalian_model', 'kembali');
        // $data['detail'] = $this->kembali->getdetailkembali(
        //     $this->uri->segment(3)
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['detail'] = $this->pinjam->getdetail(
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

    public function addkembali()
    {
        $data['title'] = 'Pengembalian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['peminjam'] = $this->pinjam->getpeminjam();
        $data['buku'] = $this->db->get('tb_buku')->result_array();
        // $this->load->model('Pengembalian_model', 'pengembalian');
        //  $data['detail'] = $this->pengembalian->getdetail(
        //     $this->uri->segment(3)
        // );
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'trim|required');
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'trim|required');
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'trim|required');
        $this->form_validation->set_rules('tanggal_harus_kembali', 'Tanggal Harus Kembali', 'trim|required');
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'trim|required');
        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $data);
        //     $this->load->view('templates/topbar', $data);
        //     $this->load->view('transaksi/detailkembali/',$id, $data);
        //     $this->load->view('templates/footer', $data);
        // } else {
            $ins = [
                'id_peminjam' => $this->input->post('nama_peminjam'),
                'id_buku' => $this->input->post('nama_buku'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_harus_kembali' => $this->input->post('tanggal_harus_kembali'),
                'catatan' => $this->input->post('catatan'),
                'status' => 'Kembali'
            ];
            //die($ins);
            $this->db->where('id', $id);
            $this->db->update('tb_peminjaman', $ins);
            // $this->db->query($query)->result();
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('transaksi/pengembalian');
        // }
    }
}

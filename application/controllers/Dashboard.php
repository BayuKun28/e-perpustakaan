<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Buku_model', 'buku');
        $data['buku'] = $this->buku->getJmlBuku();
        $this->load->model('Dashboard_model', 'das');
        $data['mading'] = $this->das->info();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function pengunjung()
    {
        $data['title'] = 'Dashboard Pengunjung';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Buku_model', 'buku');
        $data['buku'] = $this->buku->getJmlBuku();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/pengunjung', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editinfo()
    {
        $data['title'] = 'Edit Info';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Dashboard_model', 'das');
        $data['mading'] = $this->das->info();
        $data['detail'] = $this->das->getdetail(
            $this->uri->segment(3)
        );
        $this->form_validation->set_rules('isian', 'Isiann', 'trim|required');
        $id = $this->uri->segment(3);
         if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('dashboard/editinfo', $data);
         $this->load->view('templates/footer', $data);
         } else {
             $isi =[
              'isi' => $this->input->post('isian')
                 ];
            $this->db->where('id', $id);
            $this->db->update('tb_dashboard', $isi);
            // die($isi);
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('Dashboard');
         }
    }

    public function lakukanedit()
    {
        $data['title'] = 'Edit Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $this->load->model('Buku_model', 'buku');
        $data['detail'] = $this->buku->getdetail(
            $this->uri->segment(3)
        );
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'trim|required');
        $this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
        $this->form_validation->set_rules('supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $bk = [
                'nama_buku' => $this->input->post('judul_buku'),
                'id_supplier' => $this->input->post('supplier'),
                'pengarang' => $this->input->post('pengarang'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun' => $this->input->post('tahun'),
                'status' => $this->input->post('status'),
                'ket' => $this->input->post('ket')

            ];
            $this->db->where('id', $id);
            $this->db->update('tb_buku', $bk);
            // $this->db->query($query)->result();
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('buku');
        }
    }
}

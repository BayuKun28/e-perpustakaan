<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $data['title'] = ' Daftar Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function addsup()
    {
        $data['title'] = 'Tambah Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/add_sup', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $up = [
                'nama_supplier' => $this->input->post('nama_supplier', true),
                'alamat' => $this->input->post('alamat', true),
                'ket' => $this->input->post('ket', true)
            ];
            $this->db->insert('supplier', $up);
            $this->session->set_flashdata('message', 'Berhasil');
            redirect('supplier');
        }
    }
    public function detail()
    {
        $data['title'] = 'Detail Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['detail'] = $this->db->get_where('tb_buku', ['id' => $idbuku])->row_array();

        $this->load->model('Supplier_model', 'supplier');
        $data['detail'] = $this->supplier->getdetail(
            $this->uri->segment(3)
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supplier/detail', $data);
        $this->load->view('templates/footer', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('supplier');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('supplier');
    }
    public function edit()
    {
        $data['title'] = 'Edit Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $this->load->model('Supplier_model', 'supplier');
        $data['detail'] = $this->supplier->getdetail(
            $this->uri->segment(3)
        );
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $sup = [
                'nama_supplier' => $this->input->post('nama_supplier'),
                'alamat' => $this->input->post('alamat'),
                'ket' => $this->input->post('ket')

            ];
            $this->db->where('id', $id);
            $this->db->update('supplier', $sup);
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('supplier/index');
        }
    }
}

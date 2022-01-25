<?php
// defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use Spipu\html2pdf\Html2Pdf; 
use Spipu\Html2Pdf\Exception\Html2PdfException; 
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

use Dompdf\Dompdf as Dompdf;

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {

        $data['title'] = ' Daftar Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Buku_model', 'buku');
        $data['buku'] = $this->buku->getBuku();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function addbuku()
    {
        $data['title'] = 'Tambah Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('stok', 'stok', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/add_buku', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $bk = [
                'nama_buku' => $this->input->post('judul_buku', true),
                'id_supplier' => $this->input->post('supplier', true),
                'pengarang' => $this->input->post('pengarang', true),
                'penerbit' => $this->input->post('penerbit', true),
                'tahun' => $this->input->post('tahun', true),
                'status' => $this->input->post('status', true),
                'stok' => $this->input->post('stok', true),
                'ket' => $this->input->post('ket', true)
            ];
            $this->db->insert('tb_buku', $bk);
            $this->session->set_flashdata('message', 'Berhasil');
            redirect('buku');
        }
    }
    public function detail($idbuku)
    {
        $data['title'] = 'Detail Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['detail'] = $this->db->get_where('tb_buku', ['id' => $idbuku])->row_array();

        $this->load->model('Buku_model', 'buku');
        $data['detail'] = $this->buku->getdetail(
            $this->uri->segment(3)
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function autofillqr(){

    if (isset($_GET['term'])){
        $this->load->model('Buku_model', 'buku');
        $result = $this->buku->getdetail($_GET['term']);
        if (count($result) > 0 ){
            foreach ($result as $row) {
                $arr_result = [
                    'nama_buku' => $row->nama_buku,
                    'pengarang' =>$row->pengarang,
                    'penerbit' => $row->penerbit
                ];
            echo json_encode($arr_result);
            }
        }

    }    

    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_buku');
        //        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Buku Berhasil Di Hapus..!</div>');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('buku');
    }
    public function edit()
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


    public function scanqr()
    {
        $data['title'] = 'Scan QR';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/scanqr', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function export()
    {

        $this->load->model('Buku_model', 'buku');
        $data['title'] = 'Laporan Daftar Buku';
        $data['buku'] = $this->buku->getBuku();
        $dompdf = new Dompdf();
        $this->data['title'] = 'Laporan Data Buku';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4', 'Portrait');
        $html = $this->load->view('buku/report', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Penjualan Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
    

}

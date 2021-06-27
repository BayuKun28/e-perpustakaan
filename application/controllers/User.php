<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $id = $this->session->userdata('id');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('role', 'role', 'trim|required');
        $this->form_validation->set_rules('aktif', 'Aktif', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // $name = $this->input->post('nama');
            // $email = $this->input->post('email');
            // $role_id = $this->input->post('role');
            // $query = "update user set name= $name , 
            //             email = $email ,
            //             role_id = $role_id 
            //             where id = $id ";
            $up = [
                'name' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role')
            ];
            $this->db->where('id', $id);
            $this->db->update('user', $up);
            // $this->db->query($query)->result();
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('user/edit');
        }
    }

    public function add()
    {
        $data['title'] = 'Tambah Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $id = $this->session->userdata('id');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email has Already Registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Dont Match !',
            'min_length' => 'Password to Short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role', 'role', 'trim|required');
        $this->form_validation->set_rules('aktif', 'Aktif', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'is_active' => htmlspecialchars($this->input->post('aktif', true)),
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            // $this->db->query($query)->result();
            $this->session->set_flashdata('message', 'Berhasil');
            redirect('dashboard');
        }
    }

    public function list()
    {
        $data['title'] = 'Daftar Member';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->model('User_model', 'user');
        $data['daftarmember'] = $this->user->getlistuser();
        $id = $this->session->userdata('id');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/list', $data);
        $this->load->view('templates/footer');
    }
}

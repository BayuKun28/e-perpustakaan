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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Updated Success..!</div>');
            redirect('user/edit');
        }
    }
}

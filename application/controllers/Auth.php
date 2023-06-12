<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Auth_model');
    }


    public function index()
    {
        $this->load->view('login/login_form');
    }

    public function login_aksi()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $where = array(
                'email' => $email,
                'password' => $password
            );

            $cek_login = $this->Auth_model->cek_login($where)->num_rows();

            if ($cek_login > 0) {
                $sess_data = array(
                    'login' => 'OK',
                    'email' => $email
                );
                $this->session->set_userdata($sess_data);

                redirect(base_url('admin'));
            } else {
                redirect('auth');
            }
        } else {
            $this->load->view('login/login_form');
        }



        // $this->load->model('auth_model');
        // $this->load->library('form_validation');

        // $rules = $this->auth_model->rules();
        // $this->form_validation->set_rules($rules);

        // if ($this->form_validation->run() == FALSE) {
        //     return $this->load->view('login/login_form');
        // }

        // $email = $this->input->post('email', true);
        // $password = $this->input->post('password', true);

        // if ($this->auth_model->login($email, $password)) {
        //     redirect('admin');
        // } else {
        //     $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan email dan password benar!');
        // }

        // $this->load->view('login/login_form');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}

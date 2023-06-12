<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('login'))) {
            redirect('auth');
        }
    }
    public function index()
    {


        $this->load->view('templates/admin-header');
        $this->load->view('admin/index');
        $this->load->view('templates/admin-footer');
    }
}

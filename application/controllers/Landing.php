<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Musikku';

        $this->load->view('templates/view-header', $data);
        $this->load->view('landing/index');
        $this->load->view('templates/view-footer');
    }
}

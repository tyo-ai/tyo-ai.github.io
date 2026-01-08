<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Hotel_model'); // sudah ada
    $this->load->model('Admin_model');
    $this->_protect();
  }

  private function _protect()
  {
    if (!$this->session->userdata('admin')) {
      redirect('auth/login');
    }
  }

  public function index()
  {
    $data['title'] = 'Dashboard Admin';
    $data['total_kamar'] = $this->Admin_model->countKamar();
    $data['total_reservasi'] = $this->Admin_model->countReservasi();
    $data['reservasi'] = $this->Hotel_model->getAllReservasi(); // dari Hotel_model yang kamu sudah punya

    $this->load->view('templates/header', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('templates/footer');
  }
}

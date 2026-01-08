<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
    $this->load->library('session');
  }

  public function login()
  {
    // kalau sudah login, langsung ke dashboard
    if ($this->session->userdata('admin')) {
      redirect('admin');
    }

    $data['title'] = 'Login Admin';

    if ($this->input->post('submit')) {
      $username = trim($this->input->post('username'));
      $password = trim($this->input->post('password'));

      $admin = $this->Auth_model->getAdmin($username, $password);

      if ($admin) {
        $this->session->set_userdata('admin', [
          'id_admin' => $admin->id_admin,
          'username' => $admin->username,
          'nama'     => $admin->nama
        ]);
        redirect('admin');
      } else {
        $data['error'] = 'Username atau password salah!';
      }
    }

    $this->load->view('templates/header', $data);
    $this->load->view('auth/login', $data);
    $this->load->view('templates/footer');
  }

  public function logout()
  {
    $this->session->unset_userdata('admin');
    redirect('auth/login');
  }
}

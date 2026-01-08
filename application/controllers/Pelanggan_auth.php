<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pelanggan_model');
    $this->load->library('session');
  }

  public function register()
  {
    // jika sudah login, arahkan ke home
    if ($this->session->userdata('pelanggan')) {
      redirect('hotel');
    }

    $data['title'] = 'Daftar Pelanggan';

    if ($this->input->post('submit')) {
      $nama     = trim($this->input->post('nama'));
      $email    = trim($this->input->post('email'));
      $telepon  = trim($this->input->post('telepon'));
      $pass1    = $this->input->post('password');
      $pass2    = $this->input->post('password2');

      if (!$nama || !$email || !$telepon || !$pass1 || !$pass2) {
        $data['error'] = 'Semua field wajib diisi.';
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data['error'] = 'Format email tidak valid.';
      } elseif ($pass1 !== $pass2) {
        $data['error'] = 'Konfirmasi password tidak sama.';
      } elseif (strlen($pass1) < 6) {
        $data['error'] = 'Password minimal 6 karakter.';
      } elseif ($this->Pelanggan_model->emailExists($email)) {
        $data['error'] = 'Email sudah terdaftar. Silakan login.';
      } else {
        $this->Pelanggan_model->createPelanggan($nama, $email, $telepon, $pass1);
        $data['success'] = 'Registrasi berhasil. Silakan login.';
      }
    }

    $this->load->view('templates/header', $data);
    $this->load->view('pelanggan/register', $data);
    $this->load->view('templates/footer');
  }

  public function login()
  {
    if ($this->session->userdata('pelanggan')) {
      redirect('hotel');
    }

    $data['title'] = 'Login Pelanggan';

    if ($this->input->post('submit')) {
      $email = trim($this->input->post('email'));
      $pass  = $this->input->post('password');

      $pelanggan = $this->Pelanggan_model->getByEmail($email);

      if ($pelanggan && password_verify($pass, $pelanggan->password_hash)) {
        $this->session->set_userdata('pelanggan', [
          'id_pelanggan' => $pelanggan->id_pelanggan,
          'nama'         => $pelanggan->nama,
          'email'        => $pelanggan->email,
        ]);
        redirect('hotel');
      } else {
        $data['error'] = 'Email atau password salah.';
      }
    }

    $this->load->view('templates/header', $data);
    $this->load->view('pelanggan/login', $data);
    $this->load->view('templates/footer');
  }

  public function logout()
  {
    $this->session->unset_userdata('pelanggan');
    redirect('pelanggan_auth/login');
  }
}

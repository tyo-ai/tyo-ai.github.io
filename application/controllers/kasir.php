<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');

    // proteksi: wajib login admin
    if (!$this->session->userdata('admin')) {
      redirect('auth/login');
      return;
    }
  }

  public function index()
  {
    // ambil reservasi + nama kamar
    $this->db->select('r.*, k.nama_kamar');
    $this->db->from('reservasi r');
    $this->db->join('kamar k', 'k.id_kamar = r.id_kamar', 'left');
    $this->db->order_by('r.id_reservasi', 'DESC');
    $data['reservasi'] = $this->db->get()->result();

    $data['title'] = 'Kasir';

    $this->load->view('templates/header', $data);
    $this->load->view('admin/kasir', $data);

    // kalau kamu mau admin tanpa footer, jangan load footer
    // $this->load->view('templates/footer');
  }

  // tandai lunas
  public function lunas($id_reservasi)
  {
    $id_reservasi = (int)$id_reservasi;

    $this->db->where('id_reservasi', $id_reservasi);
    $this->db->update('reservasi', [
      'status_bayar' => 'Lunas',
      'paid_at'      => date('Y-m-d H:i:s')
    ]);

    redirect('kasir');
  }

  // batalkan lunas -> kembali belum bayar
  public function batal_lunas($id_reservasi)
  {
    $id_reservasi = (int)$id_reservasi;

    $this->db->where('id_reservasi', $id_reservasi);
    $this->db->update('reservasi', [
      'status_bayar' => 'Belum Bayar',
      'paid_at'      => NULL
    ]);

    redirect('kasir');
  }
}

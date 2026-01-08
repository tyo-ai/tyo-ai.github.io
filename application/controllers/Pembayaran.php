<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // halaman bayar (user)
  public function bayar($id_reservasi)
  {
    $id_reservasi = (int)$id_reservasi;

    $res = $this->db->get_where('reservasi', ['id_reservasi' => $id_reservasi])->row();
    if (!$res) show_404();

    // kalau sudah lunas, jangan bayar lagi
    if (!empty($res->status_bayar) && $res->status_bayar === 'Lunas') {
      redirect('hotel'); // sesuaikan kalau kamu punya halaman detail reservasi
      return;
    }

    $data['title'] = 'Pembayaran';
    $data['reservasi'] = $res;

    $this->load->view('templates/header', $data);
    $this->load->view('pembayaran/bayar', $data);
    $this->load->view('templates/footer');
  }

  // proses submit pembayaran (user)
  public function proses()
  {
    $id_reservasi = (int)$this->input->post('id_reservasi');
    $metode = $this->input->post('metode_bayar', TRUE);

    $res = $this->db->get_where('reservasi', ['id_reservasi' => $id_reservasi])->row();
    if (!$res) show_404();

    // update jadi menunggu konfirmasi
    $this->db->where('id_reservasi', $id_reservasi)->update('reservasi', [
      'status_bayar' => 'Menunggu Konfirmasi',
      'metode_bayar' => $metode
    ]);

    redirect('pembayaran/sukses/'.$id_reservasi);
  }

  public function sukses($id_reservasi)
  {
    $id_reservasi = (int)$id_reservasi;

    $data['title'] = 'Pembayaran Dikirim';
    $data['reservasi'] = $this->db->get_where('reservasi', ['id_reservasi' => $id_reservasi])->row();

    $this->load->view('templates/header', $data);
    $this->load->view('pembayaran/sukses', $data);
    $this->load->view('templates/footer');
  }
}

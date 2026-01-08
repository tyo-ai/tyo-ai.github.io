<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_model extends CI_Model {

  // ✅ Ambil semua kamar + SEARCH (nama/tipe/deskripsi)
  public function getAllKamar($q = '') {
    $this->db->from('kamar');

    if (!empty($q)) {
      $this->db->group_start();
      $this->db->like('nama_kamar', $q);
      $this->db->or_like('tipe_kamar', $q);
      $this->db->or_like('deskripsi', $q);
      $this->db->group_end();
    }

    $this->db->order_by('id_kamar', 'DESC');
    return $this->db->get()->result();
  }

  // Ambil 1 kamar berdasarkan id
  public function getKamarById($id_kamar) {
    return $this->db
      ->get_where('kamar', ['id_kamar' => (int)$id_kamar])
      ->row();
  }

  // Simpan data reservasi (status default: Pending)
  public function insertBooking() {
    $data = [
      'nama_tamu'    => $this->input->post('nama_tamu', TRUE),
      'email'        => $this->input->post('email', TRUE),
      'telepon'      => $this->input->post('telepon', TRUE),
      'tgl_checkin'  => $this->input->post('tgl_checkin', TRUE),
      'tgl_checkout' => $this->input->post('tgl_checkout', TRUE),
      'id_kamar'     => (int)$this->input->post('id_kamar', TRUE),
      // status tidak perlu diisi karena di DB default 'Pending'
    ];

    return $this->db->insert('reservasi', $data);
  }

  // (Opsional) Ambil semua reservasi untuk admin
  public function getAllReservasi() {
    return $this->db
      ->select('reservasi.*, kamar.nama_kamar, kamar.tipe_kamar, kamar.harga')
      ->from('reservasi')
      ->join('kamar', 'kamar.id_kamar = reservasi.id_kamar', 'left')
      ->order_by('reservasi.id_reservasi', 'DESC')
      ->get()
      ->result();
  }

  // (Opsional) Ambil detail reservasi
  public function getReservasiById($id_reservasi) {
    return $this->db
      ->select('reservasi.*, kamar.nama_kamar, kamar.tipe_kamar, kamar.harga')
      ->from('reservasi')
      ->join('kamar', 'kamar.id_kamar = reservasi.id_kamar', 'left')
      ->where('reservasi.id_reservasi', (int)$id_reservasi)
      ->get()
      ->row();
  }

  // (Opsional) Update status reservasi (Pending/Diterima/Ditolak)
  public function updateStatusReservasi($id_reservasi, $status) {
    $allowed = ['Pending','Diterima','Ditolak'];
    if (!in_array($status, $allowed)) return false;

    return $this->db
      ->where('id_reservasi', (int)$id_reservasi)
      ->update('reservasi', ['status' => $status]);
  }
}

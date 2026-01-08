<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Hotel_model');
    $this->load->helper(['url']);
    $this->load->library(['session']);
    $this->load->database();

    // ====== LANGUAGE SWITCH (id/en) ======
    $lang = $this->input->get('lang', TRUE);
    $lang = is_string($lang) ? strtolower(trim($lang)) : 'id';
    if (!in_array($lang, ['id','en'], true)) $lang = 'id';

    $ci_lang = ($lang === 'en') ? 'english' : 'indonesian';
    $this->lang->load('hotel', $ci_lang);

    // biar $lang bisa dipakai di semua view (header)
    $this->load->vars(['lang' => $lang]);
  }

  // ✅ LIST KAMAR + SEARCH (?q=...)
  public function index()
  {
    $q = $this->input->get('q', true);
    $q = is_string($q) ? trim($q) : '';

    $data = [
      'title' => 'Luxury Hotel - Daftar Kamar',
      'q'     => $q,
      'kamar' => $this->Hotel_model->getAllKamar($q)
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('hotel/index', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id_kamar = null)
  {
    if (empty($id_kamar) || !is_numeric($id_kamar)) {
      redirect('hotel');
      return;
    }

    $kamar = $this->Hotel_model->getKamarById((int)$id_kamar);
    if (!$kamar) {
      show_404();
      return;
    }

    $data = [
      'title' => 'Detail Kamar - ' . $kamar->nama_kamar,
      'kamar' => $kamar
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('hotel/detail', $data);
    $this->load->view('templates/footer');
  }

  // Booking + upload bukti transfer
  public function booking($id_kamar = null)
  {
    if (empty($id_kamar) || !is_numeric($id_kamar)) {
      redirect('hotel');
      return;
    }

    $kamar = $this->Hotel_model->getKamarById((int)$id_kamar);
    if (!$kamar) {
      show_404();
      return;
    }

    $data = [
      'title' => 'Booking - ' . $kamar->nama_kamar,
      'kamar' => $kamar,
      'error' => null
    ];

    if ($this->input->post('submit')) {

      $nama_tamu    = trim($this->input->post('nama_tamu', true));
      $email        = trim($this->input->post('email', true));
      $telepon      = trim($this->input->post('telepon', true));
      $tgl_checkin  = $this->input->post('tgl_checkin', true);
      $tgl_checkout = $this->input->post('tgl_checkout', true);
      $metode_bayar = trim($this->input->post('metode_bayar', true));

      if ($nama_tamu === '' || $email === '' || $telepon === '' || $tgl_checkin === '' || $tgl_checkout === '' || $metode_bayar === '') {
        $data['error'] = 'Semua field wajib diisi (termasuk metode pembayaran).';
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data['error'] = 'Format email tidak valid.';
      } elseif (strtotime($tgl_checkout) <= strtotime($tgl_checkin)) {
        $data['error'] = 'Tanggal check-out harus lebih besar dari check-in.';
      } else {

        $upload_dir = FCPATH . 'uploads/bukti/';
        if (!is_dir($upload_dir)) {
          @mkdir($upload_dir, 0777, true);
        }

        if (!is_dir($upload_dir)) {
          $data['error'] = 'Folder upload tidak ditemukan. Pastikan ada folder: /uploads/bukti di root project.';
          $this->load->view('templates/header', $data);
          $this->load->view('hotel/booking', $data);
          $this->load->view('templates/footer');
          return;
        }

        $bukti_file = null;
        $status_bayar = 'Belum Bayar';

        $wajib_upload = in_array($metode_bayar, ['Transfer Bank', 'QRIS']);

        if ($wajib_upload && empty($_FILES['bukti_transfer']['name'])) {
          $data['error'] = 'Untuk metode ' . $metode_bayar . ', bukti transfer wajib diupload.';
          $this->load->view('templates/header', $data);
          $this->load->view('hotel/booking', $data);
          $this->load->view('templates/footer');
          return;
        }

        if (!empty($_FILES['bukti_transfer']['name'])) {

          $this->load->library('upload');

          $config['upload_path']   = $upload_dir;
          $config['allowed_types'] = 'jpg|jpeg|png|pdf';
          $config['max_size']      = 10240; // 10MB
          $config['encrypt_name']  = true;

          $this->upload->initialize($config);

          if ($this->upload->do_upload('bukti_transfer')) {
            $up = $this->upload->data();
            $bukti_file = $up['file_name'];
            $status_bayar = 'Menunggu Konfirmasi';
          } else {
            $data['error'] = $this->upload->display_errors('', '');
            $this->load->view('templates/header', $data);
            $this->load->view('hotel/booking', $data);
            $this->load->view('templates/footer');
            return;
          }
        }

        $insert = [
          'id_kamar'       => (int)$id_kamar,
          'nama_tamu'      => $nama_tamu,
          'email'          => $email,
          'telepon'        => $telepon,
          'tgl_checkin'    => $tgl_checkin,
          'tgl_checkout'   => $tgl_checkout,
          'status'         => 'Pending',
          'metode_bayar'   => $metode_bayar,
          'status_bayar'   => $status_bayar,
          'bukti_transfer' => $bukti_file
        ];

        $this->db->insert('reservasi', $insert);
        $id_reservasi = $this->db->insert_id();

        redirect('hotel/sukses/'.$id_reservasi);
        return;
      }
    }

    $this->load->view('templates/header', $data);
    $this->load->view('hotel/booking', $data);
    $this->load->view('templates/footer');
  }

  public function sukses($id_reservasi = null)
  {
    $data = [
      'title' => 'Reservasi Berhasil',
      'reservasi' => null
    ];

    if (!empty($id_reservasi) && is_numeric($id_reservasi)) {
      $data['reservasi'] = $this->db->get_where('reservasi', ['id_reservasi' => (int)$id_reservasi])->row();
    }

    $this->load->view('templates/header', $data);
    $this->load->view('hotel/sukses', $data);
    $this->load->view('templates/footer');
  }
}

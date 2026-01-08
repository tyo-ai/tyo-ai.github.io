<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ====== GLOBAL / NAV ====== */
$lang['brand_name'] = 'Luxury Hotel';
$lang['nav_search_placeholder'] = 'Cari kamar...';
$lang['nav_search'] = 'Cari';
$lang['nav_reset'] = 'Reset';
$lang['nav_login'] = 'Login';
$lang['nav_lang_id'] = 'Bahasa Indonesia';
$lang['nav_lang_en'] = 'Bahasa Inggris';

/* ====== HOTEL LIST ====== */
$lang['hotel_list_title'] = 'Daftar Kamar';
$lang['hotel_list_sub']   = 'Pilih kamar terbaik untuk liburanmu.';
$lang['hotel_empty']      = 'Kamar tidak ditemukan.';
$lang['price_from']       = 'Mulai dari';
$lang['per_night']        = '/ malam';
$lang['btn_detail']       = 'Detail';
$lang['btn_book']         = 'Booking';

/* ====== DETAIL ====== */
$lang['detail_title']     = 'Detail Kamar';
$lang['detail_facility']  = 'Fasilitas';
$lang['detail_price']     = 'Harga';
$lang['btn_back']         = 'Kembali';

/* ====== BOOKING FORM ====== */
$lang['booking_title']       = 'Booking';
$lang['booking_subtitle']    = 'Lengkapi data untuk reservasi.';
$lang['label_name']          = 'Nama Tamu';
$lang['label_email']         = 'Email';
$lang['label_phone']         = 'Telepon';
$lang['label_checkin']       = 'Tanggal Check-in';
$lang['label_checkout']      = 'Tanggal Check-out';
$lang['label_pay_method']    = 'Metode Pembayaran';
$lang['label_upload_proof']  = 'Upload Bukti Transfer';
$lang['hint_upload']         = 'Format: JPG/PNG/PDF (maks 10MB)';
$lang['btn_submit_booking']  = 'Kirim Booking';

$lang['pay_transfer'] = 'Transfer Bank';
$lang['pay_qris']     = 'QRIS';
$lang['pay_cash']     = 'Bayar di Tempat';

/* ====== STATUS ====== */
$lang['status_pending']      = 'Pending';
$lang['status_paid_waiting'] = 'Menunggu Konfirmasi';
$lang['status_unpaid']       = 'Belum Bayar';
$lang['status_paid']         = 'Sudah Bayar';

/* ====== SUCCESS PAGE ====== */
$lang['success_title']   = 'Reservasi Berhasil';
$lang['success_sub']     = 'Terima kasih! Reservasi kamu sudah tercatat.';
$lang['success_id']      = 'ID Reservasi';
$lang['success_status']  = 'Status';
$lang['success_pay']     = 'Status Bayar';
$lang['btn_back_list']   = 'Kembali ke daftar kamar';

/* ====== ERROR MESSAGES (BOOKING) ====== */
$lang['err_required_all']   = 'Semua field wajib diisi (termasuk metode pembayaran).';
$lang['err_email_invalid']  = 'Format email tidak valid.';
$lang['err_date_invalid']   = 'Tanggal check-out harus lebih besar dari check-in.';
$lang['err_folder_missing'] = 'Folder upload tidak ditemukan. Pastikan ada folder: /uploads/bukti di root project.';
$lang['err_proof_required'] = 'Untuk metode %s, bukti transfer wajib diupload.';

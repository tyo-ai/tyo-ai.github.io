<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ====== GLOBAL / NAV ====== */
$lang['brand_name'] = 'Luxury Hotel';
$lang['nav_search_placeholder'] = 'Search rooms...';
$lang['nav_search'] = 'Search';
$lang['nav_reset'] = 'Reset';
$lang['nav_login'] = 'Login';
$lang['nav_lang_id'] = 'Indonesian';
$lang['nav_lang_en'] = 'English';

/* ====== HOTEL LIST ====== */
$lang['hotel_list_title'] = 'Room List';
$lang['hotel_list_sub']   = 'Pick the best room for your stay.';
$lang['hotel_empty']      = 'No rooms found.';
$lang['price_from']       = 'From';
$lang['per_night']        = '/ night';
$lang['btn_detail']       = 'Details';
$lang['btn_book']         = 'Book';

/* ====== DETAIL ====== */
$lang['detail_title']     = 'Room Details';
$lang['detail_facility']  = 'Facilities';
$lang['detail_price']     = 'Price';
$lang['btn_back']         = 'Back';

/* ====== BOOKING FORM ====== */
$lang['booking_title']       = 'Booking';
$lang['booking_subtitle']    = 'Fill in your details to reserve.';
$lang['label_name']          = 'Guest Name';
$lang['label_email']         = 'Email';
$lang['label_phone']         = 'Phone';
$lang['label_checkin']       = 'Check-in Date';
$lang['label_checkout']      = 'Check-out Date';
$lang['label_pay_method']    = 'Payment Method';
$lang['label_upload_proof']  = 'Upload Payment Proof';
$lang['hint_upload']         = 'Formats: JPG/PNG/PDF (max 10MB)';
$lang['btn_submit_booking']  = 'Submit Booking';

$lang['pay_transfer'] = 'Bank Transfer';
$lang['pay_qris']     = 'QRIS';
$lang['pay_cash']     = 'Pay on Arrival';

/* ====== STATUS ====== */
$lang['status_pending']      = 'Pending';
$lang['status_paid_waiting'] = 'Waiting for Confirmation';
$lang['status_unpaid']       = 'Unpaid';
$lang['status_paid']         = 'Paid';

/* ====== SUCCESS PAGE ====== */
$lang['success_title']   = 'Booking Successful';
$lang['success_sub']     = 'Thank you! Your booking has been recorded.';
$lang['success_id']      = 'Reservation ID';
$lang['success_status']  = 'Status';
$lang['success_pay']     = 'Payment Status';
$lang['btn_back_list']   = 'Back to room list';

/* ====== ERROR MESSAGES (BOOKING) ====== */
$lang['err_required_all']   = 'All fields are required (including payment method).';
$lang['err_email_invalid']  = 'Invalid email format.';
$lang['err_date_invalid']   = 'Check-out date must be after check-in date.';
$lang['err_folder_missing'] = 'Upload folder not found. Please create: /uploads/bukti in the project root.';
$lang['err_proof_required'] = 'For %s method, payment proof is required.';

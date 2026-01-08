<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
  public function countKamar()
  {
    return $this->db->count_all('kamar');
  }

  public function countReservasi()
  {
    return $this->db->count_all('reservasi');
  }
}

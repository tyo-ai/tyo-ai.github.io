<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
  public function getAdmin($username, $password)
  {
    return $this->db
      ->where('username', $username)
      ->where('password', md5($password))
      ->get('admin')
      ->row();
  }
}

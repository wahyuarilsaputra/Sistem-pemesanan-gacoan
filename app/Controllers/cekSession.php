<?php namespace App\Controllers;

class cekSession extends BaseController {

  public function index() {
    // Ambil session
    $session = session();

    // Cek apakah session sudah berjalan atau belum
    if ($session->has('idUser')) {
      echo 'Session sudah berjalan';
    } else {
      echo 'Session belum berjalan';
    }
  }

}

<?php

namespace App\Controllers;

use App\Models\KonsumenModel;
use App\Models\PemesananModel;

class Dashboard extends BaseController
{
  public function __construct()
  {
    $this->konsumen = new KonsumenModel();
    $this->pemesanan = new PemesananModel();
  }

  public function index()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $data = array("pageTitle" => "Dashboard");
    $data["username"] = $session->username;

    // Query total of customer and pemesanan
    $data["total_konsumen"] = $this->konsumen->getTotalKonsumen();
    $data["total_pemesanan"] = $this->pemesanan->getTotalPemesanan();

    // Query 10 data of customer and pemesanan
    $data["konsumen"] = $this->konsumen->getKonsumenLimit5();
    $data["pemesanan"] = $this->pemesanan->getPemesananLimit5();

    // Query total of kredit, kredit_terbayar, and kredit_aktif
    $data["total_kredit"] = $this->pemesanan->getTotalKreditPemesanan()[0]["total_kredit"];
    $data["total_terbayar"] = $this->pemesanan->getTotalKreditTerbayar()[0]["total_terbayar"];
    $data["kredit_aktif"] = $this->pemesanan->getActiveCredit()[0]["kredit_aktif"];

    return view("v_dashboard", $data);
  }
}

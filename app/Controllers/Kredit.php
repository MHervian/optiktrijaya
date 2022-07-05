<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\TransaksiModel;

class Kredit extends BaseController
{
  public function __construct()
  {
    $this->transaksi = new TransaksiModel();
    $this->pemesanan = new PemesananModel();
  }

  public function onProgress()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }
    $data = array("pageTitle" => "Data Kredit On Progress Bulan Ini");
    $data["username"] = $session->username;

    // Query of pemesanan data
    $pemesanan = $this->pemesanan->getAllPemesanan();

    // Query of log credit transaction history based on this month-year
    $date_now = date("Y-m");
    $log = $this->transaksi->getAllLogsPembayaranByMonthNow($date_now);

    // Filter the credit which wasn't paid this month
    $filtered = null;
    $idx = 0;
    foreach ($pemesanan as $p) {
      $tmp = array_filter($log, function ($val) use ($p) {
        return $val["id_pemesanan"] === $p["id_pemesanan"];
      });

      if (!empty($tmp)) continue;
      $tmp = array_values($tmp);

      $filtered[$idx] = $p;
      $idx++;
    }

    $data["cicilan"] = $filtered;

    return view("v_kredit_on_progress", $data);
  }

  public function kreditTerbayar()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }
    $data = array("pageTitle" => "Data Kredit Terbayar Bulan Ini");
    $data["username"] = $session->username;

    // Query of pemesanan data
    $pemesanan = $this->pemesanan->getAllPemesanan();

    // Query of log credit transaction history based on this month-year
    $date_now = date("Y-m");
    $log = $this->transaksi->getAllLogsPembayaranByMonthNow($date_now);

    // Filter the credit which was paid this month
    $filtered = null;
    $idx = 0;
    foreach ($log as $l) {
      $tmp = array_filter($pemesanan, function ($val) use ($l) {
        return $val["id_pemesanan"] === $l["id_pemesanan"];
      });

      if (empty($tmp)) continue;
      $tmp = array_values($tmp);

      $filtered[$idx] = $tmp[0];
      $filtered[$idx]["tgl_bayar"] = $l["tgl_bayar"];
      $filtered[$idx]["jmlh_bayar"] = $l["jmlh_bayar"];
      $filtered[$idx]["tenor_ke"] = $l["tenor_ke"];
      $filtered[$idx]["collector"] = $l["collector"];
      $idx++;
    }

    $data["terbayar"] = $filtered;

    return view("v_kredit_terbayar", $data);
  }
}

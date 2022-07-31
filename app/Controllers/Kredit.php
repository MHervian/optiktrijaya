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
    $data = array("pageTitle" => "Data Kredit Berjalan");
    $data["username"] = $session->username;

    // Query of all pemesanan data
    $pemesanan = $this->pemesanan->getAllPemesanan();

    // Query of log credit transaction history based on this month-year
    $tanggal_bulan = date("Y-m");

    $request = service("request");
    if ($request->getMethod() === "post") {
      $tahun = $request->getPost("tahun");
      $bulan = $request->getPost("bulan");
      $tanggal_bulan = "$tahun-$bulan";
    }
    $log = $this->transaksi->getAllLogsPembayaranByDate($tanggal_bulan);

    $data["tgl"] = date("F Y", strtotime($tanggal_bulan));

    // Filter the credit which wasn't paid this month
    $filtered = null;
    $idx = 0;
    $tmp_tgl1 = intval(strtotime($tanggal_bulan));
    foreach ($pemesanan as $p) {
      $tmp_tgl2 = intval(strtotime(substr($p["tgl_pemesanan"], 0, 7)));
      $tmp = array_filter($log, function ($val) use ($p) {
        return $val["id_pemesanan"] === $p["id_pemesanan"];
      });

      if (!empty($tmp)) continue;

      if ($tmp_tgl1 < $tmp_tgl2 || $p["status_jalan"] === "cancel") continue;

      $filtered[$idx] = $p;
      $idx++;
    }

    // Query on log bayar date
    $dates = $this->transaksi->getAllDateLog();

    $data["cicilan"] = $filtered;
    $data["tanggal"] = $dates;

    return view("v_kredit_on_progress", $data);
  }

  public function kreditTerbayar()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }
    $data = array("pageTitle" => "Data Kredit Terbayar");
    $data["username"] = $session->username;

    // Query of pemesanan data
    $pemesanan = $this->pemesanan->getAllPemesanan();

    // Query of log credit transaction history based on this month-year
    $tanggal_bulan = date("Y-m");

    $request = service("request");

    if ($request->getMethod() === "post") {
      $tahun = $request->getPost("tahun");
      $bulan = $request->getPost("bulan");
      $tanggal_bulan = "$tahun-$bulan";
    }
    $log = $this->transaksi->getAllLogsPembayaranByDate($tanggal_bulan);

    $data["tgl"] = date("F Y", strtotime($tanggal_bulan));

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

    // Query on log bayar date
    $dates = $this->transaksi->getAllLogBayarDate();

    $data["terbayar"] = $filtered;
    $data["tanggal"] = $dates;

    return view("v_kredit_terbayar", $data);
  }
}

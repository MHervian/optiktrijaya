<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\TransaksiModel;
use App\Models\LensaKacamataModel;
use Ramsey\Uuid\Uuid;

class Pemesanan extends BaseController
{
  public function __construct()
  {
    $this->pemesanan = new PemesananModel();
    $this->transaksi = new TransaksiModel();
    $this->lensa = new LensaKacamataModel();
  }

  public function index()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }
    $data = array("pageTitle" => "Data Pemesanan");
    $data["username"] = $session->username;

    // Query all pemesanan data
    $data["pemesanan"] = $this->pemesanan->getAllPemesanan();

    $pageStatus = ($session->getFlashdata("pageStatus")) ? $session->getFlashdata("pageStatus") : null;
    $data["pageStatus"] = $pageStatus;
    return view("v_pemesanan", $data);
  }

  public function displayDetailPemesanan($id_pemesanan = "")
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }
    $data = array("pageTitle" => "Detail Pemesanan");
    $data["username"] = $session->username;

    // Get detail pemesanan by ID
    $detail = $this->pemesanan->getPemesananByID($id_pemesanan);
    $data["detail"] = $detail[0];

    // Get all log pembayaran of this detail
    $logs = $this->transaksi->getAllLogsPembayaranByID($id_pemesanan);
    $data["logs"] = $logs;

    $pageStatus = ($session->getFlashdata("pageStatus")) ? $session->getFlashdata("pageStatus") : null;
    $data["pageStatus"] = $pageStatus;
    return view("v_detail_pemesanan", $data);
  }

  public function pemesananForm()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }
    $data = array("pageTitle" => "Buat Pemesanan Baru");
    $data["username"] = $session->username;

    // Query all lens data master
    $data["lensa"] = $this->lensa->getAllLens();
    $data["coating"] = $this->lensa->getAllCoating();
    $data["flattop"] = $this->lensa->getAllFlattop();

    return view("v_form_pemesanan", $data);
  }

  public function createNewPemesanan()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $request = service("request");
    $id_konsumen = $request->getPost("id_konsumen");
    $no_sp = $request->getPost("sp");
    $frame = $request->getPost("frame");
    $jenis_lensa = $request->getPost("jenis_lensa");
    $varian_lensa = $request->getPost("varian_lensa");
    $flattop = $request->getPost("flattop");
    $coating = $request->getPost("coating");
    $harga = $request->getPost("harga");
    $dp = $request->getPost("dp");
    $tgl_pengiriman = $request->getPost("tgl_pengiriman");
    $tgl_jatuh_tempo = $request->getPost("tgl_jatuh_tempo");
    $sales = $request->getPost("sales");
    $l_sph = $request->getPost("l_sph");
    $r_sph = $request->getPost("r_sph");
    $l_cyl = $request->getPost("l_cyl");
    $r_cyl = $request->getPost("r_cyl");
    $l_axis = $request->getPost("l_axis");
    $r_axis = $request->getPost("r_axis");
    $l_add = $request->getPost("l_add");
    $r_add = $request->getPost("r_add");
    $l_mpd = $request->getPost("l_mpd");
    $r_mpd = $request->getPost("r_mpd");
    $l_prism = $request->getPost("l_prism");
    $r_prism = $request->getPost("r_prism");
    $uuid = Uuid::uuid4();

    // Menghitung sisa kredit
    $kredit = floatval($harga) - floatval($dp);

    $data = array(
      "id_pemesanan" => $uuid->toString(),
      "no_sp" => $no_sp,
      "id_konsumen" => $id_konsumen,
      "frame" => $frame,
      "harga" => $harga,
      "sisa_kredit" => $kredit,
      "tgl_pengiriman" => $tgl_pengiriman,
      "tgl_jatuh_tempo" => $tgl_jatuh_tempo,
      "tenor" => 1,
      "sales" => $sales,
      "lensa" => $jenis_lensa . " - " . $varian_lensa,
      "flattop" => $flattop,
      "coating" => $coating,
      "L_sph" => $l_sph,
      "L_cyt" => $l_cyl,
      "L_axis" => $l_axis,
      "L_add" => $l_add,
      "L_mpd" => $l_mpd,
      "L_prism" => $l_prism,
      "R_sph" => $r_sph,
      "R_cyt" => $r_cyl,
      "R_axis" => $r_axis,
      "R_add" => $r_add,
      "R_mpd" => $r_mpd,
      "R_prism" => $r_prism,
      "status_kredit" => "ya",
    );

    // Insert new pemesanan
    $this->pemesanan->insertPemesanan($data);

    // Insert first credit transaction
    $data = array(
      "id_pemesanan" => $uuid->toString(),
      "jmlh_bayar" => $dp,
      "sisa_kredit" => $kredit,
      "tenor_ke" => 1,
      "collector" => $sales
    );
    $this->transaksi->insertPembayaran($data);

    $session->setFlashdata("pageStatus", "insert success");
    return redirect()->to(base_url("pemesanan"));
  }

  public function deletePemesanan($id_pemesanan)
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    // Delete all logs in this pemesanan
    $this->transaksi->deletePembayaran($id_pemesanan);

    // Delete pemesanan
    $this->pemesanan->deletePemesanan($id_pemesanan);

    $session->setFlashdata("pageStatus", "delete success");
    return redirect()->to(base_url("pemesanan"));
  }

  // Credit transaction methods
  public function beginPembayaranKredit()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $request = service("request");
    $id_pemesanan = $request->getPost("id_pemesanan");
    $nominal = $request->getPost("nominal");
    $collector = $request->getPost("collector");
    $tenor = $request->getPost("tenor");
    $kredit = $request->getPost("kredit");

    $kredit = floatval($kredit) - floatval($nominal);


    $data = array(
      "id_pemesanan" => $id_pemesanan,
      "jmlh_bayar" => $nominal,
      "sisa_kredit" => $kredit,
      "tenor_ke" => $tenor,
      "collector" => $collector
    );
    $this->transaksi->insertPembayaran($data);

    // Update tenor and the remaining of kredit into pemesanan
    $data = array(
      "tenor" => $tenor,
      "sisa_kredit" => $kredit
    );
    $this->pemesanan->updateKredit($id_pemesanan, $data);

    $session->setFlashdata("pageStatus", "update success");
    return redirect()->to(base_url("pemesanan/detail/" . $id_pemesanan));
  }
}
<?php

namespace App\Controllers;

use App\Models\KonsumenModel;
use App\Models\PemesananModel;
use Ramsey\Uuid\Uuid;

class Konsumen extends BaseController
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
    $data = array("pageTitle" => "Data Konsumen");
    $data["username"] = $session->username;

    // Query all konsumen data
    $data["konsumen"] = $this->konsumen->getAllKonsumen();

    return view("v_konsumen", $data);
  }

  public function displayDetailKonsumen($id_konsumen)
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $data = array("pageTitle" => "Detail Data Konsumen");
    $data["username"] = $session->username;

    $data["konsumen"] = $this->konsumen->getKonsumenByID($id_konsumen);
    // Kueri apa saja yang dipesan oleh konsumen ini
    $data["kredit"] = $this->pemesanan->getAllActiveCredit($id_konsumen);
    $data["lunas"] = $this->pemesanan->getAllPaidOffCredit($id_konsumen);

    return view("v_detail_konsumen", $data);
  }

  public function createNewKonsumen()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $request = service("request");
    $nama = $request->getPost("nama");
    $tgl_lahir = $request->getPost("tgl_lahir");
    $no_telepon = $request->getPost("no_telepon");
    $alamat = $request->getPost("alamat");
    $uuid = Uuid::uuid4();

    $data = array(
      "id_konsumen" => $uuid->toString(),
      "nama" => $nama,
      "no_telepon" => $no_telepon,
      "tgl_lahir" => $tgl_lahir,
      "alamat" => $alamat
    );

    $this->konsumen->insertKonsumen($data);

    $session->setFlashdata("pageStatus", "insert success");
    return redirect()->to(base_url("konsumen"));
  }

  public function updateKonsumen()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $request = service("request");
    $id_konsumen = $request->getPost("id_konsumen");
    $nama = $request->getPost("nama");
    $tgl_lahir = $request->getPost("tgl_lahir");
    $no_telepon = $request->getPost("no_telepon");
    $alamat = $request->getPost("alamat");

    $data = array(
      "nama" => $nama,
      "tgl_lahir" => $tgl_lahir,
      "no_telepon" => $no_telepon,
      "alamat" => $alamat
    );

    $this->konsumen->updateKonsumen($id_konsumen, $data);

    $session->setFlashdata("pageStatus", "update success");

    if (empty($request->getPost("from"))) {
      return redirect()->to(base_url("konsumen"));
    } else {
      return redirect()->to(base_url("konsumen/detail/" . $id_konsumen));
    }
  }

  public function deleteKonsumen($id_konsumen)
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    // Delete all credits

    // Delete konsumen
    $this->konsumen->deleteKonsumen($id_konsumen);

    $session->setFlashdata("pageStatus", "delete success");
    return redirect()->to(base_url("konsumen"));
  }

  public function getDataKonsumen($id_konsumen)
  {
    $result = $this->konsumen->getKonsumenByID($id_konsumen);
    return json_encode($result);
  }

  public function getDataKonsumenByKeyword($keyword = "")
  {
    $result = $this->konsumen->getAllKonsumenByKeyword($keyword);
    return json_encode($result);
  }
}

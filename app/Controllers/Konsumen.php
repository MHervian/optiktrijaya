<?php

namespace App\Controllers;

use App\Models\KonsumenModel;
use Ramsey\Uuid\Uuid;

class Konsumen extends BaseController
{
  public function __construct()
  {
    $this->konsumen = new KonsumenModel();
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
    $data["kredit"] = array();
    $data["lunas"] = array();

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
  }

  public function deleteKonsumen()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }
  }

  public function getDataKonsumen($id_konsumen)
  {
    $result = $this->konsumen->getKonsumenByID($id_konsumen);
    return json_encode($result);
  }
}

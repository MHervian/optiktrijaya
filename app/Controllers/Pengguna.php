<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use Ramsey\Uuid\Uuid;

class Pengguna extends BaseController
{
  public function __construct()
  {
    $this->pengguna = new PenggunaModel();
  }

  public function index()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $data = array("pageTitle" => "Data Admin");
    $data["username"] = $session->username;

    // Get current profile
    $data["profile"] = $this->pengguna->getAdminByUsername($session->username);

    // Get all data admin
    $data["admin"] = $this->pengguna->getAllAdmin();

    return view("v_admin", $data);
  }

  public function deleteAdmin($id_pengguna = "")
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }
  }
}

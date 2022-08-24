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
    $data["level_profile"] = $session->level;

    // Get current profile
    $data["profile"] = $this->pengguna->getAdminByUsername($session->username);

    // Get all data admin
    $data["admin"] = $this->pengguna->getAllAdmin();

    $pageStatus = ($session->getFlashdata("pageStatus")) ? $session->getFlashdata("pageStatus") : null;
    $data["pageStatus"] = $pageStatus;

    return view("v_admin", $data);
  }

  public function getDataAdmin($id_pengguna)
  {
    $result = $this->pengguna->getAdmin($id_pengguna);
    return json_encode($result);
  }

  public function createAdmin()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $request = service("request");
    $username = $request->getPost("username");
    $email = $request->getPost("email");
    $password = $request->getPost("password");
    $id_pengguna = Uuid::uuid4();

    $data = array(
      "id_pengguna" => $id_pengguna->toString(),
      "username" => $username,
      "email" => $email,
      "pass" => password_hash($password, PASSWORD_DEFAULT),
      "lvl_akses" => "admin"
    );

    $this->pengguna->insertAdmin($data);

    $session->setFlashdata("pageStatus", "insert success");
    return redirect()->to(base_url("admin"));
  }

  public function updateAdmin()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $request = service("request");
    $id_pengguna = $request->getPost("id_pengguna");
    $username = $request->getPost("username");
    $email = $request->getPost("email");
    $password_lama = $request->getPost("password_lama");
    $password_baru = $request->getPost("password_baru");
    $password_ulangi = $request->getPost("password_ulangi");

    if (!empty($password_lama) && !empty($password_baru)) {
      // Check whether this request from form current profile or other profile
      // $profile = $this->pengguna->getAdminByUsername($session->username);
      $profile = $this->pengguna->getAdmin($id_pengguna);

      // Validation of old and new password
      if (!password_verify($password_lama, $profile["pass"])) {
        $session->setFlashdata("pageStatus", "wrong old password");
        return redirect()->to(base_url("admin"));
      }

      if ($password_lama === $password_baru) {
        $session->setFlashdata("pageStatus", "password still same");
        return redirect()->to(base_url("admin"));
      }

      if ($password_baru !== $password_ulangi) {
        $session->setFlashdata("pageStatus", "new password is not matched");
        return redirect()->to(base_url("admin"));
      }

      $data = array(
        "username" => $username,
        "email" => $email,
        "pass" => password_hash($password_baru, PASSWORD_DEFAULT)
      );
    } else {
      $data = array(
        "username" => $username,
        "email" => $email
      );
    }

    $this->pengguna->updateAdmin($id_pengguna, $data);

    if (!empty($request->getPost("current_profile"))) {
      $session->set("username", $username);
    }

    $session->setFlashdata("pageStatus", "update success");
    if (!empty($password_baru)) {
      $session->setFlashdata("pageStatus", "update password success");
    }
    return redirect()->to(base_url("admin"));
  }

  public function deleteAdmin($id_pengguna = "")
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }
    $request = service("request");

    // Delete of data
    $this->pengguna->deleteAdmin($id_pengguna);

    if (!empty($request->getPost("btn_delete"))) {
      // Pass to logout page
      $session->setFlashdata("pageStatus", "delete and log out");
      return redirect()->to(base_url("logout"));
    } else {
      $session->setFlashdata("pageStatus", "delete success");
      return redirect()->to(base_url("admin"));
    }
  }
}

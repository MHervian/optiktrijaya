<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
  public function __construct()
  {
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

    return view("v_dashboard", $data);
  }
}

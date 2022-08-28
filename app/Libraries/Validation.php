<?php

namespace App\Libraries;

use App\Models\PenggunaModel;
use App\Models\SalesModel;
use App\Models\CollectorModel;

class Validation
{
  public function __construct()
  {
    $this->pengguna = new PenggunaModel();
    $this->sales = new SalesModel();
    $this->collector = new CollectorModel();
  }

  public function validateNewUser($email = "", $role = "")
  {
    $found = false;
    $result = null;
    switch ($role) {
      case "admin":
        $result = count($this->pengguna->getAdminByEmail($email));
        break;
      case "sales":
        $result = count($this->sales->getSalesByEmail($email));
        break;
      case "collector":
        $result = count($this->collector->getCollectorByEmail($email));
        break;
    }

    if ($result) {
      $found = true;
    }

    return $found;
  }
}

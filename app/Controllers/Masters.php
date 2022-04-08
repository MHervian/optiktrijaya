<?php

namespace App\Controllers;

use App\Models\SalesModel;
use App\Models\CollectorModel;
use App\Models\LensaKacamataModel;
use Ramsey\Uuid\Uuid;

class Masters extends BaseController
{
  public function __construct()
  {
    $this->sales = new SalesModel();
    $this->collector = new CollectorModel();
    $this->lensaKacamata = new LensaKacamataModel();
  }

  public function index($route = "")
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $data = array("username" => $session->username);

    // switching route
    switch ($route) {
      case "sales": {
          $data["pageTitle"] = "Data Master : Sales";
          $data["sales"] = $this->sales->getAllSales();
          $view_file = "v_sales";
          break;
        }
      case "collector": {
          $data["pageTitle"] = "Data Master : Collector";
          $data["collector"] = $this->collector->getAllCollector();
          $view_file = "v_collector";
          break;
        }
      case "lensa": {
          $data["pageTitle"] = "Data Master : Lensa dan Kacamata";
          $view_file = "v_lensa";

          // Get all lens, lens variant, coating, and flattop
          $data["lens"] = $this->lensaKacamata->getAllLens();
          $data["coating"] = $this->lensaKacamata->getAllCoating();
          $data["bahan"] = $this->lensaKacamata->getAllFlattop();
          $data["warna"] = $this->lensaKacamata->getAllWarna();
          break;
        }
      default: {
          $view_file = "v_dashboard";
          $data = null;
          break;
        }
    }

    $pageStatus = ($session->getFlashdata("pageStatus")) ? $session->getFlashdata("pageStatus") : null;
    $data["pageStatus"] = $pageStatus;
    return view($view_file, $data);
  }

  /** For Master Data Sales Method */
  public function createMasterSales()
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
      "lvl_akses" => "sales"
    );

    $this->sales->insertSales($data);

    $session->setFlashdata("pageStatus", "insert success");
    return redirect()->to(base_url("masters/sales"));
  }

  public function updateMasterSales()
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
      // Validation of old and new password
      $profile = $this->sales->getSalesByID($id_pengguna);
      if (!password_verify($password_lama, $profile["pass"])) {
        $session->setFlashdata("pageStatus", "wrong old password");
        return redirect()->to(base_url("masters/sales"));
      }

      if ($password_lama === $password_baru) {
        $session->setFlashdata("pageStatus", "password still same");
        return redirect()->to(base_url("masters/sales"));
      }

      if ($password_baru !== $password_ulangi) {
        $session->setFlashdata("pageStatus", "new password is not matched");
        return redirect()->to(base_url("masters/sales"));
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

    $this->sales->updateSales($id_pengguna, $data);

    $session->setFlashdata("pageStatus", "update success");
    return redirect()->to(base_url("masters/sales"));
  }

  public function deleteMasterSales($id_pengguna = "")
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    // Delete sales
    $this->sales->deleteSales($id_pengguna);

    $session->setFlashdata("pageStatus", "delete success");
    return redirect()->to(base_url("masters/sales"));
  }

  public function getMasterDataSales($id_pengguna = "")
  {
    $result = $this->sales->getSalesByID($id_pengguna);
    return json_encode($result);
  }

  /** For Collector Master Data Methods */
  public function createMasterCollector()
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
      "lvl_akses" => "collector"
    );

    $this->collector->insertCollector($data);

    $session->setFlashdata("pageStatus", "insert success");
    return redirect()->to(base_url("masters/collector"));
  }

  public function updateMastercollector()
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
      // Validation of old and new password
      $profile = $this->collector->getCollectorByID($id_pengguna);
      if (!password_verify($password_lama, $profile["pass"])) {
        $session->setFlashdata("pageStatus", "wrong old password");
        return redirect()->to(base_url("masters/collector"));
      }

      if ($password_lama === $password_baru) {
        $session->setFlashdata("pageStatus", "password still same");
        return redirect()->to(base_url("masters/collector"));
      }

      if ($password_baru !== $password_ulangi) {
        $session->setFlashdata("pageStatus", "new password is not matched");
        return redirect()->to(base_url("masters/collector"));
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

    $this->collector->updateCollector($id_pengguna, $data);

    $session->setFlashdata("pageStatus", "update success");
    return redirect()->to(base_url("masters/collector"));
  }

  public function deleteMastercollector($id_pengguna = "")
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    // Delete collector
    $this->collector->deleteCollector($id_pengguna);

    $session->setFlashdata("pageStatus", "delete success");
    return redirect()->to(base_url("masters/collector"));
  }

  public function getMasterDatacollector($id_pengguna = "")
  {
    $result = $this->collector->getCollectorByID($id_pengguna);
    return json_encode($result);
  }

  /** All Lens Master Data Methods */
  public function createMasterDataLensa()
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $request = service("request");
    $jenis_data = $request->getPost("jenis_data");
    $nama = $request->getPost("nama");

    switch ($jenis_data) {
      case "createJenis": {
          $data = array("jenis_lensa" => $nama);
          $this->lensaKacamata->insertLensa($data);
          break;
        }
      case "createWarna": {
          $data = array("nama" => $nama);
          $this->lensaKacamata->insertWarna($data);
          break;
        }
      case "createBahan": {
          $data = array("bahan_lensa" => $nama);
          $this->lensaKacamata->insertBahan($data);
          break;
        }
      case "createCoating": {
          $data = array("nama_coating" => $nama);
          $this->lensaKacamata->insertCoating($data);
          break;
        }
      default: {
          return redirect()->to(base_url("masters/lensa"));
        }
    }

    $session->setFlashdata("pageStatus", "insert success");
    return redirect()->to(base_url("masters/lensa"));
  }

  public function updateMasterDataLensa()
  {
  }

  public function deleteMasterDataLensa($jenis_data = "", $id_data = "")
  {
  }

  public function getLensVariantByCategoryName($nama = "")
  {
    $nama = rawurldecode($nama);
    $result = $this->lensaKacamata->getAllLensVariantByCategoryName($nama);
    return json_encode($result);
  }
}

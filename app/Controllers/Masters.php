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
    $this->lensa_kacamata = new LensaKacamataModel();
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
          $data["lens"] = $this->lensa_kacamata->getAllLens();
          $data["coating"] = $this->lensa_kacamata->getAllCoating();
          $data["bahan"] = $this->lensa_kacamata->getAllFlattop();
          $data["warna"] = $this->lensa_kacamata->getAllWarna();
          $data["jenisUpdate"] = ($session->getFlashdata("jenisData")) ? $session->getFlashdata("jenisData") : null;;
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
  public function getMasterDataLensa($jenis_data = "", $id_data = "")
  {
    switch ($jenis_data) {
      case "jenis": {
          $jenis_data = "lensa";
          $column_name = "id_lensa";
          break;
        }
      case "warna": {
          $jenis_data = "warna";
          $column_name = "id_warna";
          break;
        }
      case "bahan": {
          $jenis_data = "flattop_bahan";
          $column_name = "id_flattop";
          break;
        }
      case "coating": {
          $jenis_data = "coating";
          $column_name = "id_coating";
          break;
        }
    }
    $result = $this->lensa_kacamata->getDataLensa($jenis_data, $column_name, $id_data);
    return json_encode($result);
  }

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
      case "createJenisLensa": {
          $data = array("jenis_lensa" => $nama);
          $this->lensa_kacamata->insertLensa($data);
          break;
        }
      case "createWarna": {
          $data = array("nama" => $nama);
          $this->lensa_kacamata->insertWarna($data);
          break;
        }
      case "createBahan": {
          $data = array("bahan_lensa" => $nama);
          $this->lensa_kacamata->insertBahan($data);
          break;
        }
      case "createCoating": {
          $data = array("nama_coating" => $nama);
          $this->lensa_kacamata->insertCoating($data);
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
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    $request = service("request");
    $jenis_data = $request->getPost("jenis_data");
    $id_data = $request->getPost("id_data");
    $nama = $request->getPost("nama");

    switch ($jenis_data) {
      case "updateJenis": {
          $jenis_data = "lensa";
          $column_name = "jenis_lensa";
          $id_column = "id_lensa";
          break;
        }
      case "updateWarna": {
          $jenis_data = "warna";
          $column_name = "nama";
          $id_column = "id_warna";
          break;
        }
      case "updateBahan": {
          $jenis_data = "flattop_bahan";
          $column_name = "bahan_lensa";
          $id_column = "id_flattop";
          break;
        }
      case "updateCoating": {
          $jenis_data = "coating";
          $column_name = "nama_coating";
          $id_column = "id_coating";
          break;
        }
    }

    $data = array($column_name => $nama);
    $this->lensa_kacamata->updateDataMasterLensa($jenis_data, $id_column, $id_data, $data);

    $session->setFlashdata("pageStatus", "update success $jenis_data");
    $session->setFlashdata("jenisData", $jenis_data);
    return redirect()->to(base_url("masters/lensa"));
  }

  public function deleteMasterDataLensa($jenis_data = "", $id_data = "")
  {
    $session = session();
    if (!isset($session->username)) {
      $session->setFlashdata("loginStatus", "user not login");
      return redirect()->to(base_url());
    }

    switch ($jenis_data) {
      case "jenis": {
          $jenis_data = "lensa";
          $id_column = "id_lensa";
          break;
        }
      case "warna": {
          $jenis_data = "warna";
          $id_column = "id_warna";
          break;
        }
      case "bahan": {
          $jenis_data = "flattop_bahan";
          $id_column = "id_flattop";
          break;
        }
      case "coating": {
          $jenis_data = "coating";
          $id_column = "id_coating";
          break;
        }
    }

    $this->lensa_kacamata->deleteDataMasterLensa($jenis_data, $id_column, $id_data);

    $session->setFlashdata("pageStatus", "delete success");
    return redirect()->to(base_url("masters/lensa"));
  }

  public function getMasterDataLensByCategory($kategori = "", $id = "")
  {
    // $nama = rawurldecode($nama);
    switch ($kategori) {
      case "lensa": {
          $kategori = "lensa";
          $data_id = $id;
          $id = "id_lensa";
          break;
        }
      case "warna": {
          $kategori = "warna";
          $data_id = $id;
          $id = "id_warna";
          break;
        }
      case "bahan": {
          $kategori = "flattop_bahan";
          $data_id = $id;
          $id = "id_flattop";
          break;
        }
      case "coating": {
          $kategori = "coating";
          $data_id = $id;
          $id = "id_coating";
          break;
        }
    }
    $result = $this->lensa_kacamata->getMasterDataLensByCategory($kategori, $id, $data_id);
    return json_encode($result);
  }
}

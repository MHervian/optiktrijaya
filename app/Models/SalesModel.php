<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesModel extends Model
{
  protected $table = "pengguna";
  protected $primaryKey = "id_pengguna";
  // protected $allowedFields = ["id_pengguna", "username", "email", "pass", "lvl_akses"];
  protected $allowedFields = ["id_pengguna", "username", "email", "lvl_akses"];

  public function getAllSales()
  {
    return $this
      ->asArray()
      ->where("lvl_akses", "sales")
      ->findAll();
  }

  public function getSalesByID($id_pengguna)
  {
    return $this->find($id_pengguna);
  }

  public function insertSales($data)
  {
    return $this->insert($data);
  }

  public function updateSales($id_pengguna, $data)
  {
    return $this->update($id_pengguna, $data);
  }

  public function deleteSales($id_pengguna)
  {
    return $this->delete($id_pengguna);
  }
}

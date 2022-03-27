<?php

namespace App\Models;

use CodeIgniter\Model;

class CollectorModel extends Model
{
  protected $table = "pengguna";
  protected $primaryKey = "id_pengguna";
  protected $allowedFields = ["id_pengguna", "username", "email", "pass", "lvl_akses"];

  public function getAllCollector()
  {
    return $this
      ->asArray()
      ->where("lvl_akses", "collector")
      ->findAll();
  }

  public function getCollectorByID($id_pengguna)
  {
    return $this->find($id_pengguna);
  }

  public function insertCollector($data)
  {
    return $this->insert($data);
  }

  public function updateCollector($id_pengguna, $data)
  {
    return $this->update($id_pengguna, $data);
  }

  public function deleteCollector($id_pengguna)
  {
    return $this->delete($id_pengguna);
  }
}

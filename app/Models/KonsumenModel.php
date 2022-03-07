<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsumenModel extends Model
{
  protected $table = "konsumen";
  protected $primaryKey = "id_konsumen";
  protected $allowedFields = ["id_konsumen", "nama", "no_telepon", "tgl_lahir", "alamat"];

  public function getAllKonsumen()
  {
    $builder = $this->db->table($this->table);
    // return $this->asArray()->findAll();
    return $builder->select("
      konsumen.id_konsumen AS id_konsumen,
      konsumen.nama AS nama,
      konsumen.no_telepon AS no_telepon,
      konsumen.tgl_lahir AS tgl_lahir,
      konsumen.alamat AS alamat,
      COUNT(pemesanan.id_konsumen) AS jumlah
    ")
      ->join("pemesanan", "pemesanan.id_konsumen = konsumen.id_konsumen", "LEFT")
      ->groupBy("konsumen.id_konsumen")->get()->getResultArray();
  }

  public function getKonsumenByID($id_konsumen)
  {
    return $this->find($id_konsumen);
  }

  public function insertKonsumen($data)
  {
    $this->insert($data);
  }

  public function updateKonsumen($id_konsumen, $data)
  {
    $this->update($id_konsumen, $data);
  }

  public function deleteKonsumen($id_konsumen)
  {
    $this->delete($id_konsumen);
  }
}

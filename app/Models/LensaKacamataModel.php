<?php

namespace App\Models;

use CodeIgniter\Model;

class LensaKacamataModel extends Model
{
  public function getAllLens()
  {
    $builder = $this->db->table("lensa");
    return $builder->select("*")
      ->get()->getResultArray();
  }

  public function getAllLensVariant()
  {
    $builder = $this->db->table("lensa");
    return $builder->select("
      lensa.id_lensa AS id_lensa,
      lensa.jenis_lensa AS jenis_lensa,
      lensa_varian.id_varian AS id_varian,
      lensa_varian.nama_varian AS nama_varian
    ")
      ->join("lensa_varian", "lensa_varian.id_lensa = lensa.id_lensa", "INNER")
      ->get()->getResultArray();
  }

  public function getAllCoating()
  {
    $builder = $this->db->table("coating");
    return $builder->select("*")
      ->get()->getResultArray();
  }

  public function getAllFlattop()
  {
    $builder = $this->db->table("flattop_bahan");
    return $builder->select("*")
      ->get()->getResultArray();
  }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class LensaKacamataModel extends Model
{
  public function getMasterDataLensByCategory($kategori, $id, $data_id)
  {
    $builder = $this->db->table($kategori);
    return $builder->select("*")->where($id, $data_id)->get()->getResultArray();
  }

  public function getAllLens()
  {
    $builder = $this->db->table("lensa");
    return $builder->select("*")
      ->get()->getResultArray();
  }

  public function insertLensa($data)
  {
    $builder = $this->db->table("lensa");
    return $builder->insert($data);
  }

  public function getAllCoating()
  {
    $builder = $this->db->table("coating");
    return $builder->select("*")
      ->get()->getResultArray();
  }

  public function insertCoating($data)
  {
    $builder = $this->db->table("coating");
    return $builder->insert($data);
  }

  public function getAllFlattop()
  {
    $builder = $this->db->table("flattop_bahan");
    return $builder->select("*")
      ->get()->getResultArray();
  }

  public function insertBahan($data)
  {
    $builder = $this->db->table("flattop_bahan");
    return $builder->insert($data);
  }

  public function getAllWarna()
  {
    $builder = $this->db->table("warna");
    return $builder->select("*")
      ->get()->getResultArray();
  }

  public function insertWarna($data)
  {
    $builder = $this->db->table("warna");
    return $builder->insert($data);
  }

  public function updateDataMasterLensa($jenis_data, $id_column, $id_data, $data)
  {
    $builder = $this->db->table($jenis_data);
    return $builder->where(array($id_column => $id_data))
      ->update($data);
  }

  public function deleteDataMasterLensa($jenis_data, $id_column, $id_data)
  {
    $builder = $this->db->table($jenis_data);
    return $builder->where(array($id_column => $id_data))->delete();
  }
}

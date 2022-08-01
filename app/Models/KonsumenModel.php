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
    return $builder->select("
        konsumen.id_konsumen AS id_konsumen,
        konsumen.nama AS nama,
        konsumen.no_telepon AS no_telepon,
        konsumen.tgl_lahir AS tgl_lahir,
        konsumen.alamat AS alamat,
        IF(pemesanan.status_kredit = 'ya' && pemesanan.status_jalan = 'aktif', COUNT(pemesanan.id_konsumen), 0) AS jumlah
    ")
      ->join("pemesanan", "pemesanan.id_konsumen = konsumen.id_konsumen", "LEFT")
      ->groupBy("konsumen.id_konsumen")->get()->getResultArray();
  }

  public function getTotalKonsumen()
  {
    return $this->countAllResults(false);
  }

  public function getKonsumenLimit5()
  {
    $builder = $this->db->table($this->table);
    return $builder->select("
      konsumen.id_konsumen AS id_konsumen,
      konsumen.nama AS nama,
      konsumen.no_telepon AS no_telepon,
      konsumen.tgl_lahir AS tgl_lahir,
      konsumen.alamat AS alamat
    ")
      ->limit(5)
      ->get()->getResultArray();
  }

  public function getAllKonsumenByKeyword($keyword)
  {
    $builder = $this->db->table($this->table);
    return $builder->select("*")
      ->where("nama LIKE '%" . $keyword . "%'")
      ->get()->getResultArray();
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

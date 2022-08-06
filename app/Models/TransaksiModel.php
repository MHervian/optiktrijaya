<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
  protected $table = "log_bayar";
  protected $allowedFields = [
    "id_pemesanan", "tgl_bayar", "jmlh_bayar",
    "sisa_kredit", "tenor_ke", "collector", "id_log"
  ];

  public function getAllLogsPembayaranByID($id_pemesanan)
  {
    return $this->where("id_pemesanan", $id_pemesanan)
      ->orderBy("tgl_bayar", "DESC")->findAll();
  }

  public function getAllLogsPembayaranByDate($date_now)
  {
    return $this->like("tgl_bayar", $date_now, "after")
      ->findAll();
  }

  public function getAllDateLog()
  {
    $builder = $this->db->table("pemesanan");
    return $builder->select("DISTINCT(YEAR(tgl_pemesanan)) AS log_year")
      ->orderBy("YEAR(tgl_pemesanan)", "DESC")
      ->get()->getResultArray();
  }

  public function getAllLogBayarDate()
  {
    $builder = $this->db->table($this->table);
    return $builder->select("DISTINCT(YEAR(tgl_bayar)) AS log_year")
      ->orderBy("YEAR(tgl_bayar)", "DESC")
      ->get()->getResultArray();
  }


  public function insertPembayaran($data)
  {
    $this->insert($data);
  }

  public function updatePembayaran($id_pemesanan, $data)
  {
    $this->update($id_pemesanan, $data);
  }

  public function updateSalesNameInLog($sales, $id_pemesanan, $tenor)
  {
    $this->set(["collector" => $sales])
      ->where("id_pemesanan", $id_pemesanan)
      ->where("tenor_ke", $tenor)
      ->update();
  }

  public function deletePembayaran($id_pemesanan)
  {
    $this->where("id_pemesanan", $id_pemesanan)->delete();
  }
}

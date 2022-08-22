<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
  protected $table = "log_bayar";
  protected $primaryKey = "id_log";
  protected $allowedFields = [
    "id_pemesanan", "tgl_bayar", "jmlh_bayar",
    "tenor_ke", "collector", "id_log"
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

  public function getLogPembayaranFirst($id_pemesanan)
  {
    return $this->where("id_pemesanan", $id_pemesanan)
      ->orderBy("tenor_ke", "ASC")->first();
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

  public function getLogByIDLog($id_log)
  {
    return $this->find($id_log);
  }

  public function insertPembayaran($data)
  {
    $this->insert($data);
  }

  public function updatePembayaran($id_pemesanan, $data)
  {
    $this->update($id_pemesanan, $data);
  }

  public function updateFirstDPInLog($data, $id_history_log)
  {
    $this->set($data)
      ->where("id_log", $id_history_log)
      // ->where("tenor_ke", $tenor)
      ->update();
  }

  public function updateLogKredit($id_log, $data)
  {
    $this->update($id_log, $data);
  }

  public function deletePembayaran($id_pemesanan)
  {
    $this->where("id_pemesanan", $id_pemesanan)->delete();
  }

  public function deleteKreditLog($id_log)
  {
    $this->delete($id_log);
  }
}

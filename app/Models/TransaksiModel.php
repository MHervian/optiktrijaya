<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
  protected $table = "log_bayar";
  protected $allowedFields = [
    "id_pemesanan", "tgl_bayar", "jmlh_bayar",
    "sisa_kredit", "tenor_ke", "collector"
  ];

  public function getAllLogsPembayaranByID($id_pemesanan)
  {
    return $this->where("id_pemesanan", $id_pemesanan)
      ->orderBy("tgl_bayar", "DESC")->findAll();
  }

  public function insertPembayaran($data)
  {
    $this->insert($data);
  }

  public function updatePembayaran($id_pemesanan, $data)
  {
    $this->update($id_pemesanan, $data);
  }

  public function deletePembayaran($id_pemesanan)
  {
    $this->where("id_pemesanan", $id_pemesanan)->delete();
  }
}

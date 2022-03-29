<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
  protected $table = "pemesanan";
  protected $primaryKey = "id_pemesanan";
  protected $allowedFields = [
    "id_pemesanan", "no_sp", "id_konsumen", "frame", "harga", "dp", "sisa_kredit", "tgl_pengiriman",
    "tgl_jatuh_tempo", "tenor", "sales", "lensa", "flattop", "coating", "L_sph", "L_cyt", "L_axis",
    "L_add", "L_mpd", "L_prism", "R_sph", "R_cyt", "R_axis", "R_add", "R_mpd", "R_prism", "status_kredit"
  ];

  public function getAllPemesanan()
  {
    $builder = $this->db->table($this->table);
    return $builder->select("
      konsumen.id_konsumen AS id_konsumen,
      konsumen.nama AS nama,
      konsumen.no_telepon AS no_telepon,
      pemesanan.id_pemesanan AS id_pemesanan,
      pemesanan.no_sp AS no_sp,
      pemesanan.sisa_kredit AS sisa_kredit,
      pemesanan.tgl_pengiriman AS tgl_pengiriman,
      pemesanan.tgl_jatuh_tempo AS tgl_jatuh_tempo,
      pemesanan.sales AS sales
    ")
      ->join("konsumen", "konsumen.id_konsumen = pemesanan.id_konsumen", "INNER")
      ->get()->getResultArray();
  }

  public function getPemesananByID()
  {
    $builder = $this->db->table($this->table);
    return $builder->select("
      konsumen.id_konsumen AS id_konsumen,
      konsumen.nama AS nama,
      konsumen.no_telepon AS no_telepon,
      konsumen.tgl_lahir AS tgl_lahir,
      konsumen.alamat AS alamat,
      pemesanan.id_pemesanan AS id_pemesanan,
      pemesanan.no_sp AS no_sp,
      pemesanan.frame AS frame,
      pemesanan.harga AS harga,
      pemesanan.sisa_kredit AS sisa_kredit,
      pemesanan.tgl_pengiriman AS tgl_pengiriman,
      pemesanan.tgl_jatuh_tempo AS tgl_jatuh_tempo,
      pemesanan.tenor AS tenor,
      pemesanan.sales AS sales,
      pemesanan.lensa AS lensa,
      pemesanan.flattop AS flattop,
      pemesanan.coating AS coating,
      pemesanan.L_sph AS L_sph,
      pemesanan.L_cyt AS L_cyt,
      pemesanan.L_axis AS L_axis,
      pemesanan.L_add AS L_add,
      pemesanan.L_mpd AS L_mpd,
      pemesanan.L_prism AS L_prism,
      pemesanan.R_sph AS R_sph,
      pemesanan.R_cyt AS R_cyt,
      pemesanan.R_axis AS R_axis,
      pemesanan.R_add AS R_add,
      pemesanan.R_mpd AS R_mpd,
      pemesanan.R_prism AS R_prism,
      pemesanan.status_kredit AS status_kredit
    ")
      ->join("konsumen", "konsumen.id_konsumen = pemesanan.id_konsumen", "INNER")
      ->get()
      ->getResultArray();
  }

  public function insertPemesanan($data)
  {
    $this->insert($data);
  }

  public function updatePemesanan($id_pemesanan, $data)
  {
    $this->update($id_pemesanan, $data);
  }

  public function updateKredit($id_pemesanan, $data)
  {
    $this->update($id_pemesanan, $data);
  }

  public function deletePemesanan($id_pemesanan)
  {
    $this->delete($id_pemesanan);
  }
}

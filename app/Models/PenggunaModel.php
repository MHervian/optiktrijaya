<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
  protected $table = "pengguna";
  protected $primaryKey = "id_pengguna";
  protected $allowedFields = ["id_pengguna", "username", "email", "pass", "lvl_akses"];

  public function getUser($email)
  {
    return
      $this->asArray()
      ->where(array("email" => $email))
      ->first();
  }

  public function getAllAdmin()
  {
    return $this
      ->asArray()
      ->where("lvl_akses", "admin")->findAll();
  }

  public function getAdmin($id_pengguna)
  {
    return $this->find($id_pengguna);
  }

  public function getAdminByUsername($username)
  {
    return
      $this->asArray()
      ->where(array("username" => $username))
      ->first();
  }

  public function insertAdmin($data)
  {
    $this->insert($data);
  }

  public function updateAdmin($id_pengguna, $data)
  {
    $this->update($id_pengguna, $data);
  }

  public function deleteAdmin($id_pengguna)
  {
    $this->delete($id_pengguna);
  }
}

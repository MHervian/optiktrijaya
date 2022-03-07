<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
  protected $table = "pengguna";
  protected $primaryKey = "id_pengguna";
  protected $allowedFields = ["username", "email", "pass", "lvl_akses"];

  public function getUser($email = "")
  {
    return
      $this->asArray()
      ->where(array("email" => $email))
      ->first();
  }
}
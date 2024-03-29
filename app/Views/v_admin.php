<?= $this->include("layout/v_header") ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->include("layout/v_sidebar") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <?php
            $jdl_halaman = "Data Akun Saya";
            if ($level_profile === "admin" || $level_profile === "supadmin") $jdl_halaman = "Data Admin";
            ?>
            <div class="col-lg-6">
              <h1 class="m-0"><?= $jdl_halaman ?></h1>
            </div>
            <!-- /.col -->
            <div class="col-lg-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?= base_url("dashboard") ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Admin</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <?php
      if (isset($pageStatus) && $pageStatus === "insert success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Data Admin Baru Berhasil Dibuat</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "update success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Update Profil Admin Berhasil.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "update password success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Password Baru Berhasil Diset Ulang oleh Sistem.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "delete success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Data Admin Berhasil Dihapus</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "wrong old password") {
      ?>
        <div class="my-3 alert alert-danger text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Password Lama Pengguna Salah. Ulangi Lagi.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "new password is not matched") {
      ?>
        <div class="my-3 alert alert-danger text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Gagal Update Password Baru. Pastikan Password Baru Sama yang Diulangi</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "password still same") {
      ?>
        <div class="my-3 alert alert-danger text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Password Baru Masih Sama dengan Password Lama.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "insert failed") {
      ?>
        <div class="my-3 alert alert-danger text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Akun yang Dibuat dengan Email: <span class="font-weight-bold"><?= $newEmail ?></span> Sudah Ada. Pakai Email Baru.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "update failed") {
      ?>
        <div class="my-3 alert alert-danger text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Pengubahan Akun Gagal dengan Email: <span class="font-weight-bold"><?= $newEmail ?></span>. Ganti Nama Email dengan Lain.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title font-weight-bold">Ubah Akun Saya</h5>
                </div>
                <div class="card-body">
                  <form action="<?= base_url("admin/update") ?>" method="post">
                    <input type="hidden" name="id_pengguna" value="<?= $profile["id_pengguna"] ?>" />
                    <input type="hidden" name="current_profile" value="1" />
                    <div class="form-group row">
                      <div class="col-4">
                        <label>Username : </label>
                      </div>
                      <div class="col-8">
                        <input type="text" class="form-control" name="username" placeholder="Username.." value="<?= $profile["username"] ?>" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-4">
                        <label for="inputEmail">Email : </label>
                      </div>
                      <div class="col-8">
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email..." value="<?= $profile["email"] ?>" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-4">
                        <label for="inputPasswordLama">Password Lama :
                        </label>
                      </div>
                      <div class="col-8">
                        <input type="password" id="inputPasswordLama" class="form-control" name="password_lama" placeholder="Password Lama.." />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-4">
                        <label for="inputPasswordBaru">Password Baru :
                        </label>
                      </div>
                      <div class="col-8">
                        <input type="password" id="inputPasswordBaru" class="form-control" name="password_baru" placeholder="Input Password Baru.." />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-4">
                        <label for="inputUlangiPassword">Ulangi Password :
                        </label>
                      </div>
                      <div class="col-8">
                        <input type="password" id="inputUlangiPassword" class="form-control" name="password_ulangi" placeholder="Ulangi Password Baru.." />
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" style="
                            background-color: #02a09e;
                            border-color: #02a09e;
                          " class="btn btn-primary">
                        Update
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <?php
              $dataRows = count($admin);
              if ($dataRows > 1 && $profile["lvl_akses"] !== "supadmin") {
              ?>
                <div class="card card-danger card-outline">
                  <div class="card-header">
                    <h5 class="font-weight-bolder">Hapus Akun Saya</h5>
                  </div>
                  <div class="card-body">
                    <p>
                      Penghapusan akun permanen. Anda tidak dapat
                      menggunakan akun lagi. Apakah ingin memprosesnya?
                    </p>
                    <!-- <a href="<?= base_url("admin/delete/" . $profile["id_pengguna"]) ?>" class="btn btn-danger">Iya, Hapus Akun Saya</a> -->
                    <form action="<?= base_url("admin/delete/" . $profile["id_pengguna"]) ?>" method="post">
                      <button type="submit" name="btn_delete" value="hapus" class="btn btn-danger">Iya, Hapus Akun Saya</button>
                    </form>
                  </div>
                </div>
              <?php
              }
              ?>
              <!-- /.card -->
            </div>
            <?php
            // first check if level either "sales" or "collector"
            if ($level_profile === "admin" || $level_profile === "supadmin") {
            ?>
              <div class="col-xl-6">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <button id="btnCreateAdmin" type="submit" style="background-color: #02a09e; border-color: #02a09e;" data-toggle="modal" data-target="#form_create_admin" class="btn btn-primary" data-backdrop="static" data-keyboard="false">
                      <i class="fas fa-plus-square"></i>
                      Tambah Akun
                    </button>
                  </div>
                  <div class="card-body">
                    <h5 class="font-weight-bold">Data Semua Akun Admin</h5>
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Username</th>
                          <th>Level</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($admin as $adm) {
                          if ($adm["lvl_akses"] == "supadmin") continue; // if found the user with 'supadmin' level, skip.
                        ?>
                          <tr id="<?= $adm["id_pengguna"] ?>">
                            <td><?= $nomor ?></td>
                            <td><?= $adm["email"] ?></td>
                            <td><?= $adm["lvl_akses"] ?></td>
                            <td>
                              <?php
                              if ($adm["username"] !== $username) {
                              ?>
                                <a href="#" data-toggle="modal" data-target="#form_detail_admin" data-backdrop="static" data-keyboard="false" class="text-secondary detail">Detail</a>
                                <a href="#" data-toggle="modal" data-target="#form_update_admin" data-backdrop="static" data-keyboard="false" class="ubah">Ubah</a>
                                <a href="#" data-toggle="modal" data-target="#form_delete_admin" data-backdrop="static" data-keyboard="false" class="text-danger hapus">Hapus</a>
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                          $nomor++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?= $this->include("layout/v_footer") ?>
  </div>
  <!-- ./wrapper -->

  <!-- Form modal create new admin -->
  <div class="modal fade" id="form_create_admin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create New Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url("admin/create") ?>" method="post">
          <div class="modal-body">
            <div class="mb-3"><span class="text-danger font-weight-bold">&#42;</span> Wajib diisi</div>
            <div class="form-group row">
              <label for="inputUsername" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Username :
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Isi Nama User.." required />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmailUsername" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Email :
              </label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" id="inputEmailUsername" placeholder="Isi Email User.." required />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPasswordUsername" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Password :
              </label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password" id="inputPasswordUsername" placeholder="Isi Password Akun.." required />
              </div>
            </div>
          </div>
          <div class="form-group pl-3">
            <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
              Buat Akun
            </button>
            <button type="reset" class="btn btn-secondary">
              Reset Form
            </button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Form modal update admin -->
  <div class="modal fade" id="form_update_admin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url("admin/update") ?>" method="post">
          <input id="updateIDAdmin" type="hidden" name="id_pengguna" />
          <input id="oldEmail" type="hidden" name="old_email" />
          <div class="modal-body">
            <div class="mb-3"><span class="text-danger font-weight-bold">&#42;</span> Isian jangan kosong</div>
            <div class="form-group row">
              <label for="updateUsername" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Username</label>
              <div class="col-sm-8">
                <input type="text" name="username" class="form-control" id="updateUsername" required />
              </div>
            </div>
            <div class="form-group row">
              <label for="updateEmailUsername" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Email</label>
              <div class="col-sm-8">
                <input type="email" name="email" class="form-control" id="updateEmailUsername" required />
              </div>
            </div>
            <div class="form-group row">
              <label for="updatePasswordLama" class="col-sm-4 col-form-label">Password Lama</label>
              <div class="col-sm-8">
                <input type="password" name="password_lama" class="form-control" id="updatePasswordLama" />
              </div>
            </div>
            <div class="form-group row">
              <label for="updatePasswordBaru" class="col-sm-4 col-form-label">Password Baru</label>
              <div class="col-sm-8">
                <input type="password" name="password_baru" class="form-control" id="updatePasswordBaru" />
              </div>
            </div>
            <div class="form-group row">
              <label for="updateKonsumen" class="col-sm-4 col-form-label">Ulangi Password Baru</label>
              <div class="col-sm-8">
                <input type="password" name="password_ulangi" class="form-control" id="ulangiPassword" />
              </div>
            </div>
          </div>
          <div class="form-group pl-3">
            <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
              Ubah Data
            </button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Form modal detail admin -->
  <div class="modal fade" id="form_detail_admin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputUsername" class="col-sm-4 col-form-label">Username :
            </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="detailUsername" disabled />
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmailUsername" class="col-sm-4 col-form-label">Email :
            </label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="detailEmailUsername" disabled />
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPasswordUsername" class="col-sm-4 col-form-label">Password :
            </label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="detailPasswordUsername" disabled />
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Form modal delete admin -->
  <div class="modal fade" id="form_delete_admin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="uriPoint" value="<?= base_url("admin/delete/") ?>">
          <p>Tekan 'Proses' untuk menghapus data admin</p>
          <a href="#" id="btn_delete" class="btn btn-danger">Proses</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= base_url("plugins/jquery/jquery.min.js") ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url("plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url("dist/js/adminlte.min.js") ?>"></script>
  <script>
    $(function() {
      $("#btnCreateAdmin").click(function(e) {
        $("#inputUsername").val("");
        $("#inputEmailUsername").val("");
        $("#inputPasswordUsername").val("");
      });

      // If user click update form
      $(".ubah").click(function(e) {
        let id_pengguna = $(e.target).parent().parent().attr("id");
        $.ajax({
          url: "/admin/id/" + id_pengguna,
          method: "GET",
          success: function(response) {
            result = JSON.parse(response);
            $("#updateIDAdmin").val(result.id_pengguna);
            $("#oldEmail").val(result.email);
            $("#updateUsername").val(result.username);
            $("#updateEmailUsername").val(result.email);
          }
        });
      });

      $(".hapus").click(function(e) {
        let id_pengguna = $(e.target).parent().parent().attr("id");
        let uri_point = $("#uriPoint").val() + "/" + id_pengguna;
        $("#btn_delete").attr("href", uri_point);
      });

      // User click detail admin
      $(".detail").click(function(e) {
        let id_pengguna = $(e.target).parent().parent().attr("id");
        $.ajax({
          url: "/admin/id/" + id_pengguna,
          method: "GET",
          success: function(response) {
            result = JSON.parse(response);
            $("#detailUsername").val(result.username);
            $("#detailEmailUsername").val(result.email);
            $("#detailPasswordUsername").val("***********");
          }
        });
      });
    })
  </script>
</body>

</html>
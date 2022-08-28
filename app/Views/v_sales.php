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
            <div class="col-lg-6">
              <h1 class="m-0">Data Master Sales</h1>
            </div>
            <!-- /.col -->
            <div class="col-lg-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?= base_url("dashboard") ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Data Sales</li>
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
          <p class="m-0">Data Master Sales Baru Berhasil Ditambah.</p>
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
          <p class="m-0">Data Sales Berhasil Diubah.</p>
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
          <p class="m-0">Data Sales Berhasil Dihapus.</p>
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
          <p class="m-0">Password Lama Data Sales Tidak Benar. Ulangi Lagi.</p>
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
          <p class="m-0">Gagal Update Password Baru pada Data Master Sales. Pastikan Password Baru Sama yang Diulangi</p>
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
          <p class="m-0">Password Baru Masih Sama dengan Password Lama pada Data Master Sales.</p>
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
            <div class="col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <button id="createMaster" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_create_sales" data-backdrop="static" data-keyboard="false">
                    <i class="fas fa-plus-square"></i>
                    Tambah Data Sales
                  </button>
                </div>
                <div class="card-body">
                  <?php
                  $totalRows = count($sales);
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Data Sales Belum Ada</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="table-responsive">
                      <table id="data_sales" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama Sales</th>
                            <th>Email Sales</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $nomor = 1;
                          foreach ($sales as $dataSales) {
                          ?>
                            <tr id="<?= $dataSales["id_pengguna"] ?>">
                              <td><?= $nomor ?></td>
                              <td><?= $dataSales["username"] ?></td>
                              <td><?= $dataSales["email"] ?></td>
                              <td>
                                <a href="#" class="text-secondary detail" data-toggle="modal" data-target="#form_detail_sales" data-backdrop="static" data-keyboard="false">Detail</a>
                                <a href="#" class="ubah" data-toggle="modal" data-target="#form_update_sales" data-backdrop="static" data-keyboard="false">Ubah</a>
                                <a href="#" class="text-danger hapus" data-toggle="modal" data-target="#form_delete_sales" data-backdrop="static" data-keyboard="false">Hapus</a>
                              </td>
                            </tr>
                          <?php
                            $nomor++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-md-12 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?= base_url("layout/v_footer") ?>
  </div>
  <!-- ./wrapper -->

  <!-- Form modal create new sales -->
  <div class="modal fade" id="form_create_sales">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create New Sales</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url("masters/sales/create") ?>" method="post">
          <div class="modal-body">
            <div class="mb-3"><span class="text-danger font-weight-bold">&#42;</span> Wajib diisi</div>
            <div class="form-group row">
              <label for="inputSales" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Username Sales</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputSales" name="username" placeholder="Isi Nama Sales.." required />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Email Sales</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Isi Email Sales.." required />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password Akun..." required />
              </div>
            </div>
          </div>
          <div class="form-group pl-3">
            <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
              Simpan Data
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

  <!-- Form modal update sales data -->
  <div class="modal fade" id="form_update_sales">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data Sales</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url("masters/sales/update") ?>" method="post">
          <input type="hidden" id="updateIDPengguna" name="id_pengguna">
          <input type="hidden" id="oldEmail" name="old_email">
          <div class="modal-body">
            <div class="mb-3"><span class="text-danger font-weight-bold">&#42;</span> Isian jangan kosong</div>
            <div class="form-group row">
              <label for="updateUsername" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Username Sales</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="username" id="updateUsername" placeholder="Isi Nama Sales.." />
              </div>
            </div>
            <div class="form-group row">
              <label for="updateEmail" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Email Sales</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" id="updateEmail" placeholder="Isi Email Sales.." />
              </div>
            </div>
            <div class="form-group row">
              <label for="ubahPasswordLama" class="col-sm-4 col-form-label">Password Lama</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password_lama" id="updatePasswordLama" placeholder="Password Akun..." />
              </div>
            </div>
            <div class="form-group row">
              <label for="ubahPasswordBaru" class="col-sm-4 col-form-label">Password Baru</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password_baru" id="updatePasswordBaru" placeholder="Password Akun..." />
              </div>
            </div>
            <div class="form-group row">
              <label for="ubahUlangiPassword" class="col-sm-4 col-form-label">Ulangi Password Baru</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password_ulangi" id="inputUlangiPassword" placeholder="Password Akun..." />
              </div>
            </div>
          </div>
          <div class="form-group pl-3">
            <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
              Ubah Data
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

  <!-- Form modal detail sales data -->
  <div class="modal fade" id="form_detail_sales">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Info Data Sales</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Username Sales</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="infoSales" disabled />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Email Sales</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="infoEmail" disabled />
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Form modal delete sales -->
  <div class="modal fade" id="form_delete_sales">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data Sales</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="uriPoint" value="<?= base_url("masters/sales/delete/") ?>">
          <p>Tekan 'Proses' untuk menghapus data Master Sales</p>
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
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url("plugins/datatables/jquery.dataTables.min.js") ?>"></script>
  <script src="<?= base_url("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
  <script src="<?= base_url("plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>"></script>
  <script src="<?= base_url("plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>"></script>
  <script src="<?= base_url("plugins/datatables-buttons/js/dataTables.buttons.min.js") ?>"></script>
  <script src="<?= base_url("plugins/datatables-buttons/js/buttons.bootstrap4.min.js") ?>"></script>
  <script src="<?= base_url("plugins/jszip/jszip.min.js") ?>"></script>
  <script src="<?= base_url("plugins/pdfmake/pdfmake.min.js") ?>"></script>
  <script src="<?= base_url("plugins/pdfmake/vfs_fonts.js") ?>"></script>
  <script src="<?= base_url("plugins/datatables-buttons/js/buttons.html5.min.js") ?>"></script>
  <script src="<?= base_url("plugins/datatables-buttons/js/buttons.print.min.js") ?>"></script>
  <script src="<?= base_url("plugins/datatables-buttons/js/buttons.colVis.min.js") ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url("dist/js/adminlte.min.js") ?>"></script>
  <script>
    $(function() {
      // For datatable
      $("#data_sales").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
      });

      $("#createMaster").click(function(e) {
        $("#inputSales").val("");
        $("#inputEmail").val("");
        $("#inputPassword").val("");
      });

      // Click to display info of sales master
      $(".detail").click(function(e) {
        let id_pengguna = $(e.target).parent().parent().attr("id");
        $.ajax({
          url: "/masters/sales/id/" + id_pengguna,
          method: "GET",
          success: function(response) {
            result = JSON.parse(response);
            $("#infoSales").val(result.username);
            $("#infoEmail").val(result.email);
          }
        });
      });

      // If user click update form
      $(".ubah").click(function(e) {
        let id_pengguna = $(e.target).parent().parent().attr("id");
        $.ajax({
          url: "/masters/sales/id/" + id_pengguna,
          method: "GET",
          success: function(response) {
            result = JSON.parse(response);
            $("#updateIDPengguna").val(result.id_pengguna);
            $("#oldEmail").val(result.email);
            $("#updateUsername").val(result.username);
            $("#updateEmail").val(result.email);
          }
        });
      });

      $(".hapus").click(function(e) {
        let id_pengguna = $(e.target).parent().parent().attr("id");
        let uri_point = $("#uriPoint").val() + "/" + id_pengguna;
        $("#btn_delete").attr("href", uri_point);
      });
    });
  </script>
</body>

</html>
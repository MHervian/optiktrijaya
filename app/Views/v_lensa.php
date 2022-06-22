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
            <div class="col-sm-6">
              <h1 class="m-0">Data Master Lensa dan Kacamata</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="dashboard.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Data Master Lensa dan Kacamata</li>
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
          <p class="m-0">Data Baru Master Lensa Berhasil Ditambah</p>
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
          <p class="m-0">Data Master Lensa Berhasil Diubah</p>
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
          <p class="m-0">Data Master Lensa Berhasil Dihapus</p>
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
            <div class="col-lg-5">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5>Data Jenis Lensa
                    <button id="createJenis" style="background-color: #02a09e; border-color: #02a09e;" class="ml-2 btn btn-primary btn-sm tambah" type="button" data-toggle="modal" data-target="#form_create_lensa" data-backdrop="static" data-keyboard="false">
                      <i class="fas fa-plus-square"></i> Tambah Jenis
                    </button>
                  </h5>
                </div>
                <div class="card-body">
                  <?php
                  $totalRows = count($lens);
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Data Jenis Lensa Belum Ada.</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <table id="data_konsumen" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jenis Lensa</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($lens as $data_lensa) {
                        ?>
                          <tr id="jenis-<?= $data_lensa["id_lensa"] ?>">
                            <td><?= $nomor ?></td>
                            <td><?= $data_lensa["jenis_lensa"] ?></td>
                            <td>
                              <a href="#" data-toggle="modal" data-target="#form_update_lensa" data-backdrop="static" data-keyboard="false" class="ubah">Ubah</a>
                              <a href="#" class="text-danger hapus" data-toggle="modal" data-target="#form_delete_lensa" data-backdrop="static" data-keyboard="false">Hapus</a>
                            </td>
                          </tr>
                        <?php
                          $nomor++;
                        }
                        ?>
                      </tbody>
                    </table>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5>Data Warna
                    <button id="createWarna" style="background-color: #02a09e; border-color: #02a09e;" class="ml-2 btn btn-primary btn-sm tambah" type="button" data-toggle="modal" data-target="#form_create_lensa" data-backdrop="static" data-keyboard="false">
                      <i class="fas fa-plus-square"></i> Tambah Warna
                    </button>
                  </h5>
                </div>
                <div class="card-body">
                  <?php
                  $totalRows = count($warna);
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Data Warna Belum Ada.</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <table id="data_warna" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Warna</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($warna as $wa) {
                        ?>
                          <tr id="warna-<?= $wa["id_warna"] ?>">
                            <td><?= $nomor ?></td>
                            <td><?= $wa["nama"] ?></td>
                            <td>
                              <a href="#" data-toggle="modal" data-target="#form_update_lensa" data-backdrop="static" data-keyboard="false" class="ubah">Ubah</a>
                              <a href="#" class="text-danger hapus" data-toggle="modal" data-target="#form_delete_lensa" data-backdrop="static" data-keyboard="false">Hapus</a>
                            </td>
                          </tr>
                        <?php
                          $nomor++;
                        }
                        ?>
                      </tbody>
                    </table>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5>Data Bahan Lensa
                    <button id="createBahan" style="background-color: #02a09e; border-color: #02a09e;" class="ml-2 btn btn-primary btn-sm tambah" type="button" data-toggle="modal" data-target="#form_create_lensa" data-backdrop="static" data-keyboard="false">
                      <i class="fas fa-plus-square"></i> Tambah Bahan
                    </button>
                  </h5>
                </div>
                <div class="card-body">
                  <?php
                  $totalRows = count($bahan);
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Data Bahan Lensa Belum Ada.</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <table id="data_konsumen" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jenis Bahan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($bahan as $bhn) {
                        ?>
                          <tr id="bahan-<?= $bhn["id_flattop"] ?>">
                            <td><?= $nomor ?></td>
                            <td><?= $bhn["bahan_lensa"] ?></td>
                            <td>
                              <a href="#" data-toggle="modal" data-target="#form_update_lensa" data-backdrop="static" data-keyboard="false" class="ubah">Ubah</a>
                              <a href="#" class="text-danger hapus" data-toggle="modal" data-target="#form_delete_lensa" data-backdrop="static" data-keyboard="false">Hapus</a>
                            </td>
                          </tr>
                        <?php
                          $nomor++;
                        }
                        ?>
                      </tbody>
                    </table>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5>Data Coating Lensa
                    <button id="createCoating" style="background-color: #02a09e; border-color: #02a09e;" class="ml-2 btn btn-primary btn-sm tambah" type="button" data-toggle="modal" data-target="#form_create_lensa" data-backdrop="static" data-keyboard="false">
                      <i class="fas fa-plus-square"></i> Tambah Coating
                    </button>
                  </h5>
                </div>
                <div class="card-body">
                  <?php
                  $totalRows = count($coating);
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Data Coating Lensa Belum Ada.</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <table id="data_konsumen" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jenis Coating</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($coating as $coat) {
                        ?>
                          <tr id="coating-<?= $coat["id_coating"] ?>">
                            <td><?= $nomor ?></td>
                            <td><?= $coat["nama_coating"] ?></td>
                            <td>
                              <a href="#" data-toggle="modal" data-target="#form_update_lensa" data-backdrop="static" data-keyboard="false" class="ubah">Ubah</a>
                              <a href="#" class="text-danger hapus" data-toggle="modal" data-target="#form_delete_lensa" data-backdrop="static" data-keyboard="false">Hapus</a>
                            </td>
                          </tr>
                        <?php
                          $nomor++;
                        }
                        ?>
                      </tbody>
                    </table>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
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

  <!-- Form modal create data lensa -->
  <div class="modal fade" id="form_create_lensa">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="titleForm"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url("masters/lensa/create") ?>" method="post">
          <input id="jenisData" type="hidden" name="jenis_data" />
          <div class="modal-body">
            <div class="form-group row">
              <label for="inputNama" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="nama" class="form-control" id="inputNama" />
              </div>
            </div>
          </div>
          <div class="form-group pl-3">
            <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
              <i class="fas fa-plus-square"></i> Tambah Data
            </button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Form modal update data lensa -->
  <div class="modal fade" id="form_update_lensa">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="titleFormUpdate"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url("masters/lensa/update") ?>" method="post">
          <input id="jenisDataUpdate" type="hidden" name="jenis_data" />
          <input id="idData" type="hidden" name="id_data" />
          <div class="modal-body">
            <div class="form-group row">
              <label for="updateNama" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="nama" class="form-control" id="updateNama" />
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

  <!-- Form modal delete data master lensa -->
  <div class="modal fade" id="form_delete_lensa">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="titleDeleteData"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="uriPoint" value="<?= base_url("masters/lensa/delete/") ?>">
          <p>Tekan 'Proses' untuk menghapus data <span id="data"></span></p>
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
      $(".tambah").click(function(evt) {
        let pilihan = evt.target.id;
        let titleForm = "";

        switch (pilihan) {
          case "createJenis": {
            titleForm = "Form Input Jenis Lensa";
            break;
          }
          case "createWarna": {
            titleForm = "Form Input Warna";
            break;
          }
          case "createBahan": {
            titleForm = "Form Input Bahan Lensa";
            break;
          }
          case "createCoating": {
            titleForm = "Form Input Coating Lensa";
            break;
          }
        }

        $("#titleForm").text(titleForm);
        $("#jenisData").val(pilihan);
      });

      $(".ubah").click(function(evt) {
        let pilihan = $(evt.target).parent().parent().attr("id");
        let titleForm = "";
        let kelompok = pilihan.split("-")[0];
        let id = pilihan.split("-")[1];
        let result = null;
        let data = null;

        $.ajax({
          url: "/masters/lensa/" + kelompok + "/" + id,
          method: "GET",
          async: false,
          success: function(response) {
            result = JSON.parse(response);
            result = result[0];
          }
        });

        console.log(result);

        switch (kelompok) {
          case "jenis": {
            titleForm = "Form Ubah Data Jenis Lensa";
            pilihan = "updateJenis";
            data = result.jenis_lensa;
            break;
          }
          case "warna": {
            titleForm = "Form Ubah Data Warna";
            pilihan = "updateWarna";
            data = result.nama;
            break;
          }
          case "bahan": {
            titleForm = "Form Ubah Data Bahan Lensa";
            pilihan = "updateBahan";
            data = result.bahan_lensa;
            break;
          }
          case "coating": {
            titleForm = "Form Ubah Data Coating Lensa";
            pilihan = "updateCoating";
            data = result.nama_coating;
            break;
          }
        }

        $("#titleFormUpdate").text(titleForm);
        $("#jenisDataUpdate").val(pilihan);
        $("#idData").val(id);
        $("#updateNama").val(data);
      });

      $(".hapus").click(function(evt) {
        let pilihan = $(evt.target).parent().parent().attr("id");
        let kelompok = pilihan.split("-")[0];
        let id = pilihan.split("-")[1];
        let uriPoint = $("#uriPoint").val();
        let titleDeleteData = "";
        let info = "";

        switch (kelompok) {
          case "jenis": {
            titleDeleteData = "Hapus Data Master Jenis Lensa";
            info = "jenis lensa";
            break;
          }
          case "warna": {
            titleDeleteData = "Hapus Data Master Warna";
            info = "warna";
            break;
          }
          case "bahan": {
            titleDeleteData = "Hapus Data Master Bahan";
            info = "bahan lensa";
            break;
          }
          case "coating": {
            titleDeleteData = "Hapus Data Master Coating";
            info = "coating lensa";
            break;
          }
        }

        $("#titleDeleteData").text(titleDeleteData);
        $("#data").text(info);
        $("#btn_delete").attr("href", uriPoint + "/" + kelompok + "/" + id);
      })
    })
  </script>
</body>

</html>
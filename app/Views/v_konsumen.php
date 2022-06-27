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
              <h1 class="m-0">Data Konsumen</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?= base_url("dashboard") ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Data Konsumen</li>
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
          <p class="m-0">Data Konsumen Baru Berhasil Ditambah</p>
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
          <p class="m-0">Data Konsumen Berhasil Diubah</p>
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
          <p class="m-0">Data Konsumen Berhasil Dihapus</p>
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
                  <button id="createKonsumen" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_create_konsumen" data-backdrop="static" data-keyboard="false">
                    <i class="fas fa-plus-square"></i>
                    Tambah Konsumen
                  </button>
                </div>
                <div class="card-body">
                  <?php
                  $totalRows = count($konsumen);
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Data Konsumen Belum Ada</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <table id="data_konsumen" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Pelanggan</th>
                          <th>No Telepon</th>
                          <th>Tgl Lahir</th>
                          <th>Alamat</th>
                          <th>Kredit Aktif</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($konsumen as $dataKonsumen) {
                        ?>
                          <tr id="<?= $dataKonsumen["id_konsumen"] ?>">
                            <td><?= $nomor ?></td>
                            <td><?= $dataKonsumen["nama"] ?></td>
                            <td><?= $dataKonsumen["no_telepon"] ?></td>
                            <td><?= date("d F Y", strtotime($dataKonsumen["tgl_lahir"])) ?></td>
                            <td>
                              <?= $dataKonsumen["alamat"] ?>
                            </td>
                            <?= ($dataKonsumen["jumlah"] !== "0") ? "<td class='text-danger'>YA</td>" : "<td class='text-success'>TIDAK</td>" ?>
                            <td>
                              <a href="<?= base_url("konsumen/detail/" . $dataKonsumen["id_konsumen"]) ?>" class="text-secondary d-block">Detail</a>
                              <a href="#" data-toggle="modal" data-target="#form_update_user" data-backdrop="static" data-keyboard="false" class="d-block ubah">Ubah</a>
                              <a href="#" class="text-danger d-block hapus" data-toggle="modal" data-target="#form_delete_user" data-backdrop="static" data-keyboard="false">Hapus</a>
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
              <!-- /.card -->
            </div>
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

  <!-- Form modal create new user -->
  <div class="modal fade" id="form_create_konsumen">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create New Konsumen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url("konsumen/create") ?>" method="post">
          <div class="modal-body">
            <div class="mb-3"><span class="text-danger font-weight-bold">&#42;</span> Wajib diisi</div>
            <div class="form-group row">
              <label for="inputKonsumen" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Nama</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputKonsumen" name="nama" placeholder="Isi Nama Konsumen.." required />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputBirth" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Tanggal Lahir</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="inputBirth" name="tgl_lahir" required />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputContact" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Nomor Telepon</label>
              <div class="col-sm-8">
                <input type="tel" class="form-control" id="inputContact" name="no_telepon" placeholder="Isi Nomor Kontak.." required />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputAddress" class="col-sm-4 col-form-label"><span class="text-danger font-weight-bold">&#42;</span> Alamat</label>
              <div class="col-sm-8">
                <textarea type="date" class="form-control" id="inputAddress" name="alamat" placeholder="Isi Alamat User.." required></textarea>
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

  <!-- Form modal update konsumen -->
  <div class="modal fade" id="form_update_user">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data Konsumen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url("konsumen/update") ?>" method="post">
          <input id="updateIDKonsumen" type="hidden" name="id_konsumen" />
          <div class="modal-body">
            <div class="form-group row">
              <label for="updateKonsumen" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="nama" class="form-control" id="updateKonsumen" />
              </div>
            </div>
            <div class="form-group row">
              <label for="updateBirth" class="col-sm-4 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-8">
                <input type="date" name="tgl_lahir" class="form-control" id="updateBirth" />
              </div>
            </div>
            <div class="form-group row">
              <label for="updateContact" class="col-sm-4 col-form-label">Nomor Telepon</label>
              <div class="col-sm-8">
                <input type="tel" name="no_telepon" class="form-control" id="updateContact" />
              </div>
            </div>
            <div class="form-group row">
              <label for="updateAddress" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <textarea type="date" name="alamat" class="form-control" id="updateAddress"></textarea>
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

  <!-- Form modal delete user -->
  <div class="modal fade" id="form_delete_user">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data Konsumen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="uriPoint" value="<?= base_url("konsumen/delete/") ?>">
          <p>Tekan 'Proses' untuk menghapus data konsumen</p>
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
  <!-- Custom Javascript Here -->
  <script>
    $(function() {
      // For datatable
      $("#data_konsumen").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
      });

      $("#createKonsumen").click(function(e) {
        $("#inputKonsumen").val("");
        $("#inputBirth").val("");
        $("#inputContact").val("");
        $("#inputAddress").val("");
      });

      // If user click update form
      $(".ubah").click(function(e) {
        let id_konsumen = $(e.target).parent().parent().attr("id");
        $.ajax({
          url: "/konsumen/id/" + id_konsumen,
          method: "GET",
          success: function(response) {
            result = JSON.parse(response);
            $("#updateIDKonsumen").val(result.id_konsumen);
            $("#updateKonsumen").val(result.nama);
            $("#updateBirth").val(result.tgl_lahir);
            $("#updateContact").val(result.no_telepon);
            $("#updateAddress").val(result.alamat);
          }
        });
      });

      $(".hapus").click(function(e) {
        let id_konsumen = $(e.target).parent().parent().attr("id");
        let uri_point = $("#uriPoint").val() + "/" + id_konsumen;
        $("#btn_delete").attr("href", uri_point);
      });
    });
  </script>
</body>

</html>
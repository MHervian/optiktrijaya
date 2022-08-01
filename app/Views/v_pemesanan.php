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
              <h1 class="m-0">Data Pemesanan</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="dashboard.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Data Pemesanan</li>
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
          <p class="m-0">Data Pemesanan Baru Berhasil Ditambah</p>
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
          <p class="m-0">Data Pemesanan Berhasil Diubah</p>
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
          <p class="m-0">Data Pemesanan Berhasil Dihapus</p>
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
                <?php
                $level = session("level");
                if ($level !== "collector") {
                ?>
                  <div class="card-header">
                    <a href="<?= base_url("buat-pemesanan") ?>" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
                      <i class="fas fa-plus-square"></i>
                      Tambah Pemesanan
                    </a>
                  </div>
                <?php
                }
                ?>
                <div class="card-body">
                  <?php
                  $totalRows = count($pemesanan);
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Data Pemesanan Belum Ada</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <table id="data_pemesanan" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No SP</th>
                          <th>Nama Pemesan</th>
                          <th>No Telepon</th>
                          <th>Sisa Kredit</th>
                          <th>Tgl Pemesanan</th>
                          <th>Tgl Pengiriman</th>
                          <th>Tgl Jatuh Tempo</th>
                          <th>Sales</th>
                          <th>Status Pemesanan</th>
                          <th>Status Kredit</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($pemesanan as $p) {
                        ?>
                          <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $p["no_sp"] ?></td>
                            <td><?= $p["nama"] ?></td>
                            <td><?= $p["no_telepon"] ?></td>
                            <td>Rp<?= number_format(floatval($p["sisa_kredit"]), 2) ?></td>
                            <td><?= date("d F Y", strtotime($p["tgl_pemesanan"])) ?></td>
                            <td><?= date("d F Y", strtotime($p["tgl_pengiriman"])) ?></td>
                            <td><?= date("d F Y", strtotime($p["tgl_jatuh_tempo"])) ?></td>
                            <td><?= str_replace(";", ", ", $p["sales"]) ?></td>
                            <?php
                            if ($p["status_jalan"] === "aktif") {
                            ?>
                              <td class="font-weight-bold text-success"><?= $p["status_jalan"] ?></td>
                            <?php
                            } else {
                            ?>
                              <td class="font-weight-bold text-danger"><?= $p["status_jalan"] ?></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($p["status_kredit"] === "ya") {
                            ?>
                              <td class="font-weight-bold text-danger">Belum Selesai</td>
                            <?php
                            } else {
                            ?>
                              <td class="font-weight-bold text-success">Selesai</td>
                            <?php
                            }
                            ?>
                            <td>
                              <a href="<?= base_url("pemesanan/detail/" . $p["id_pemesanan"]) ?>">Detail</a>
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
      $("#data_pemesanan").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
      });
    });
  </script>
</body>

</html>
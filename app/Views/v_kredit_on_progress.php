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
              <h1 class="m-0">Kredit Belum Bayar</h1>
            </div>
            <!-- /.col -->
            <div class="col-lg-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?= base_url("dashboard") ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Data Kredit Terbayar</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="mb-3">
                    <a href="<?= base_url("kredit/terbayar") ?>" class="btn btn-primary" style="background-color: #02a09e; border-color: #02a09e;">
                      <i class="fas fa-clipboard-list"></i>
                      lihat Kredit Sudah Dibayar
                    </a>
                  </div>
                  <div class="mb-5">
                    <p>Cari Data dari Tanggal</p>
                    <form id="form_search" action="<?= base_url("kredit/progress/cari") ?>" method="post" class="row">
                      <input type="hidden" value="cariData" name="cari_data">
                      <div class="col-md-4 mb-3 position-relative">
                        <select id="tahun_search" class="form-control" name="tahun">
                          <option value="none">Tahun</option>
                          <?php
                          foreach ($tanggal as $t) {
                          ?>
                            <option value="<?= $t["log_year"] ?>"><?= $t["log_year"] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <p id="danger_tahun" class="text-danger position-absolute" style="display:none;">Pilih Tahun</p>
                      </div>
                      <div class="col-md-4 mb-3 position-relative">
                        <select id="bulan_search" class="form-control" name="bulan">
                          <option value="none">Bulan</option>
                          <option value="01">Januari</option>
                          <option value="02">Februari</option>
                          <option value="03">Maret</option>
                          <option value="04">April</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
                          <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                        </select>
                        <p id="danger_bulan" class="text-danger position-absolute" style="display:none;">Pilih Bulan</p>
                      </div>
                      <div class="col-md-3">
                        <button id="btnSearchLog" type="submit" class="btn btn-primary">Cari</button>
                      </div>
                    </form>
                  </div>
                  <?php
                  $totalRows = (!empty($cicilan)) ? count($cicilan) : 0;
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Tidak Ada Pesanan Atau Tidak Ada Kredit Berjalan Tgl <span class="font-weight-bold"><?= $tgl ?></span>.</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <hr>
                    <h4 class="mb-2">Tanggal: <span class="font-weight-bold"><?= $tgl ?></span></h4>
                    <h5 class="mb-4">Total Data: <span class="font-weight-bold text-danger"><?= $totalRows ?></span></h5>
                    <div class="table-responsive">
                      <table id="data_kredit" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama Pelanggan</th>
                            <th>No Pesanan</th>
                            <th>Sisa Kredit</th>
                            <th>Tenor Terakhir Ke-</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $nomor = 1;
                          foreach ($cicilan as $c) {
                          ?>
                            <tr>
                              <td><?= $nomor ?></td>
                              <td><?= $c["nama"] ?></td>
                              <td><?= $c["no_sp"] ?></td>
                              <td>Rp<?= number_format($c["sisa_kredit"]) ?></td>
                              <td><?= $c["tenor"] ?></td>
                              <td>
                                <a href="<?= base_url("pemesanan/detail/" . $c["id_pemesanan"]) ?>" class="text-primary d-block">Detail</a>
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
      // For datatable
      $("#data_kredit").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
      });

      $("#form_search").submit(function(evt) {
        var tahun = $("#tahun_search").val();
        var bulan = $("#bulan_search").val();
        $("#tahun_search").css({
          "border": "1px solid #ced4da"
        });
        $("#danger_tahun").css({
          "display": "none"
        });
        $("#bulan_search").css({
          "border": "1px solid #ced4da"
        });
        $("#danger_bulan").css({
          "display": "none"
        });

        if (tahun === "none") {
          $("#tahun_search").css({
            "border": "1px solid red"
          });
          $("#danger_tahun").css({
            "display": "block"
          });
          evt.preventDefault();
        }

        if (bulan === "none") {
          $("#bulan_search").css({
            "border": "1px solid red"
          });
          $("#danger_bulan").css({
            "display": "block"
          });
          evt.preventDefault();
        }
      });
    });
  </script>
</body>

</html>
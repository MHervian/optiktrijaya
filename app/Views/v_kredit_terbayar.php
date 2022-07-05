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
              <h1 class="m-0">Kredit Sudah Dibayar Bulan Ini <span class="font-weight-bold">(<?= date("F Y") ?>)</span></h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
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
                  <?php
                  $totalRows = (!empty($terbayar)) ? count($terbayar) : 0;
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Bulan Ini Belum Ada yang Membayar Kredit Atau Tidak Ada Pesanan</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <p class="mb-4">Jumlah kredit pesanan yang dibayar bulan ini: <span class="font-weight-bold"><?= $totalRows ?></span></p>
                    <div class="mb-3">
                      <a href="<?= base_url("kredit/terbayar") ?>" class="btn btn-primary" style="background-color: #02a09e; border-color: #02a09e;">
                        <i class="fas fa-clipboard-list"></i> Cek Kredit Belum Terbayar
                      </a>
                    </div>
                    <table id="data_konsumen" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Pelanggan</th>
                          <th>No Pesanan</th>
                          <th>Tgl Bayar</th>
                          <th>Besar</th>
                          <th>Tenor Ke-</th>
                          <th>Collector/Sales</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($terbayar as $tr) {
                          $tgl_bayar = strtotime($tr["tgl_bayar"]);
                          $tgl_bayar = date("d F Y", $tgl_bayar);
                        ?>
                          <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $tr["nama"] ?></td>
                            <td><?= $tr["no_sp"] ?></td>
                            <td><?= $tgl_bayar ?></td>
                            <td>Rp<?= number_format($tr["jmlh_bayar"]) ?></td>
                            <td><?= $tr["tenor"] ?></td>
                            <td><?= $tr["collector"] ?></td>
                            <td>
                              <a href="<?= base_url("pemesanan/detail/" . $tr["id_pemesanan"]) ?>" class="text-primary d-block">Detail</a>
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
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
              <h1 class="m-0">Detail Konsumen</h1>
            </div>
            <!-- /.col -->
            <div class="col-lg-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?= base_url("dashboard") ?>">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="<?= base_url("konsumen") ?>">Data Konsumen</a>
                </li>
                <li class="breadcrumb-item active">Detail Konsumen</li>
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
            <!-- /.col-md-6 -->
            <div class="col-xl-8 col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="font-weight-bold">
                    Data Pemesan:
                    <button href="#" class="btn btn-primary ubah" data-toggle="modal" data-target="#form_update_user" data-backdrop="static" data-keyboard="false">
                      <i class="fas fa-edit"></i> Ubah
                    </button>
                    <button href="#" class="btn btn-danger hapus" data-toggle="modal" data-target="#form_delete_user" data-backdrop="static" data-keyboard="false">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </h5>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td><?= $konsumen["no_telepon"] ?></td>
                          </tr>
                          <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $konsumen["nama"] ?></td>
                          </tr>
                          <?php
                          // Calculate age 
                          $timestamp = strtotime($konsumen["tgl_lahir"]);
                          $tahun = intval(date("Y", $timestamp));
                          ?>
                          <tr>
                            <td>Usia</td>
                            <td>:</td>
                            <td><?= intval(date("Y")) - $tahun ?> Tahun</td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                              <?= $konsumen["alamat"] ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-xl-6">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="font-weight-bold">Pembayaran Kredit Aktif:</h5>
                  <?php
                  $totalRows = count($kredit);
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Belum Ada Pemesanan</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>No. SP</th>
                            <th>Sisa Kredit</th>
                            <th>Jatuh Tempo</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $nomor = 1;
                          foreach ($kredit as $kr) {
                          ?>
                            <tr>
                              <td><?= $nomor ?></td>
                              <td><?= $kr["no_sp"] ?></td>
                              <td>Rp<?= number_format(floatval($kr["sisa_kredit"]), 2) ?></td>
                              <td><?= date("d F Y", strtotime($kr["tgl_jatuh_tempo"])) ?></td>
                              <td>
                                <a href="<?= base_url("pemesanan/detail/" . $kr["id_pemesanan"]) ?>">Detail</a>
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
            </div>
            <input type="hidden" id="uriPoint" value="<?= base_url("/konsumen/delete") ?>">
            <div class="col-xl-6">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="font-weight-bold">Pembayaran Kredit Lunas:</h5>
                  <?php
                  $totalRows = count($lunas);
                  if ($totalRows === 0) {
                  ?>
                    <div class="alert alert-info text-center alert-dismissible fade show mb-4" role="alert">
                      <p class="m-0">Belum Ada Kredit Pemesanan Lunas</p>
                    </div>
                  <?php
                  } else {
                  ?>
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No. SP</th>
                          <th>Total Pembelian</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($lunas as $ln) {
                        ?>
                          <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $ln["no_sp"] ?></td>
                            <td>Rp<?= number_format(floatval($ln["harga"]), 2) ?></td>
                            <td>
                              <a href="<?= base_url("pemesanan/detail/" . $ln["id_pemesanan"]) ?>">Detail</a>
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
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?= $this->include("layout/v_footer") ?>
  </div>
  <!-- ./wrapper -->

  <!-- Form modal update user -->
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
          <input type="hidden" id="id_konsumen" name="id_konsumen" value="<?= $konsumen["id_konsumen"] ?>" />
          <input type="hidden" name="from" value="v_detail_konsumen" />
          <div class="modal-body">
            <div class="form-group row">
              <label for="inputUser" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nama" id="updateKonsumen" placeholder="Isi Nama User.." />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputBirth" class="col-sm-4 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="tgl_lahir" id="updateBirth" />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputContact" class="col-sm-4 col-form-label">Nomor Telepon</label>
              <div class="col-sm-8">
                <input type="tel" class="form-control" name="no_telepon" id="updateContact" placeholder="Isi Nomor Kontak.." />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputAddress" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <textarea type="date" class="form-control" name="alamat" id="updateAddress" placeholder="Isi Alamat User.."></textarea>
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
</body>

<script>
  $(function() {
    // If user click update form
    $(".ubah").click(function(e) {
      let id_konsumen = $("#id_konsumen").val();
      $.ajax({
        url: "/konsumen/id/" + id_konsumen,
        method: "GET",
        success: function(response) {
          result = JSON.parse(response);
          $("#updateKonsumen").val(result.nama);
          $("#updateBirth").val(result.tgl_lahir);
          $("#updateContact").val(result.no_telepon);
          $("#updateAddress").val(result.alamat);
        }
      });
    });

    $(".hapus").click(function(e) {
      let id_konsumen = $("#id_konsumen").val();
      let uri_point = $("#uriPoint").val() + "/" + id_konsumen;
      $("#btn_delete").attr("href", uri_point);
    });
  })
</script>

</html>
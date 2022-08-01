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
              <h1 class="m-0">Detail Pemesanan</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?= base_url("dashboard") ?>">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="<?= base_url("pemesanan") ?>">Data Pesanan</a>
                </li>
                <li class="breadcrumb-item active">Detail Pemesanan</li>
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
      if (isset($pageStatus) && $pageStatus === "update success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Detail Data Pemesanan Berhasil Diubah.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "transaction success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Pembayaran Kredit Telah Berhasil Direkap Sistem.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "cancel success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Pembayaran Kredit Pesanan Ini Telah Berhasil Dicancel.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "activate success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Pembayaran Kredit Pesanan Ini Telah Berhasil Diaktifkan Kembali.</p>
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
                <div class="card-body">
                  <h5 class="font-weight-bold">
                    Data Harga dan Spesifikasi :
                    <a href="<?= base_url("pemesanan/edit/" . $detail["id_pemesanan"]) ?>" class="btn btn-primary">
                      <i class="fas fa-edit"></i> Ubah
                    </a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#form_delete_pemesanan" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                    <?php
                    if ($detail["status_jalan"] === "aktif") { ?>
                      <button class="btn btn-danger" data-toggle="modal" data-target="#form_cancel_pemesanan" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                        <i class="fas fa-times-circle"></i> Cancel
                      </button>
                    <?php
                    } else {
                    ?>
                      <button class="btn btn-success" data-toggle="modal" data-target="#form_activate_pemesanan" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                        <i class="fas fa-check-circle"></i> Activate
                      </button>
                    <?php
                    }
                    ?>
                  </h5>
                  <div class="row">
                    <div class="col-md-4">
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td>Status Pemesanan</td>
                            <td>:</td>
                            <?php
                            if ($detail["status_jalan"] === "aktif") {
                            ?>
                              <td class="text-success font-weight-bold"><?= $detail["status_jalan"] ?></td>
                            <?php
                            } else {
                            ?>
                              <td class="text-danger font-weight-bold"><?= $detail["status_jalan"] ?></td>
                            <?php
                            }
                            ?>
                          </tr>
                          <tr>
                            <td>Status Kredit</td>
                            <td>:</td>
                            <?php
                            if ($detail["status_kredit"] === "ya") {
                            ?>
                              <td class="text-danger font-weight-bold">Belum Selesai</td>
                            <?php
                            } else {
                            ?>
                              <td class="text-success font-weight-bold">Selesai</td>
                            <?php
                            }
                            ?>
                          </tr>
                          <tr>
                            <td>No. SP</td>
                            <td>:</td>
                            <td><?= $detail["no_sp"] ?></td>
                          </tr>
                          <tr>
                            <td>Frame</td>
                            <td>:</td>
                            <td><?= $detail["frame"] ?></td>
                          </tr>
                          <tr>
                            <td>Lensa</td>
                            <td>:</td>
                            <td><?= $detail["lensa"] ?></td>
                          </tr>
                          <tr>
                            <td>Bahan</td>
                            <td>:</td>
                            <td><?= $detail["flattop"] ?></td>
                          </tr>
                          <tr>
                            <td>Coating</td>
                            <td>:</td>
                            <td><?= $detail["coating"] ?></td>
                          </tr>
                          <tr>
                            <td>Warna</td>
                            <td>:</td>
                            <td><?= $detail["warna"] ?></td>
                          </tr>
                          <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp<?= number_format(floatval($detail["harga"]), 2) ?></td>
                          </tr>
                          <tr>
                            <td>Sisa Kredit</td>
                            <td>:</td>
                            <td>Rp<?= number_format(floatval($detail["sisa_kredit"]), 2) ?></td>
                          </tr>
                          <tr>
                            <td>Tanggal Pemesanan</td>
                            <td>:</td>
                            <td><?= date("d F Y", strtotime($detail["tgl_pemesanan"])) ?></td>
                          </tr>
                          <tr>
                            <td>Tanggal Pengiriman</td>
                            <td>:</td>
                            <td><?= date("d F Y", strtotime($detail["tgl_pengiriman"])) ?></td>
                          </tr>
                          <tr>
                            <td>Tanggal Jatuh Tempo</td>
                            <td>:</td>
                            <td><?= date("d F Y", strtotime($detail["tgl_jatuh_tempo"])) ?></td>
                          </tr>
                          <tr>
                            <td>Sales</td>
                            <td>:</td>
                            <td><?= $detail["sales"] ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-4">
                      <table class="table table-bordered mb-5">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Sph</th>
                            <th>Cyl</th>
                            <th>Axis</th>
                            <th>Add</th>
                            <th>Mpd</th>
                            <th>Prism</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>R</td>
                            <td><?= $detail["R_sph"] ?></td>
                            <td><?= $detail["R_cyt"] ?></td>
                            <td><?= $detail["R_axis"] ?></td>
                            <td><?= $detail["R_add"] ?></td>
                            <td><?= $detail["R_mpd"] ?></td>
                            <td><?= $detail["R_prism"] ?></td>
                          </tr>
                          <tr>
                            <td>L</td>
                            <td><?= $detail["L_sph"] ?></td>
                            <td><?= $detail["L_cyt"] ?></td>
                            <td><?= $detail["L_axis"] ?></td>
                            <td><?= $detail["L_add"] ?></td>
                            <td><?= $detail["L_mpd"] ?></td>
                            <td><?= $detail["L_prism"] ?></td>
                          </tr>
                        </tbody>
                      </table>
                      <h5 class="font-weight-bold">Data Pemesan :</h5>
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $detail["nama"] ?></td>
                          </tr>
                          <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td><?= $detail["no_telepon"] ?></td>
                          </tr>
                          <?php
                          // Calculate Age
                          $birth = date("Y", strtotime($detail["tgl_lahir"]));
                          $age = intval(date("Y")) - intval($birth);
                          ?>
                          <tr>
                            <td>Usia</td>
                            <td>:</td>
                            <td><?= $age ?> Tahun</td>
                          </tr>
                          <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= date("d F Y", strtotime($detail["tgl_lahir"])) ?></td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                              <?= $detail["alamat"] ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <div class="col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h5 class="font-weight-bold">Log Pembayaran :</h5>
                      <table class="table table-bordered table-hover mb-3">
                        <thead>
                          <tr>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah Bayar</th>
                            <th>Tenor Ke-</th>
                            <th>Sisa Kredit</th>
                            <th>Collector</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $tenor = 1;
                          foreach ($logs as $log) {
                          ?>
                            <tr>
                              <td><?= date("d F Y", strtotime($log["tgl_bayar"])) ?></td>
                              <td>Rp<?= number_format(floatval($log["jmlh_bayar"]), 2) ?></td>
                              <td><?= $log["tenor_ke"] ?></td>
                              <td>Rp<?= number_format(floatval($log["sisa_kredit"])) ?></td>
                              <td><?= $log["collector"] ?></td>
                            </tr>
                          <?php
                            $tenor++;
                          }
                          ?>
                        </tbody>
                      </table>
                      <?php
                      $level = session("level");
                      if ($level !== "sales" && $detail["status_jalan"] === "aktif" && $detail["status_kredit"] === "ya") {
                      ?>
                        <button style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_create_log_pembayaran" data-backdrop="static" data-keyboard="false">
                          Input Pembayaran
                        </button>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
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

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline"></div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 Optik Trijaya.</strong>
      All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- Form modal create log pembayaran -->
  <div class="modal fade" id="form_create_log_pembayaran">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Pembayaran</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_bayar_kredit" action="<?= base_url("pemesanan/bayar") ?>" method="post">
          <input type="hidden" name="id_pemesanan" value="<?= $detail["id_pemesanan"] ?>" />
          <input type="hidden" name="tenor" value="<?= $tenor++ ?>" />
          <input type="hidden" id="sisa_kredit" name="kredit" value="<?= $detail["sisa_kredit"] ?>" />
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Kredit</label>
              <div class="col-sm-8 input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" class="form-control" value="<?= $detail["sisa_kredit"] ?>" disabled />
              </div>
            </div>
            <div class="form-group row position-relative">
              <label for="inputNominal" class="col-sm-4 col-form-label">Besar Bayar</label>
              <div class="col-sm-8 input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" class="form-control" id="inputNominal" name="nominal" placeholder="Isi Nominal.." required />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputCollector" class="col-sm-4 col-form-label">Collector</label>
              <div class="col-sm-8">
                <?php
                $level = session("level");
                if ($level === "collector") {
                  $username = session("username");
                ?>
                  <input type="hidden" name="collector" value="<?= $username ?>">
                  <input type="text" class="form-control" value="<?= $username ?>" disabled>
                <?php
                } else {
                ?>
                  <select name="collector" class="form-control" required>
                    <?php
                    foreach ($collector as $c) {
                    ?>
                      <option value="<?= $c["username"] ?>"><?= $c["username"] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
          <p id="danger_bayar" class="text-danger px-3" style="display: none;"><i class='fas fa-exclamation-triangle'></i> Uang Kredit yang Dibayar Melebihi Sisa Kredit.</p>
          <div class="form-group pl-3">
            <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
              Konfirmasi
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

  <!-- Form modal delete pemesanan -->
  <div class="modal fade" id="form_delete_pemesanan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data Pemesanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tekan 'Proses' untuk menghapus data pemesanan.</p>
          <a href="<?= base_url("pemesanan/delete/" . $detail["id_pemesanan"]) ?>" class="btn btn-danger">Proses</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Form modal cancel pemesanan -->
  <div class="modal fade" id="form_cancel_pemesanan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cancel Pemesanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tekan 'Proses' untuk cancel pemesanan.</p>
          <a href="<?= base_url("pemesanan/cancel/" . $detail["id_pemesanan"]) ?>" class="btn btn-danger">Proses</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Form modal aktifkan pemesanan -->
  <div class="modal fade" id="form_activate_pemesanan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Aktifkan Pemesanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tekan 'Aktifkan' untuk aktifkan kembali pemesanan.</p>
          <a href="<?= base_url("pemesanan/activate/" . $detail["id_pemesanan"]) ?>" class="btn btn-success">Aktifkan</a>
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
      // Validasi form bayar kredit
      $("#form_bayar_kredit").submit(function(evt) {
        var nominal = parseInt($("#inputNominal").val());
        var kredit = parseInt($("#sisa_kredit").val());
        $("#danger_bayar").css({
          "display": "none"
        });
        $("#inputNominal").css({
          "border": "1px solid #ced4da"
        });

        var sisa = kredit - nominal;
        if (sisa < 0) {
          $("#danger_bayar").css({
            "display": "block"
          });
          $("#inputNominal").css({
            "border": "1px solid red"
          });

          evt.preventDefault();
          return;
        }
      });
    });
  </script>
</body>

</html>
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
              <h1 class="m-0">Detail Pemesanan</h1>
            </div>
            <!-- /.col -->
            <div class="col-lg-6">
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

      <?php
      if (isset($pageStatus) && $pageStatus === "update credit success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Pengubahan Data Kredit Berhasil.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($pageStatus) && $pageStatus === "delete credit success") {
      ?>
        <div class="my-3 alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
          <p class="m-0">Penghapusan Kredit Berhasil.</p>
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
                    <div class="col-xl-4 mb-3">
                      <div class="table-responsive">
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
                              <td><?= str_replace(";", "/", $detail["sales"]) ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="table-responsive">
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
                      </div>
                      <h5 class="font-weight-bold">Data Pemesan :</h5>
                      <div class="table-responsive">
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
              </div>
              <!-- /.card -->
            </div>
            <div class="col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-9">
                      <h5 class="font-weight-bold">Log Pembayaran Kredit :</h5>
                      <div class="table-responsive mb-3">
                        <table class="table table-bordered table-hover mb-3">
                          <thead>
                            <tr>
                              <th>Tanggal Bayar</th>
                              <th>Tenor Ke-</th>
                              <th>Collector</th>
                              <th>Jumlah Bayar</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $tenor = 1;
                            $total_kredit = 0;
                            foreach ($logs as $log) {
                              $total_kredit += intval($log["jmlh_bayar"]);
                            ?>
                              <tr>
                                <td><?= date("d F Y", strtotime($log["tgl_bayar"])) ?></td>
                                <td><?= $log["tenor_ke"] ?></td>
                                <td><?= str_replace(";", "/", $log["collector"]) ?></td>
                                <td>Rp<?= number_format(floatval($log["jmlh_bayar"]), 2) ?></td>
                                <td>
                                  <?php
                                  if (intval($log["tenor_ke"]) != 1) {
                                  ?>
                                    <a href="#" data-kcmt-id="<?= $log["id_log"] ?>" class="text-primary mr-2 ubah-data-kredit" data-toggle="modal" data-target="#modal_edit_kredit" data-backdrop="static" data-keyboard="false">Ubah</a>
                                    <a href="#" data-kcmt-id="<?= $log["id_log"] ?>" class="text-danger hapus-data-kredit" data-toggle="modal" data-target="#modal_delete_kredit" data-backdrop="static" data-keyboard="false">Hapus</a>
                                  <?php
                                  }
                                  ?>
                                </td>
                              </tr>
                            <?php
                              $tenor++;
                            }
                            ?>
                            <tr>
                              <td colspan="3" class="text-center font-weight-bold">Total Kredit Terbayar</td>
                              <td class="bg-success font-weight-bold">Rp<?= number_format($total_kredit, 2) ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <?php
                      $level = session("level");
                      if ($level !== "sales" && $detail["status_jalan"] === "aktif" && $detail["status_kredit"] === "ya") {
                      ?>
                        <button id="input_pembayaran" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_create_log_pembayaran" data-backdrop="static" data-keyboard="false">
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
          <button id="close_new_kredit" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_bayar_kredit" action="<?= base_url("pemesanan/bayar") ?>" method="post">
          <input type="hidden" name="id_pemesanan" value="<?= $detail["id_pemesanan"] ?>" />
          <input type="hidden" name="tenor" value="<?= $tenor++ ?>" />
          <input type="hidden" id="sisa_kredit" name="kredit" value="<?= $detail["sisa_kredit"] ?>" />
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Sisa Kredit</label>
              <div class="col-sm-8 input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" class="form-control" value="<?= $detail["sisa_kredit"] ?>" disabled />
              </div>
            </div>
            <div class="form-group row position-relative">
              <label for="inputNominal" class="col-sm-4 col-form-label">Besar Bayar</label>
              <div class="col-sm-8 input-group">
                <span class="input-group-text">Rp</span>
                <input id="insert_bayar_kredit" type="text" class="form-control" name="nominal" placeholder="Isi Nominal.." required />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputCollector" class="col-sm-4 col-form-label">Collector</label>
              <div id="insert_credit" class="col-sm-8">
                <select id="inputNewCollector" class="mb-3 form-control input-collector">
                  <option value="none">Pilih Collector..</option>
                  <?php
                  foreach ($collector as $c) {
                  ?>
                    <option value="<?= $c["username"] ?>"><?= $c["username"] ?></option>
                  <?php
                  }
                  ?>
                </select>
                <div id="list_collector" class="mb-2"></div>
              </div>
            </div>
          </div>
          <p id="danger_form_bayar_kredit" class="text-danger px-3" style="display: none;"></p>
          <div class="form-group pl-3">
            <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
              Konfirmasi
            </button>
            <button id="btn-reset-form-credit" type="reset" class="btn btn-secondary">
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

  <!-- Form modal edit kredit -->
  <div class="modal fade" id="modal_edit_kredit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Kredit</h4>
          <button id="close_edit_kredit" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form_edit_kredit" action="<?= base_url("kredit/log/update") ?>" method="post">
            <input type="hidden" name="harga" value="<?= $detail["harga"] ?>" />
            <input type="hidden" name="id_pemesanan" value="<?= $detail["id_pemesanan"] ?>" />
            <input type="hidden" id="id_log_edit" name="id_log" />
            <input type="hidden" id="old_kredit" name="old_kredit" />
            <input type="hidden" name="sisa_kredit" value="<?= $detail["sisa_kredit"] ?>" />
            <div class="modal-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Sisa Kredit</label>
                <div class="col-sm-8 input-group">
                  <span class="input-group-text">Rp</span>
                  <input value="<?= $detail["sisa_kredit"] ?>" type="text" class="form-control" disabled />
                </div>
              </div>
              <div class="form-group row position-relative">
                <label for="edit_nominal_kredit" class="col-sm-4 col-form-label">Besar Bayar</label>
                <div class="col-sm-8 input-group">
                  <span class="input-group-text">Rp</span>
                  <input type="text" class="form-control" id="edit_nominal_kredit" name="nominal" placeholder="Isi Nominal.." required />
                </div>
              </div>
              <div class="form-group row position-relative">
                <label for="edit_tenor_kredit" class="col-sm-4 col-form-label">Tenor Kredit</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="edit_tenor_kredit" name="tenor" placeholder="Isi Tenor.." required />
                </div>
              </div>
              <div class="form-group row position-relative">
                <label for="edit_tanggal_kredit" class="col-sm-4 col-form-label">Tanggal Kredit</label>
                <div class="col-sm-8 input-group">
                  <input type="date" class="form-control" id="edit_tanggal_kredit" name="tanggal_kredit" required />
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEditCollector" class="col-sm-4 col-form-label">Collector</label>
                <div class="col-sm-8">
                  <select id="inputEditCollector" name="collector" class="mb-3 form-control input-collector" required>
                    <option value="none">Pilih Collector..</option>
                    <?php
                    foreach ($collector as $c) {
                    ?>
                      <option value="<?= $c["username"] ?>"><?= $c["username"] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <div id="list_collector_edit" class="mb-2"></div>
                </div>
              </div>
            </div>
            <p id="danger_edit_kredit" class="text-danger px-3" style="display: none;"></p>
            <div class="form-group pl-3">
              <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
                Ubah Data
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Form modal hapus log kredit -->
  <div class="modal fade" id="modal_delete_kredit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data Kredit</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tekan 'Proses' untuk menghapus data kredit.</p>
          <a id="delete_kredit_url" href="#" data-log-url-delete="<?= base_url("kredit/log/delete/") ?>" class="btn btn-danger">Proses</a>
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
      var idx_collector = 1;

      // Clean up when open back
      // Modal form create new bayar kredit opened
      $("#input_pembayaran").click(function(evt) {
        $("#insert_bayar_kredit").val("");
        $("#list_collector").empty();
        $(".collector-list-hidden").remove();
      });

      // When reset form create new bayar kredit
      $("#btn-reset-form-credit").click(function(evt) {
        $("#list_collector").empty();
        $(".collector-list-hidden").remove();
      });

      // When form create new log pembayaran 
      $("#close_new_kredit").click(function(evt) {
        $("#list_collector").empty();
        $(".collector-list-hidden").remove();
      });

      // When form edit kredit closed
      $("#close_edit_kredit").click(function(evt) {
        $("#list_collector_edit").empty();
        $(".collector-list-hidden").remove();
      });

      // Validasi form bayar kredit
      $("#form_bayar_kredit").submit(function(evt) {
        var nominal = parseInt($("#insert_bayar_kredit").val());
        var kredit = parseInt($("#sisa_kredit").val());

        $("#danger_form_bayar_kredit").css({
          "display": "none"
        });
        $("#insert_bayar_kredit").css({
          "border": "1px solid #ced4da"
        });
        $("#inputNewCollector").css({
          "border": "1px solid #ced4da"
        });

        // Check if kredit is bigger than nominal sisa kredit
        var sisa = kredit - nominal;
        if (sisa < 0) {
          $("#danger_form_bayar_kredit").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Kredit yang Dibayar Melebihi Total Sisa Kredit.");
          $("#insert_bayar_kredit").css({
            "border": "1px solid red"
          });

          evt.preventDefault();
          return;
        }

        // Check if no list collector name in input
        var jmlh_collector = $(".data-collector").length;
        if (jmlh_collector === 0) {
          $("#danger_form_bayar_kredit").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Nama Collector Belum Diinput.");
          $("#inputNewCollector").css({
            "border": "1px solid red"
          });

          evt.preventDefault();
          return;
        }

      });

      // Generate collector list
      $(".input-collector").change(function(evt) {
        var tmp_collector = $(evt.target).val();

        if (tmp_collector === "none") return;

        // Create hidden type element
        var hidden_collector = jQuery("<input />", {
          id: "hid-collector-" + idx_collector,
          name: "collector[]",
          class: "collector-list-hidden",
          type: "hidden",
          value: tmp_collector
        });

        // Create button type element
        var span_collector = jQuery("<span />", {
          id: "collector-" + idx_collector,
          class: "d-inline-block bg-secondary py-1 px-3 mr-2 mb-2 rounded-pill data-collector",
          style: "cursor:pointer",
          html: "<i class='fas fa-times-circle'></i> " + tmp_collector
        }).click(function(evt) {
          var idx_hid_collector = evt.target.id.split("-")[1];
          $("#hid-collector-" + idx_hid_collector).remove();
          $(this).remove();
        });

        if ($(this).parent().attr("id") === "insert_credit") {
          $("#form_bayar_kredit").append(hidden_collector);
          $("#list_collector").append(span_collector);
        } else {
          $("#form_edit_kredit").append(hidden_collector);
          $("#list_collector_edit").append(span_collector);
        }

        idx_collector += 1;
      });

      // Query data kredit by id_log when open modal edit kredit form
      $(".ubah-data-kredit").click(function(evt) {
        var id_log = $(evt.target).attr("data-kcmt-id");

        // Clean up first
        $("#list_collector_edit").empty();
        $("#danger_edit_kredit").empty();
        $(".collector-list-hidden").remove();

        $.ajax({
          url: "/kredit/log/id/" + id_log,
          method: "GET",
          success: function(response) {
            result = JSON.parse(response);
            console.log(result);

            $("#old_kredit").val(result.jmlh_bayar);
            $("#id_log_edit").val(result.id_log);
            $("#edit_nominal_kredit").val(result.jmlh_bayar);
            $("#edit_tenor_kredit").val(result.tenor_ke);
            $("#edit_tanggal_kredit").val(result.tgl_bayar);

            // Create hidden list data of collector
            var collectors = result.collector.split(";");
            var hidd_arrs = [];
            var bttns_collector = [];
            var idx = 0;
            collectors.forEach(name => {
              var hidden_collector = jQuery("<input />", {
                id: "hid-collector-" + idx,
                name: "collector[]",
                class: "collector-list-hidden",
                type: "hidden",
                value: name
              });
              hidd_arrs[idx] = hidden_collector;
              idx++;
            });

            // Create button of list data of collector
            idx = 0; // reset idx
            collectors.forEach(name => {
              var span_collector = jQuery("<span />", {
                id: "collector-" + idx,
                class: "d-inline-block bg-secondary py-1 px-3 mr-2 mb-2 rounded-pill data-collector",
                style: "cursor:pointer",
                html: "<i class='fas fa-times-circle'></i> " + name
              }).click(function(evt) {
                var idx_hid_collector = evt.target.id.split("-")[1];
                $("#hid-collector-" + idx_hid_collector).remove();
                $(this).remove();
              });
              bttns_collector[idx] = span_collector;
              idx++;
            });

            $("#form_edit_kredit").append(hidd_arrs);
            $("#list_collector_edit").append(bttns_collector);
          }
        });
      });

      // Validate edit form of edit kredit log
      $("#form_edit_kredit").submit(function(evt) {
        var nominal = parseInt($("#edit_nominal_kredit").val());
        var kredit = parseInt($("#sisa_kredit").val());

        $("#danger_edit_kredit").css({
          "display": "none"
        });
        $("#edit_nominal_kredit").css({
          "border": "1px solid #ced4da"
        });
        $("#inputEditCollector").css({
          "border": "1px solid #ced4da"
        });

        // Check if new jmlh bayar kredit is bigger than nominal sisa kredit
        var sisa = kredit - nominal;
        if (sisa < 0) {
          $("#danger_edit_kredit").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Kredit yang Dibayar Melebihi Total Sisa Kredit.");
          $("#edit_nominal_kredit").css({
            "border": "1px solid red"
          });

          evt.preventDefault();
          return;
        }

        // Check if no list collector name in input
        var jmlh_collector = $(".data-collector").length;
        if (jmlh_collector === 0) {
          $("#danger_edit_kredit").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Nama Collector Belum Diinput.");
          $("#inputEditCollector").css({
            "border": "1px solid red"
          });

          evt.preventDefault();
          return;
        }
      });

      $(".hapus-data-kredit").click(function(evt) {
        var id_log = $(this).attr("data-kcmt-id");
        var url_delete = $("#delete_kredit_url").attr("data-log-url-delete");
        $("#delete_kredit_url").attr("href", url_delete + "/" + id_log);
      });
    });
  </script>
</body>

</html>
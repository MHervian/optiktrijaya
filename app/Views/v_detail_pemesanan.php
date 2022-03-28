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

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="font-weight-bold">
                    Data Harga dan Spesifikasi :
                    <a href="#" class="btn btn-primary">
                      <i class="fas fa-edit"></i> Ubah
                    </a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#form_delete_pemesanan">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </h5>
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table">
                        <tbody>
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
                            <td>Jenis Lensa</td>
                            <td>:</td>
                            <td><?= $detail["lensa"] ?></td>
                          </tr>
                          <tr>
                            <td>Bahan Flattop</td>
                            <td>:</td>
                            <td><?= $detail["flattop"] ?></td>
                          </tr>
                          <tr>
                            <td>Coating</td>
                            <td>:</td>
                            <td><?= $detail["coating"] ?></td>
                          </tr>
                          <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp<?= number_format(floatval($detail["harga"]), 2) ?></td>
                          </tr>
                          <tr>
                            <td>DP</td>
                            <td>:</td>
                            <td>Rp<?= number_format(floatval($detail["dp"]), 2) ?></td>
                          </tr>
                          <tr>
                            <td>Sisa Kredit</td>
                            <td>:</td>
                            <td>Rp<?= number_format(floatval($detail["sisa_kredit"]), 2) ?></td>
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
                    <div class="offset-md-1 col-md-4">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th></th>
                            <th>L</th>
                            <th>R</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Sph</td>
                            <td><?= $detail["L_sph"] ?></td>
                            <td><?= $detail["R_sph"] ?></td>
                          </tr>
                          <tr>
                            <td>Cyt</td>
                            <td><?= $detail["L_cyt"] ?></td>
                            <td><?= $detail["R_cyt"] ?></td>
                          </tr>
                          <tr>
                            <td>Axis</td>
                            <td><?= $detail["L_axis"] ?></td>
                            <td><?= $detail["R_axis"] ?></td>
                          </tr>
                          <tr>
                            <td>Add</td>
                            <td><?= $detail["L_add"] ?></td>
                            <td><?= $detail["R_add"] ?></td>
                          </tr>
                          <tr>
                            <td>Mpd</td>
                            <td><?= $detail["L_mpd"] ?></td>
                            <td><?= $detail["R_mpd"] ?></td>
                          </tr>
                          <tr>
                            <td>Prism</td>
                            <td><?= $detail["L_prism"] ?></td>
                            <td><?= $detail["R_prism"] ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <h5 class="font-weight-bold">Data Pemesan :</h5>
                  <div class="row">
                    <div class="col-md-4">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td><?= $detail["no_telepon"] ?></td>
                          </tr>
                          <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $detail["nama"] ?></td>
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
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-5">
                      <table class="table">
                        <tbody>
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
                  <h5 class="font-weight-bold">Log Pembayaran :</h5>
                  <table class="table table-bordered table-hover mb-3">
                    <thead>
                      <tr>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Sisa Kredit</th>
                        <th>Collector</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>21 Januari 2020</td>
                        <td>Rp100.000</td>
                        <td>Rp650.000</td>
                        <td>Agus</td>
                      </tr>
                      <tr>
                        <td>28 Januari 2020</td>
                        <td>Rp200.000</td>
                        <td>Rp450.000</td>
                        <td>Agus</td>
                      </tr>
                      <tr>
                        <td>30 Januari 2020</td>
                        <td>Rp50.000</td>
                        <td>Rp400.000</td>
                        <td>Agus</td>
                      </tr>
                    </tbody>
                  </table>
                  <button style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_create_log_pembayaran">
                    Tambah Pembayaran
                  </button>
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
        <form>
          <div class="modal-body">
            <div class="form-group row">
              <label for="inputNominal" class="col-sm-4 col-form-label">Nominal Pembayaran</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" id="inputNominal" placeholder="Isi Nominal.." />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputCollector" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <select id="inputCollector" class="form-control">
                  <option>Agus</option>
                  <option>Hermawan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group pl-3">
            <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
              Confirm
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
          <a href="#" class="btn btn-danger">Proses</a>
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
</body>

</html>
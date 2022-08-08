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
              <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Home</li>
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
            <div class="col-xl-6 col-lg-12">
              <div class="card card-primary card-outline mb-4">
                <div class="row p-3">
                  <div class="col-md-5">
                    <!-- For chart -->
                    <canvas id="donutChart" style="min-height: 250px; height: 100%; max-height: 100%; max-width: 100%;"></canvas>
                  </div>
                  <div class="col-md-7">
                    <div class="info-box bg-gradient-success">
                      <span class="info-box-icon"><i class="fas fa-cash-register"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Total Kredit Terbayar</span>
                        <span id="totalTerbayar" class="info-box-number text-lg" data-totalterbayar="<?= $total_terbayar ?>">Rp<?= number_format($total_terbayar, 0, '.', ',') ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <div class="info-box bg-gradient-info">
                      <span class="info-box-icon"><i class="far fa-credit-card"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Total Kredit Jalan</span>
                        <span id="totalKredit" class="info-box-number text-lg" data-totalkredit="<?= $total_kredit ?>">Rp<?= number_format($total_kredit, 0, '.', ',') ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <div class="info-box bg-gradient-warning">
                      <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Jumlah Kredit Aktif</span>
                        <span id="kreditAktif" class="info-box-number text-lg" data-kreditaktif="<?= $kredit_aktif ?>"><?= $kredit_aktif ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="d-inline-block">Data Pemesanan <b>Total : <?= $total_pemesanan ?></b></h5>
                  <a href="<?= base_url("pemesanan") ?>" class="btn btn-primary ml-3"><i class="fas fa-list"></i> Lihat Semua</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No SP</th>
                          <th>Pemesan</th>
                          <th>Kredit</th>
                          <th>Tenor</th>
                          <th>Jatuh Tempo</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($pemesanan as $p) {
                          $strtime = strtotime($p["tgl_jatuh_tempo"]);
                        ?>
                          <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $p["no_sp"] ?></td>
                            <td><?= $p["nama"] ?></td>
                            <td><?= $p["kredit"] ?></td>
                            <td><?= $p["tenor"] ?></td>
                            <td><?= date("d F Y", $strtime) ?></td>
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
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="d-inline-block">Data Konsumen <b>Total : <?= $total_konsumen ?></b></h5>
                  <a href="<?= base_url("konsumen") ?>" class="btn btn-primary ml-3"><i class="fas fa-list"></i> Lihat Semua</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Konsumen</th>
                          <th>No Kontak</th>
                          <th>Tgl Lahir</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($konsumen as $k) {
                          $str_time = strtotime($k["tgl_lahir"]);
                        ?>
                          <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $k["nama"] ?></td>
                            <td><?= $k["no_telepon"] ?></td>
                            <td><?= date("d F Y", $str_time) ?></td>
                            <td>
                              <a href="<?= base_url("konsumen/detail/" . $k["id_konsumen"]) ?>">Detail</a>
                            </td>
                          </tr>
                        <?php
                          $nomor++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
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

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url("plugins/jquery/jquery.min.js") ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url("plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <!-- Chart JS -->
  <script src="<?= base_url("plugins/chart.js/Chart.min.js") ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url("dist/js/adminlte.min.js") ?>"></script>
  <script>
    $(function() {
      // Get data of kredit
      var total_terbayar = $("#totalTerbayar").attr("data-totalterbayar");
      var total_kredit = $("#totalKredit").attr("data-totalkredit");

      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
        labels: [
          'Kredit Terbayar',
          'Kredit Jalan'
        ],
        datasets: [{
          data: [total_terbayar, total_kredit],
          backgroundColor: ['#28a745', '#17a2b8'],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })
    })
  </script>
</body>

</html>
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
            <div class="col-md-7 col-sm-7">
              <div class="card card-primary card-outline">
                <div class="row p-3">
                  <div class="col-md-7">
                    <!-- For chart -->
                    <canvas id="donutChart" style="min-height: 250px; height: 100%; max-height: 100%; max-width: 100%;"></canvas>
                  </div>
                  <div class="col-md-5">
                    <div class="info-box bg-gradient-success">
                      <span class="info-box-icon"><i class="fas fa-cash-register"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Total Kredit Terbayar</span>
                        <span class="info-box-number text-lg">Rp41,410,000.00</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <div class="info-box bg-gradient-info">
                      <span class="info-box-icon"><i class="far fa-credit-card"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Total Kredit Jalan</span>
                        <span class="info-box-number text-lg">Rp23,900,000.00</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <div class="info-box bg-gradient-warning">
                      <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Jumlah Kredit Aktif</span>
                        <span class="info-box-number text-lg">14</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-gradient-info">
                      <span class="info-box-icon"><i class="fas fa-users"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Jumlah Pelanggan</span>
                        <span class="info-box-number text-lg">52</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                  </div>
                </div>
                <div class="p-3">
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
                      <tr>
                        <td>1</td>
                        <td>Lorem</td>
                        <td>02039238</td>
                        <td>7 Januari 1966</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Lorem</td>
                        <td>02039238</td>
                        <td>7 Januari 1966</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Lorem</td>
                        <td>02039238</td>
                        <td>7 Januari 1966</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Lorem</td>
                        <td>02039238</td>
                        <td>7 Januari 1966</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Lorem</td>
                        <td>02039238</td>
                        <td>7 Januari 1966</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-5 col-sm-5">
              <div class="card card-primary card-outline">
                <div class="p-3">
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>7 Kredit</h3>

                      <p>Mendekati Batas Tunggakan Kredit</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-alarm-exclamation"></i>
                    </div>
                  </div>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>No SP</th>
                        <th>Nama Pemesan</th>
                        <th>Tgl Batas</th>
                        <th>Durasi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Lorem</td>
                        <td>Lorem</td>
                        <td>7 Januari 2022</td>
                        <td class="text-red">7 Hari</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Lorem</td>
                        <td>Lorem</td>
                        <td>7 Januari 2022</td>
                        <td class="text-red">7 Hari</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Lorem</td>
                        <td>Lorem</td>
                        <td>7 Januari 2022</td>
                        <td class="text-red">6 Hari</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Lorem</td>
                        <td>Lorem</td>
                        <td>7 Januari 2022</td>
                        <td class="text-red">4 Hari</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Lorem</td>
                        <td>Lorem</td>
                        <td>7 Januari 2022</td>
                        <td class="text-red">2 Hari</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>Lorem</td>
                        <td>Lorem</td>
                        <td>7 Januari 2022</td>
                        <td class="text-red">7 Hari</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td>Lorem</td>
                        <td>Lorem</td>
                        <td>7 Januari 2022</td>
                        <td class="text-red">3 Hari</td>
                        <td>
                          <a href="#">Detail</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
          data: [41, 24],
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
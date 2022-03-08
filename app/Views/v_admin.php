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
              <h1 class="m-0">Data Admin</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?= base_url("dashboard") ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Admin</li>
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
            <div class="col-lg-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title font-weight-bold">Akun Saya</h5>
                </div>
                <div class="card-body">
                  <form action="<?= base_url("") ?>" method="post">
                    <div class="form-group row">
                      <div class="col-4">
                        <label>Username : </label>
                      </div>
                      <div class="col-8">
                        <input type="text" class="form-control" placeholder="Username.." value="" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-4">
                        <label for="inputEmail">Email : </label>
                      </div>
                      <div class="col-8">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email..." value="" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-4">
                        <label for="inputPasswordLama">Password Lama :
                        </label>
                      </div>
                      <div class="col-8">
                        <input type="password" id="inputPasswordLama" class="form-control" placeholder="Password Lama.." />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-4">
                        <label for="inputPasswordBaru">Password Baru :
                        </label>
                      </div>
                      <div class="col-8">
                        <input type="password" id="inputPasswordBaru" class="form-control" placeholder="Password Lama.." />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-4">
                        <label for="inputUlangiPassword">Ulangi Password :
                        </label>
                      </div>
                      <div class="col-8">
                        <input type="password" id="inputUlangiPassword" class="form-control" placeholder="Ulangi Password.." />
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" style="
                            background-color: #02a09e;
                            border-color: #02a09e;
                          " class="btn btn-primary">
                        Update
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card card-danger card-outline">
                <div class="card-header">
                  <h5 class="font-weight-bolder">Hapus Akun Saya</h5>
                </div>
                <div class="card-body">
                  <p>
                    Penghapusan akun secara permanen. Anda tidak dapat
                    menggunakan akun lagi. Apakah ingin memprosesnya?
                  </p>
                  <a href="<?= base_url("admin/") ?>" class="btn btn-danger">Iya, Hapus Akun Saya</a>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <div class="col-lg-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" data-toggle="modal" data-target="#form_create_account" class="btn btn-primary">
                    Tambah Akun
                  </button>
                </div>
                <div class="card-body">
                  <h5 class="font-weight-bold">Data Akun</h5>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Admin</td>
                        <td>Admin</td>
                        <td>
                          <a href="#" class="text-secondary">Detail</a>
                          <a href="#">Ubah</a>
                          <a href="#" class="text-danger">Hapus</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
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
  <div class="modal fade" id="form_create_account">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create New Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="form-group row">
              <label for="inputUsername" class="col-sm-4 col-form-label">Username :
              </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputUsername" placeholder="Isi Nama User.." />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmailUsername" class="col-sm-4 col-form-label">Email :
              </label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmailUsername" placeholder="Isi Nama User.." />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPasswordUsername" class="col-sm-4 col-form-label">Password :
              </label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPasswordUsername" placeholder="Isi Nama User.." />
              </div>
            </div>
          </div>
          <div class="form-group pl-3">
            <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary">
              Buat Akun
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

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>
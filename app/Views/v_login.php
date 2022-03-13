<?= $this->include("layout/v_header") ?>

<body class="hold-transition login-page">
  <?php
  if (isset($loginStatus) && $loginStatus === "logout success") {
  ?>
    <div class="alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
      <p class="m-0">Logout sistem berhasil</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
  }
  ?>

  <?php
  if (isset($loginStatus) && $loginStatus === "delete and log out") {
  ?>
    <div class="alert alert-success text-center alert-dismissible fade show mb-4" role="alert">
      <p class="m-0">Akun Anda Telah Berhasil Dihapus Oleh Sistem.</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
  }
  ?>

  <?php
  if (isset($loginStatus) && $loginStatus === "login failed") {
  ?>
    <div class="alert alert-danger text-center alert-dismissible fade show mb-4" role="alert">
      <p class="m-0">Mohon cek ulang email dan password.</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
  }
  ?>

  <?php
  if (isset($loginStatus) && $loginStatus === "user not login") {
  ?>
    <div class="alert alert-danger text-center alert-dismissible fade show mb-4" role="alert">
      <p class="m-0">Harap login dahulu sebelum memakai sistem.</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
  }
  ?>

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="login-logo">
          <a href="<?= base_url('/') ?>"><b>Optik</b> Trijaya</a>
        </div>
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post" action="<?= base_url('login') ?>">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <!-- <div class="icheck-primary">
                <input type="checkbox" id="remember" />
                <label for="remember">
                  Remember Me
                </label>
              </div> -->
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" style="background-color: #02a09e; border-color: #02a09e;" class="btn btn-primary btn-block">
                Sign In
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url("plugins/jquery/jquery.min.js") ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url("plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url("dist/js/adminlte.min.js") ?>"></script>
</body>

</html>
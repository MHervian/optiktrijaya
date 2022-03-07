<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('dashboard') ?>" class="brand-link">
    <img src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
    <span class="brand-text font-weight-light">Optik Trijaya</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url("dist/img/user.png") ?>" class="img-circle elevation-2" alt="User Image" />
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $username ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="<?= base_url("dashboard") ?>" class="nav-link">
            <i class="nav-icon fas fa-chart-area"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url("konsumen") ?>" class="nav-link">
            <i class="nav-icon fas fa-search-dollar"></i>
            <p>Data Konsumen</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-handshake"></i>
            <p>Pemesanan <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pemesanan.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pesanan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="buat_pemesanan.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pesanan Baru</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Master Data <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="sales.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Sales</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="collector.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Collector</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="lensa.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Lensa</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="admin.html" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Admin</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url("logout") ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
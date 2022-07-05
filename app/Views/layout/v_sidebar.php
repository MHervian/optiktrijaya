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
    <?php
    $level = session("level");
    ?>
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
              <a href="<?= base_url("pemesanan") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pesanan</p>
              </a>
            </li>
            <?php
            if ($level !== "collector") {
            ?>
              <li class="nav-item">
                <a href="<?= base_url("buat-pemesanan") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat Pesanan Baru</p>
                </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </li>
        <?php
        if ($level === "collector" || $level === "supadmin" || $level === "admin") {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>Kredit Bulanan<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("kredit/progress") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kredit Belum Bayar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("kredit/terbayar") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kredit Sudah Bayar</p>
                </a>
              </li>
            </ul>
          </li>
        <?php
        }
        ?>
        <?php
        if ($level === "admin" || $level === "supadmin") {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Master Data <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("masters/sales") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("masters/collector") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Collector</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("masters/lensa") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Lensa</p>
                </a>
              </li>
            </ul>
          </li>
        <?php
        }

        if ($level === "admin" || $level === "supadmin") {
        ?>
          <li class="nav-item">
            <a href="<?= base_url("admin") ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Admin</p>
            </a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item">
            <a href="<?= base_url("admin") ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Pengaturan Profil</p>
            </a>
          </li>
        <?php
        }
        ?>
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
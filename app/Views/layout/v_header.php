<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $pageTitle ?> | Optik Trijaya</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url("plugins/fontawesome-free/css/all.min.css") ?>" />
  <meta name="robots" content="noindex,nofollow">
  <?php
  // Some page display table
  switch ($pageTitle) {
    case "Data Konsumen":
    case "Data Admin":
    case "Data Pemesanan":
    case "Data Master : Sales":
    case "Data Master : Collector":
    case "Data Master : Kacamata":
  ?>
      <!-- DataTables -->
      <link rel="stylesheet" href="<?= base_url("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") ?>" />
      <link rel="stylesheet" href="<?= base_url("plugins/datatables-responsive/css/responsive.bootstrap4.min.css") ?>" />
      <link rel="stylesheet" href="<?= base_url("plugins/datatables-buttons/css/buttons.bootstrap4.min.css") ?>" />
  <?php
  }
  ?>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("dist/css/adminlte.css") ?>" />
  <link rel="stylesheet" href="<?= base_url("dist/css/styles.css") ?>" />
</head>
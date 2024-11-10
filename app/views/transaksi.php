<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Transaksi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/adminlte/dist/css/adminlte.min.css">

  <style>
    /* Ensure the sidebar and content take full height */
    html, body {
      height: 100%;
    }

    .wrapper {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    .content-wrapper {
      flex: 1;
    }

    /* Sidebar takes full height */
    .main-sidebar {
      min-height: 100vh;
    }

    /* Make the content inside the sidebar scrollable */
    .sidebar {
      overflow-y: auto;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="public/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TOKO ANISA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php?page=barang" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'barang') ? 'active' : ''; ?>">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=pelanggan" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'pelanggan') ? 'active' : ''; ?>">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Pelanggan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=transaksi" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'transaksi') ? 'active' : ''; ?>">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Transaksi</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Aplikasi Toko</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Transaksi</h3>
        </div>
        <div class="card-body">
          <a href="index.php?page=tambah_transaksi" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Data
          </a>
        </div>
        <div class="table-responsive shadow-sm rounded">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID Transaksi</th>
                <th scope="col">ID Pelanggan</th>
                <th scope="col">ID Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga Total</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $nomor = 1;
                if (isset($transaksiList) && is_array($transaksiList)) {
                    foreach ($transaksiList as $item) {
              ?>
              <tr>
                <th scope="row"><?php echo $nomor++; ?></th>
                <td><?php echo $item["id_transaksi"]; ?></td>
                <td><?php echo $item["id_pelanggan"]; ?></td>
                <td><?php echo $item["id_barang"]; ?></td>
                <td><?php echo $item["jumlah"]; ?></td>
                <td><?php echo number_format($item["harga_total"], 0, ',', '.'); ?></td>
                <td><?php echo date("d-m-Y", strtotime($item["tanggal"])); ?></td>
                <td>
                  <a href="index.php?page=delete_transaksi&id_transaksi=<?= $item['id_transaksi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                    <i class="fas fa-trash"></i> Hapus
                  </a>
                </td>
              </tr>
              <?php
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Tidak ada data transaksi ditemukan.</td></tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
    <strong>&copy;<a href="#">Anisa Bila Septiana 23.240.0033</a>.</strong> All rights reserved.
  </footer>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>
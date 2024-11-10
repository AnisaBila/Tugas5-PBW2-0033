<?php
ob_start();
require_once 'config/database.php';
require_once 'app/controller/barangController.php';
require_once 'app/controller/pelangganController.php';
require_once 'app/controller/transaksiController.php';

// Koneksi ke database
$dbConnection = getDBConnection();

// Route handling
$page = $_GET['page'] ?? 'dashboard'; // Default ke halaman home

switch ($page) {
    case 'barang':
        $controller = new barangController($dbConnection);
        $controller->index(); // Tampilkan semua barang
        break;

    case 'pelanggan':
        $controller = new pelangganController($dbConnection);
        $controller->index(); // Tampilkan semua pelanggan
        break;

    case 'tambah_brg':
        $controller = new barangController($dbConnection);
        $controller->tambah(); // Form tambah barang
        break;

    case 'tambah_plg':
        $controller = new pelangganController($dbConnection);
        $controller->tambah(); // Form tambah pelanggan
        break;

    case 'edit_barang':
        $controller = new barangController($dbConnection);
        $id_barang = $_GET['id_barang'] ?? null;
        if ($id_barang) {
            $controller->edit($id_barang); // Edit barang
        }
        break;

    case 'delete_barang':
        $controller = new barangController($dbConnection);
        $id_barang = $_GET['id_barang'] ?? null;
        if ($id_barang) {
            $controller->delete($id_barang); // Hapus barang
        }
        break;

    case 'edit_plg':
        $controller = new pelangganController($dbConnection);
        $id_pelanggan = $_GET['id_pelanggan'] ?? null;
        if ($id_pelanggan) {
            $controller->edit($id_pelanggan); // Edit pelanggan
        }
        break;

    case 'delete_plg':
        $controller = new pelangganController($dbConnection);
        $id_pelanggan = $_GET['id_pelanggan'] ?? null;
        if ($id_pelanggan) {
            $controller->delete($id_pelanggan); // Hapus pelanggan
        }
        break;

    case 'transaksi':
        $controller = new transaksiController($dbConnection);
        $controller->index(); // Tampilkan semua transaksi
        break;

    case 'tambah_transaksi':
        $controller = new transaksiController($dbConnection);
        $controller->tambah(); // Form tambah transaksi
        break;

    case 'delete_transaksi':
        $controller = new transaksiController($dbConnection);
        $id_transaksi = $_GET['id_transaksi'] ?? null;
        if ($id_transaksi) {
            $controller->delete($id_transaksi); // Hapus transaksi
        }
        break;

    case 'home':
    default:
        require_once 'app/controller/homeController.php';
        $controller = new homeController($dbConnection);
        $controller->index(); // Tampilkan home
        break;
}
?>
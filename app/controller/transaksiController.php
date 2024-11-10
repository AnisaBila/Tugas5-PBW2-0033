<?php
require_once 'app/models/transaksiModels.php';

class transaksiController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new transaksiModels($dbConnection);
    }

    public function index() {
        $transaksiList = $this->userModel->getAllTransaksi();
        require_once 'app/views/transaksi.php';
    }

    public function tambah() {
        $errorMessage = ""; // Inisialisasi variabel untuk menyimpan pesan kesalahan
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_pelanggan = $_POST['id_pelanggan'];
            $id_barang = $_POST['id_barang'];
            $jumlah = $_POST['jumlah'];
    
            try {
                $this->userModel->tambahTransaksi($id_pelanggan, $id_barang, $jumlah);
                header('Location: index.php?page=transaksi&success_message=Transaksi berhasil ditambahkan');
                exit();
            } catch (Exception $e) {
                $errorMessage = $e->getMessage(); // Menyimpan pesan kesalahan
            }
        }
    
        // Load view dengan pesan kesalahan jika ada
        require_once 'app/views/tambah_transaksi.php';
    }
    
    
    
    public function delete($id_transaksi) {
        $this->userModel->deleteTransaksi($id_transaksi);
        header('Location: index.php?page=transaksi');
        exit();
    }
}
?>
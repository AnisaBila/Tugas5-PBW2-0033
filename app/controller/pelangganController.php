<?php
require_once 'app/models/pelangganModels.php';

class pelangganController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new pelangganModels($dbConnection);
    }

    public function show($id_pelanggan) {
        $user = $this->userModel->getplgById($id_pelanggan);
        require_once 'app/views/pelanggan.php';
    }

     public function index() {
        $pelanggan = $this->userModel->getAllplg(); 
        include 'app/views/pelanggan.php'; 
    }
    
    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_pelanggan = $_POST['id_pelanggan'];
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $alamat = $_POST['alamat'];
           
    
            $this->userModel->tambahplg($id_pelanggan, $nama_pelanggan, $alamat, );
            header('Location: index.php?page=pelanggan');
            exit();
        }
    
        require_once 'app/views/tambah_pelanggan.php';
    }

    public function edit($id_pelanggan) {
        
        $Pelanggan = $this->userModel->getplgById($id_pelanggan);
        if (!$Pelanggan) {
            echo "Barang tidak ditemukan.";
            return;
        }
    
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $alamat = $_POST['alamat'];
            $this->userModel->updateplg($id_pelanggan, $nama_pelanggan, $alamat);
            header('Location: index.php?page=pelanggan');
            exit();
        }
    
        
        require_once 'app/views/edit_pelanggan.php';
    }

    public function delete($id_pelanggan) {
        $this->userModel->deleteplg($id_pelanggan);
        header('Location: index.php?page=pelanggan');
        exit();
    }

    
}
?>
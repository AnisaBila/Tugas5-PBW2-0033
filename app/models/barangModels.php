<?php
class barangModels {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllBarang() {
        $stmt = $this->db->prepare("SELECT * FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBarangById($id_barang) {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE id_barang = :id_barang");
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambahBarang($id_barang, $nama_barang, $harga, $stok) {
        $stmt = $this->db->prepare("INSERT INTO barang (id_barang, nama_barang, harga, stok) VALUES (:id_barang, :nama_barang, :harga, :stok)");
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->execute();
    }

    public function updateBarang($id_barang, $nama_barang, $harga, $stok) {
        $stmt = $this->db->prepare("UPDATE barang SET nama_barang = :nama_barang, harga = :harga, stok = :stok WHERE id_barang = :id_barang");
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->execute();
    }

    public function deleteBarang($id_barang) {
        $stmt = $this->db->prepare("DELETE FROM barang WHERE id_barang = :id_barang");
        $stmt->bindParam(':id_barang', $id_barang);
        return $stmt->execute();
    }   
}
?>
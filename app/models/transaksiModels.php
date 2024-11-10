<?php
class transaksiModels {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllTransaksi() {
        $stmt = $this->db->prepare("SELECT * FROM transaksi");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambahTransaksi($id_pelanggan, $id_barang, $jumlah) {
        try {
            $this->db->beginTransaction();
    
            // Ambil harga barang berdasarkan id_barang
            $stmt = $this->db->prepare("SELECT harga, stok FROM barang WHERE id_barang = :id_barang");
            $stmt->bindParam(':id_barang', $id_barang);
            $stmt->execute();
            $barang = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($barang === false) {
                throw new Exception("ID Barang tidak ditemukan.");
            }
    
            // Periksa stok barang
            if ($jumlah > $barang['stok']) {
                throw new Exception("Stok barang tidak mencukupi.");
            }
    
            // Hitung total harga
            $harga_total = $jumlah * $barang['harga'];
    
            // Insert data transaksi
            $stmt = $this->db->prepare("INSERT INTO transaksi (id_pelanggan, id_barang, jumlah, harga_total, tanggal) VALUES (:id_pelanggan, :id_barang, :jumlah, :harga_total, NOW())");
            $stmt->bindParam(':id_pelanggan', $id_pelanggan);
            $stmt->bindParam(':id_barang', $id_barang);
            $stmt->bindParam(':jumlah', $jumlah);
            $stmt->bindParam(':harga_total', $harga_total);
            $stmt->execute();
    
            // Kurangi stok barang
            $this->kurangiStok($id_barang, $jumlah);
    
            // Commit transaksi
            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
    
            // Cek pesan error jika terkait dengan constraint foreign key id_pelanggan
            if ($e->getCode() == '23000' && strpos($e->getMessage(), 'FOREIGN KEY (`id_pelanggan`)') !== false) {
                throw new Exception("ID pelanggan tidak ada.");
            } else {
                throw $e; // Jika bukan error foreign key, tampilkan pesan asli
            }
        }
    }
    
    
    public function kurangiStok($id_barang, $jumlah) {
        $stmt = $this->db->prepare("UPDATE barang SET stok = stok - :jumlah WHERE id_barang = :id_barang");
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->execute();
    }
    

    public function deleteTransaksi($id_transaksi) {
        $stmt = $this->db->prepare("DELETE FROM transaksi WHERE id_transaksi = :id_transaksi");
        $stmt->bindParam(':id_transaksi', $id_transaksi);
        return $stmt->execute();
    }
}
?>
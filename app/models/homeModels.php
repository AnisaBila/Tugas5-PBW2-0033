<?php
class home {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function tampilkan() {
        $stmt = $this->db->prepare("SELECT * FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
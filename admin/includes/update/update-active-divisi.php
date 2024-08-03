<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];
    $status = $_GET['status'];
    try {
        include_once('../../../koneksi/koneksi.php');

        // Ubah query menjadi UPDATE
        $query = "UPDATE divisi SET status = ? WHERE id = ?";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$status, $id]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=divisi&status=success3');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=divisi&status=failed1');
    exit();
}

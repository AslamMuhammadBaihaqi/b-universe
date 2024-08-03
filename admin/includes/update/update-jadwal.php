<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $id_acara = htmlspecialchars($_POST['id_acara']);
    $hari = htmlspecialchars($_POST['hari']);
    $jam = htmlspecialchars($_POST['jam']);

    try {
        include_once('../../../koneksi/koneksi.php');

        // Ubah query menjadi UPDATE
        $query = "UPDATE jadwal SET id_acara = ?, hari = ?, jam = ? WHERE id = ?";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$id_acara, $hari, $jam, $id]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=jadwal-program&status=success2');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=jadwal-program&status=failed1');
    exit();
}
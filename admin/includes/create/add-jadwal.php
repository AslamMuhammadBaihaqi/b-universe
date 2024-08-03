<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $jadwal = htmlspecialchars($_POST['acara']);
    $hari = htmlspecialchars($_POST['hari']);
    $jam = htmlspecialchars($_POST['jam']);

    if (empty($jadwal) || empty($hari) || empty($jam)) {
        header('Location: ../../index.php?page=jadwal-program&status=alert1');
        exit();
    }

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "INSERT INTO jadwal (id_acara, hari, jam) VALUES (?, ?, ?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$jadwal, $hari, $jam]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=jadwal-program&status=success1');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=jadwal-program&status=failed1');
    exit();
}
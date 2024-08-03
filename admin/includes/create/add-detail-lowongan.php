<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $divisi = htmlspecialchars($_POST['divisi']);
    $posisi = htmlspecialchars($_POST['posisi']);
    $lokasi = "Jakarta Selatan";
    $tipe = htmlspecialchars($_POST['tipe']);
    $publisher = "B-Universe";
    $tanggung_jawab = htmlspecialchars_decode($_POST['tanggung_jawab']);
    $persyaratan = htmlspecialchars_decode($_POST['persyaratan']);
    $status = 1;

    if (empty($divisi) || empty($posisi) || empty($lokasi) || empty($tipe) || empty($publisher) || empty($tanggung_jawab) || empty($persyaratan) || empty($status)) {
        header('Location: ../../index.php?page=detail-lowongan&status=alert1');
        exit();
    }

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "INSERT INTO detail_lowongan (id_divisi, posisi, lokasi, tipe, publisher, tanggung_jawab, persyaratan, status ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$divisi, $posisi, $lokasi, $tipe, $publisher, $tanggung_jawab, $persyaratan, $status]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=detail-lowongan&status=success1');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=detail-lowongan&status=failed1');
    exit();
}

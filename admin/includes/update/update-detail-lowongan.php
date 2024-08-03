<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $id_divisi = htmlspecialchars($_POST['id_divisi']);
    $posisi = htmlspecialchars($_POST['posisi']);
    $lokasi = "Jakarta Selatan";
    $tipe = htmlspecialchars($_POST['tipe']);
    $publisher = "B-Universe";
    $tanggung_jawab = htmlspecialchars_decode($_POST['tanggung_jawab']);
    $persyaratan = htmlspecialchars_decode($_POST['persyaratan']);

    try {
        include_once('../../../koneksi/koneksi.php');

        // Ubah query menjadi UPDATE
        $query = "UPDATE detail_lowongan SET id_divisi = ?, posisi = ?, lokasi = ?, tipe = ?, publisher = ?, tanggung_jawab = ?, persyaratan = ? WHERE id = ?";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$id_divisi, $posisi, $lokasi, $tipe, $publisher, $tanggung_jawab, $persyaratan, $id]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=detail-lowongan&status=success2');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=detail-lowongan&status=failed1');
    exit();
}

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $video_id = htmlspecialchars($_POST['video_id']);
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    if (empty($video_id) || empty($judul) || empty($deskripsi)) {
        header('Location: ../../index.php?page=shorts-event&status=alert1');
        exit();
    }

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "INSERT INTO shorts (video_id, judul, deskripsi) VALUES (?, ?, ?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$video_id, $judul, $deskripsi]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=shorts-event&status=success1');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=shorts-event&status=failed1');
    exit();
}
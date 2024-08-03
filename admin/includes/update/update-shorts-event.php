<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $video_id = htmlspecialchars($_POST['video_id']);
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    try {
        include_once('../../../koneksi/koneksi.php');

        // Ubah query menjadi UPDATE
        $query = "UPDATE shorts SET video_id = ?, judul = ?, deskripsi = ? WHERE id = ?";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$video_id, $judul, $deskripsi, $id]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=shorts-event&status=success2');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=shorts-event&status=failed1');
    exit();
}

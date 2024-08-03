<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $nomor = htmlspecialchars($_POST['nomor']);
    $pesan = htmlspecialchars($_POST['pesan']);

    if (empty($nama) || empty($email) || empty($nomor) || empty($pesan)) {
        header('Location: ../../index.php?page=kontak&status=alert');
        exit();
    }

    try {
        include_once('../../koneksi/koneksi.php');

        $query = "INSERT INTO kontak (nama, email, nomor, pesan) VALUES (?, ?, ?, ?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$nama, $email, $nomor, $pesan]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=kontak&status=success');

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=kontak&status=failed');

    exit();
}

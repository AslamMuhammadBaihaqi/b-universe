<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $acara = htmlspecialchars($_POST['acara']);

    try {
        include_once('../../../koneksi/koneksi.php');

        // Ubah query menjadi UPDATE
        $query = "UPDATE acara SET acara = ? WHERE id = ?";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$acara, $id]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=acara&status=success2');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=acara&status=failed1');
    exit();
}

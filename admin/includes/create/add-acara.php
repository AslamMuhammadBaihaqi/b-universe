<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $acara = htmlspecialchars($_POST['acara']);

    if (empty($acara)) {
        header('Location: ../../index.php?page=acara&status=alert1');
        exit();
    }

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "INSERT INTO acara (acara) VALUES (?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$acara]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=acara&status=success1');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=acara&status=failed1');
    exit();
}

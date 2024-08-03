<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = htmlspecialchars($_GET['id']);

    // Validasi id (pastikan id adalah angka dan bukan string berbahaya)
    if (!is_numeric($id)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid ID']);
        exit();
    }

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "DELETE FROM shorts WHERE id = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->execute([$id]);

        $pdo = null;
        $stmt = null;

        echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus.']);
        exit();
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Query failed: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit();
}
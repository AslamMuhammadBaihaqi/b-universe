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

        // Mendapatkan path file gambar
        $getImageQuery = $koneksi->prepare("SELECT image FROM program_unggulan WHERE id = ?");
        $getImageQuery->execute([$id]);
        $imagePath = $getImageQuery->fetchColumn();

        // Menghapus file gambar dari folder
        if ($imagePath && file_exists('../../upload/program-unggulan/' . $imagePath)) {
            // Menghapus file gambar dari folder
            unlink('../../upload/program-unggulan/' . $imagePath);
        } else {
            // File gambar tidak ditemukan
            echo json_encode(['status' => 'error', 'message' => 'File gambar tidak ditemukan.']);
            exit();
        }

        // Setelah image terhapus pada folder, lalu mulai hapus data pada database
        $query = "DELETE FROM program_unggulan WHERE id = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->execute([$id]);

        $pdo = null;
        $stmt = null;

        echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus.']);
        exit();
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Query failed: ' . $e->getMessage()]);
        exit();
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit();
}
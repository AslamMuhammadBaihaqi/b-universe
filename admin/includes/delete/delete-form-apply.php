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

        // Mendapatkan path file PDF
        $getPDF = $koneksi->prepare("SELECT application_letter, cv FROM form_apply WHERE id = ?");
        $getPDF->execute([$id]);
        $files = $getPDF->fetch(PDO::FETCH_ASSOC);

        // Menghapus file PDF dari folder
        foreach ($files as $file) { 
            if ($file && file_exists('../../upload/application_letter/' . $file)) {
                unlink('../../upload/application_letter/' . $file);
            } elseif ($file && file_exists('../../upload/cv/' . $file)) {
                unlink('../../upload/cv/' . $file);
            }
        }

        // Setelah PDF terhapus pada folder, lalu mulai hapus data pada database
        $query = "DELETE FROM form_apply WHERE id = ?";
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

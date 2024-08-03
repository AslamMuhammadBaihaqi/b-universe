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
        $getImageQuery = $koneksi->prepare("SELECT image1, image2, image3, image4 FROM galeri WHERE id = ?");
        $getImageQuery->execute([$id]);
        $images = $getImageQuery->fetch(PDO::FETCH_ASSOC);

        // Menghapus file gambar dari folder
        foreach ($images as $image) {
            if ($image && file_exists('../../upload/gallery/' . $image)) {
                unlink('../../upload/gallery/' . $image);
            }
        }

        $query = "DELETE FROM galeri WHERE id = ?";
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

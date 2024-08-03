<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);
    $gambarLama = htmlspecialchars($_POST['gambarLama']);

    if ($_FILES['image']['error'] === 4) {
        $image = $gambarLama;
    } else {
        $image = uploadImage();
    }

    if (!$image) {
        return false;
    }

    try {
        include_once('../../../koneksi/koneksi.php');

        // Ubah query menjadi UPDATE
        $query = "UPDATE divisi SET nama = ?, image = ? WHERE id = ?";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$nama, $image, $id]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=divisi&status=success2');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=divisi&status=failed1');
    exit();
}



function uploadImage()
{
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('Image thumbnail belom di upload!');
            window.location.href = '../../index.php?page=divisi';
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $format = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'svg'];
    if (!in_array($format, $ekstensiGambarValid)) {
        echo "<script>
            alert('Pilih gambar dengan format SVG, JPG, PNG, atau JPEG!');
            window.location.href = '../../index.php?page=divisi';
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script>
            alert('Ukuran gambar anda lebih dari 5MB');
            window.location.href = '../../index.php?page=divisi';
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $format;

    move_uploaded_file($tmpName, '../../upload/divisi/' . $namaFileBaru);
    return $namaFileBaru;
}

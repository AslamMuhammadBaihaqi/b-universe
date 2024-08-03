<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    if (empty($judul) || empty($deskripsi)) {
        header('Location: ../../index.php?page=gallery&status=alert1');
        exit();
    }

    $image1 = uploadImage('image1');
    if (!$image1) {
        return false;
    }

    $image2 = uploadImage('image2');
    if (!$image2) {
        return false;
    }

    $image3 = uploadImage('image3');
    if (!$image3) {
        return false;
    }

    $image4 = ($image4) ? $image4 : NULL;
    $image4 = uploadImage('image4');

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "INSERT INTO galeri (judul, deskripsi, image1, image2, image3, image4 ) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$judul, $deskripsi, $image1, $image2, $image3, $image4]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=gallery&status=success1');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=gallery&status=failed1');
    exit();
}

function uploadImage($imageKey)
{
    $namaFile = $_FILES[$imageKey]['name'];
    $ukuranFile = $_FILES[$imageKey]['size'];
    $error = $_FILES[$imageKey]['error'];
    $tmpName = $_FILES[$imageKey]['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        return null; // Gambar bernilai null jika tidak diupload
    }

    // cek apakah yang diupload adalah gambar
    $format = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    if (!in_array($format, $ekstensiGambarValid)) {
        echo "<script>
            alert('Pilih gambar dengan format JPG, PNG, atau JPEG!');
            window.location.href = '../../index.php?page=gallery';
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 3000000) {
        echo "<script>
            alert('Ukuran gambar anda lebih dari 3MB');
            window.location.href = '../../index.php?page=gallery';
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $format;

    move_uploaded_file($tmpName, '../../upload/gallery/' . $namaFileBaru);
    return $namaFileBaru;
}

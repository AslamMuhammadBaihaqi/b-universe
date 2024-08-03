<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $status = 1;

    if (empty($nama) || empty($status)) {
        header('Location: ../../index.php?page=divisi&status=alert1');
        exit();
    }

    $image = uploadImage();
    if (!$image) {
        return false;
    };

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "INSERT INTO divisi (nama, status, image) VALUES (?, ?, ?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$nama, $status, $image]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=divisi&status=success1');
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
            alert('Image Card Divisi belum di upload!');
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
    if ($ukuranFile > 3000000) {
        echo "<script>
            alert('Ukuran gambar anda lebih dari 3MB');
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

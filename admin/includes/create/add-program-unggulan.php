<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $jadwal = htmlspecialchars($_POST['jadwal']);

    if (empty($judul) || empty($deskripsi) || empty($jadwal)) {
        header('Location: ../../index.php?page=program-unggulan&status=alert1');
        exit();
    }

    $image = uploadImage();
    if (!$image) {
        return false;
    }

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "INSERT INTO program_unggulan (judul, deskripsi, image, jadwal ) VALUES (?, ?, ?, ?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$judul, $deskripsi, $image, $jadwal]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=program-unggulan&status=success1');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=program-unggulan&status=failed1');
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
            alert('pilih gambar terlebih dahulu!');
            window.location.href = '../../index.php?page=program-unggulan';
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $format = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    if (!in_array($format, $ekstensiGambarValid)) {
        echo "<script>
            alert('Pilih gambar dengan format JPG, PNG, atau JPEG!');
            window.location.href = '../../index.php?page=program-unggulan';
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script>
            alert('Ukuran gambar anda lebih dari 5MB');
            window.location.href = '../../index.php?page=program-unggulan';
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $format;

    move_uploaded_file($tmpName, '../../upload/program-unggulan/' . $namaFileBaru);
    return $namaFileBaru;
}

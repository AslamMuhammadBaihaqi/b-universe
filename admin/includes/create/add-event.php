<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = htmlspecialchars($_POST['judul']);
    $slogan = htmlspecialchars($_POST['slogan']);
    $deskripsi = htmlspecialchars_decode($_POST['deskripsi']);
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $link = htmlspecialchars($_POST['link']);
    $tanggal_range = $_POST['tanggal'];
    $tanggal_array = explode(" - ", $tanggal_range);

    $tanggal_awal = date('Y-m-d', strtotime($tanggal_array[0]));
    $tanggal_akhir = date('Y-m-d', strtotime($tanggal_array[1]));

    if (empty($judul) || empty($slogan) || empty($deskripsi) || empty($lokasi) || empty($link)) {
        header('Location: ../../index.php?page=list-event&status=alert1');
        exit();
    }

    $image = uploadImage();
    if (!$image) {
        return false;
    }

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "INSERT INTO event (judul, slogan, deskripsi, image, lokasi, link, tanggal_awal, tanggal_akhir ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$judul, $slogan, $deskripsi, $image, $lokasi, $link, $tanggal_awal, $tanggal_akhir]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=list-event&status=success1');
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=list-event&status=failed1');
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
            window.location.href = '../../index.php?page=list-event';
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $format = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    if (!in_array($format, $ekstensiGambarValid)) {
        echo "<script>
            alert('Pilih gambar dengan format JPG, PNG, atau JPEG!');
            window.location.href = '../../index.php?page=list-event';
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 3000000) {
        echo "<script>
            alert('Ukuran gambar anda lebih dari 3MB');
            window.location.href = '../../index.php?page=list-event';
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $format;

    move_uploaded_file($tmpName, '../../upload/event/' . $namaFileBaru);
    return $namaFileBaru;
}

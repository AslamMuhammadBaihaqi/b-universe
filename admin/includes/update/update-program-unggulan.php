<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $jadwal = htmlspecialchars($_POST['jadwal']);
    $gambarLama = htmlspecialchars($_POST['gambarLama']);

    if ($_FILES['image']['error'] === 4) {
        $image = $gambarLama;
    } else {
        $image = uploadImage();
    }

    // if (!$image) {
    //     return false;
    // }

    try {
        include_once('../../../koneksi/koneksi.php');

        // Ubah query menjadi UPDATE
        $query = "UPDATE program_unggulan SET judul = ?, deskripsi = ?, jadwal = ?, image = ? WHERE id = ?";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$judul, $deskripsi, $jadwal, $image, $id]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=program-unggulan&status=success2');
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

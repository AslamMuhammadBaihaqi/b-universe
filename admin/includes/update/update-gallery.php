<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $gambarLama1 = htmlspecialchars($_POST['gambarLama1']);
    $gambarLama2 = htmlspecialchars($_POST['gambarLama2']);
    $gambarLama3 = htmlspecialchars($_POST['gambarLama3']);
    $gambarLama4 = htmlspecialchars($_POST['gambarLama4']);

    if ($_FILES['image1']['error'] === 4) {
        $image1 = $gambarLama1;
    } else {
        $image1 = uploadImage('image1');
    }

    if ($_FILES['image2']['error'] === 4) {
        $image2 = $gambarLama2;
    } else {
        $image2 = uploadImage('image2');
    }

    if ($_FILES['image3']['error'] === 4) {
        $image3 = $gambarLama3;
    } else {
        $image3 = uploadImage('image3');
    }

    // Cek apakah ada file di $_FILES['image4']
    $image4 = (isset($_FILES['image4']) && $_FILES['image4']['error'] !== 4) ? uploadImage('image4') : NULL;

    try {
        include_once('../../../koneksi/koneksi.php');

        $query = "UPDATE galeri SET judul = ?, deskripsi = ?, image1 = ?, image2 = ?, image3 = ?, image4 = ? WHERE id = ?";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$judul, $deskripsi, $image1, $image2, $image3, $image4, $id]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=gallery&status=success2');
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
    if ($ukuranFile > 5000000) {
        echo "<script>
            alert('Ukuran gambar anda lebih dari 5MB');
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

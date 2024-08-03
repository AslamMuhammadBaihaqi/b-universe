<?php
//include('../../form.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['posisiID'];
    $divisi = $_POST['divisi'];
    $posisi = $_POST['posisi'];
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $cover_letter = htmlspecialchars($_POST['cover_letter']);

    $application_letter = uploadAplicationLetter();
    $cv = uploadCV();

    if (empty($posisi) || empty($divisi) || empty($fullname) || empty($email) || empty($cover_letter)) {
        header('Location: ../../index.php?page=form-job&id=' . $id . '&status=alert');
        exit();
    }

    try {
        include_once('../../koneksi/koneksi.php');

        $query = "INSERT INTO form_apply (posisi, divisi, fullname, email, cover_letter, application_letter, cv) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([$posisi, $divisi, $fullname, $email, $cover_letter, $application_letter, $cv]);

        $pdo = null;
        $stmt = null;

        header('Location: ../../index.php?page=form-job&id=' . $id . '&status=success');

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../../index.php?page=form-job&id=' . $id . '&status=failed');
    exit();
}

function uploadAplicationLetter()
{
    $namaFile = $_FILES['application_letter']['name'];
    $error = $_FILES['application_letter']['error'];
    $tmpName = $_FILES['application_letter']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('File Application Letter belum anda upload!');
            window.location.href = '../../form.php?id';
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $format = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $ekstensiGambarValid = ['pdf'];
    if (!in_array($format, $ekstensiGambarValid)) {
        echo "<script>
            alert('Format file hanya pdf!');
            window.location.href = '../../form.php';
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $format;

    move_uploaded_file($tmpName, '../../admin/upload/application_letter/' . $namaFileBaru);
    return $namaFileBaru;
}

function uploadCV()
{
    $namaFile = $_FILES['cv']['name'];
    $error = $_FILES['cv']['error'];
    $tmpName = $_FILES['cv']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('File CV belum anda upload!');
            window.location.href = '../../form.php';
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $format = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $ekstensiGambarValid = ['pdf'];
    if (!in_array($format, $ekstensiGambarValid)) {
        echo "<script>
            alert('Format file hanya pdf!');
            window.location.href = '../../form.php';
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $format;

    move_uploaded_file($tmpName, '../../admin/upload/cv/' . $namaFileBaru);
    return $namaFileBaru;
}

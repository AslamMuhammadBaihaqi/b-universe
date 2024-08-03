<?php

$db = "mysql:host=localhost;dbname=b_universe";
$dbusername = "root";
$dbpassword  = "";

try {
    $koneksi = new PDO($db, $dbusername, $dbpassword);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
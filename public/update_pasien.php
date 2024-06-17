<?php
session_start();
include_once '../config/Databases.php';
include_once '../class/pasien.php';

include '../public/templates/header.php';

if ($_POST && isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getKoneksi();

    $pasien = new Pasien($db);
    $pasien->id = $_GET['id'];
    $pasien->nama = $_POST['nama'];
    $pasien->umur = $_POST['umur'];
    $pasien->alamat = $_POST['alamat'];
    $pasien->no_hp = $_POST['no_hp'];

    if ($pasien->perbarui()) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal memperbarui data pasien.');</script>";
    }
}

include '../public/templates/update_pasien.php';
?>

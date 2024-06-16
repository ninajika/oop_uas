<?php
session_start();
include_once '../config/Databases.php';
include_once '../class/pasien.php';

if($_POST) {
    $database = new Database();
    $db = $database->getKoneksi();

    $pasien = new Pasien($db);
    $pasien->nama = $_POST['nama'];
    $pasien->umur = $_POST['umur'];
    $pasien->alamat = $_POST['alamat'];
    $pasien->no_hp = $_POST['no_hp'];

    $pasien->perbarui();
    header("Location: index.php");
}

?>
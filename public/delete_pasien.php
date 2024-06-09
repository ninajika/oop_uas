<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
    exit;
}

include_once '../config/Databases.php';
include_once '../class/pasien.php';

$data = new Database();
$db = $data->getKoneksi();

$pasien = new Pasien($db);
$pasien->id = $_GET['id'];

if($pasien->hapus()){
    header("location:index.php");
}else{
    echo "Data Gagal Dihapus. <a href='pasien.php'>Kembali</a>";
}

?>

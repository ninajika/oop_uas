<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
    exit;
}
include 'templates/header.php';
include 'templates/daftar_pasien.php';
?>


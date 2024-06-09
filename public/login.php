<?php
session_start();
include_once '../config/Databases.php';
include_once '../class/User.php';

if($_POST) {
    $database = new Database();
    $db = $database->getKoneksi();

    $user = new User($db);
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    $user_id = $user->login();
    if($user_id) {
        $_SESSION['username'] = $user->username;
        header("Location: index.php");
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

include 'templates/login.php';
?>

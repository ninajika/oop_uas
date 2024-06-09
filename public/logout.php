<?php
session_start();
session_unset(); // menghapus semua variabel yang ada di session
session_destroy();
header("Location: index.php");
?>

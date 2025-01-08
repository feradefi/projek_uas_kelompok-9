<?php
session_start();

// Menghapus semua data session
session_destroy();

// Mengarahkan pengguna ke halaman index
header("location: index.php");
exit();
?>

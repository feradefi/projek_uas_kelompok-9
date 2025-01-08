<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi,"delete from hutag where id_hutang='$id'");
 
// mengalihkan halaman kembali ke hutang.php
header("location:hutang.php");
 
?>
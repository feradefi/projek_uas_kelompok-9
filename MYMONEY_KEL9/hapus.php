<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi,"delete from transaksi where id='$id'");
 
// mengalihkan halaman kembali ke daftar_tgs.php
header("location:transaksi.php");
 
?>
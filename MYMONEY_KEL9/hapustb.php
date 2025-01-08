<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi,"delete from tabungan where id_tabungan='$id'");
 
// mengalihkan halaman kembali ke tabung.php
header("location:tabung.php");
 
?>
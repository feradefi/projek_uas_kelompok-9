<?php
include 'koneksi.php';

// Mendapatkan ID transaksi dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data transaksi berdasarkan ID
$query = "SELECT * FROM transaksi WHERE id = $id";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah data transaksi ditemukan
if (mysqli_num_rows($result) > 0) {
    $transaksi = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Helvetica Neue', sans-serif;
            min-height: 100vh;
            background:linear-gradient(rgba(0, 0, 0, 0.510),rgba(0, 0, 0, 0.510)), url(https://www.nevertherightword.com/wp-content/uploads/2019/04/wallet-cash-coins-never-right-word-scaled.jpg); 
            background-size: cover;
            background-position: center;
            padding: 3em 3em 0;
            flex: 5 5 150px;
            padding-top: 125px;
        
        }
        .container {
            max-width: 700px;
            height: 300px;
            background-color: #ADD8E6;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
        }
        th {
            width: 30%;
            font-weight: bold;
            text-align: left;
            color: #555;
        }
        td {
            color: #333;
        }
        .button-container {
            text-align: center;
            margin-top: 30px;
        }
        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .button-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Detail transaksi</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Keterangan</th>
                    <td><?php echo $transaksi['keterangan']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Nominal (Rp)</th>
                    <td><?php echo $transaksi['jumlah']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tanggal</th>
                    <td><?php echo $transaksi['tanggal']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Kategori</th>
                    <td><?php echo $transaksi['kategori']; ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
                        <div class="button-container">
                            <a href="transaksi.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
                        </div>
                    </td>  
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
} else {
    // transaksi tidak ditemukan, redirect ke halaman daftar transaksi
    header("Location: transaksi.php");
    exit();
}
?>

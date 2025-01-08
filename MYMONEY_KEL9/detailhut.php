<?php
include 'koneksi.php';

// Mendapatkan ID hutang dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data hutang berdasarkan ID
$query = "SELECT * FROM hutag WHERE id_hutang = $id";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah data hutang ditemukan
if (mysqli_num_rows($result) > 0) {
    $hutang = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Hutang</title>
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
        <h1 class="mb-4">Detail Hutang</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Total Hutang (Rp)</th>
                    <td><?php echo $hutang['total_hutang']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tanggal Bayar</th>
                    <td><?php echo $hutang['tgl_bayar']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td><?php echo $hutang['status']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Catatan</th>
                    <td><?php echo $hutang['catatan']; ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
                        <div class="button-container">
                            <a href="hutang.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
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
    // tanggungan tidak ditemukan, redirect ke halaman daftar tanggungan
    header("Location: tanggungan.php");
    exit();
}
?>

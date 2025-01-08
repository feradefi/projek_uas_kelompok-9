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

    // Memeriksa apakah form telah disubmit
    if (isset($_POST['submit'])) {
        // Mendapatkan nilai inputan dari form
        $total_hutang = $_POST['total_hutang'];
        $tgl_bayar = $_POST['tgl_bayar'];
        $status = $_POST['status'];
        $catatan = $_POST['catatan'];

        // Query untuk mengupdate data hutang
        $updateQuery = "UPDATE hutag SET total_hutang = '$total_hutang', tgl_bayar = '$tgl_bayar', status = '$status', catatan = '$catatan' WHERE id_hutang = $id";
        mysqli_query($koneksi, $updateQuery);

        // Redirect ke halaman daftar hutang setelah berhasil mengupdate data
        header("Location: hutang.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Hutang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        body {
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
            margin-top: 50px;
            max-width: 600px;
            background-color: khaki;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }

        form .form-group {
            margin-bottom: 20px;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="date"],
        form select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        form button[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        form button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mx-auto">
        <h1 class="mb-4 text-center">Edit Hutang</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="total_hutang">Total Hutang (Rp)</label>
                <input type="number" name="total_hutang" id="total_hutang" value="<?php echo $hutang['total_hutang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_bayar">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" id="tgl_bayar" value="<?php echo $hutang['tgl_bayar']; ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="border border-gray-300 rounded-md px-4 py-2 w-full">
                    <option value="lunas">Lunas</option>
                    <option value="belum">Belum Lunas</option>
                </select>
                </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <input type="text" name="catatan" id="catatan" value="<?php echo $hutang['catatan']; ?>" required>
            </div>
            <button type="submit" name="submit">Simpan</button>
            <a type="button" href="hutang.php" class="bg-red-500 text-white px-4 py-2 rounded-md ml-4">Kembali</a>
        </form>
    </div>
</body>
</html>

<?php
} else {
    // hutang tidak ditemukan, redirect ke halaman daftar hutang
    header("Location: hutang.php");
    exit();
}
?>

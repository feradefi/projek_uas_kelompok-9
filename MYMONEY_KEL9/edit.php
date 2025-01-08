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

    // Memeriksa apakah form telah disubmit
    if (isset($_POST['submit'])) {
        // Mendapatkan nilai inputan dari form
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $kategori = $_POST['kategori'];

        // Query untuk mengupdate data transaksi
        $updateQuery = "UPDATE transaksi SET keterangan = '$keterangan', jumlah = '$jumlah', tanggal = '$tanggal', kategori = '$kategori' WHERE id = $id";
        mysqli_query($koneksi, $updateQuery);

        // Redirect ke halaman daftar transaksi setelah berhasil mengupdate data
        header("Location: transaksi.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
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
        <h1 class="mb-4 text-center">Edit Transaksi</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" value="<?php echo $transaksi['keterangan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Nominal (Rp)</label>
                <input type="number" name="jumlah" id="jumlah" value="<?php echo $transaksi['jumlah']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="<?php echo $transaksi['tanggal']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" required>
                    <option value="Pendapatan" <?php if ($transaksi['kategori'] === 'Pendapatan') echo 'selected'; ?>>Pendapatan</option>
                    <option value="Pengeluaran" <?php if ($transaksi['kategori'] === 'Pengeluaran') echo 'selected'; ?>>Pengeluaran</option>
                </select>
            </div>
            <button type="submit" name="submit">Simpan</button>
            <a href="transaksi.php" class="bg-red-500 text-white px-4 py-2 rounded-md ml-4"">Kembali</a>
        </form>
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

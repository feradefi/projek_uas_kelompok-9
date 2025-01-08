<?php
include 'koneksi.php';

// Mendapatkan ID tabungan dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data tabungan berdasarkan ID
$query = "SELECT * FROM tabungan WHERE id_tabungan = $id";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah data tabungan ditemukan
if (mysqli_num_rows($result) > 0) {
    $tabungan = mysqli_fetch_assoc($result);

    // Memeriksa apakah form telah disubmit
    if (isset($_POST['submit'])) {
        // Mendapatkan nilai inputan dari form
        $jenis = $_POST['jenis'];
        $saldo = $_POST['saldo'];
        $tanggal = $_POST['tanggal'];
        $catatan = $_POST['catatan'];

        // Query untuk mengupdate data tabungan
        $updateQuery = "UPDATE tabungan SET jenis = '$jenis', saldo = '$saldo', tanggal = '$tanggal', catatan = '$catatan' WHERE id = $id";
        mysqli_query($koneksi, $updateQuery);

        // Redirect ke halaman daftar tabungan setelah berhasil mengupdate data
        header("Location: tabung.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tabungan</title>
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
        <h1 class="mb-4 text-center">Edit Tabungan</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="jenis">Jenis Tabungan</label>
                <input type="text" name="jenis" id="jenis" value="<?php echo $tabungan['jenis']; ?>" required>
            </div>
            <div class="form-group">
                <label for="saldo">Saldo(Rp)</label>
                <input type="number" name="saldo" id="saldo" value="<?php echo $tabungan['saldo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="<?php echo $tabungan['tanggal']; ?>" required>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <input type="text" name="catatan" id="catatan" value="<?php echo $tabungan['catatan']; ?>" required>
            </div>
            <button type="submit" name="submit">Simpan</button>
            <a type="button" href="tabung.php" class="bg-red-500 text-white px-4 py-2 rounded-md ml-4">Kembali</a>
        </form>
    </div>
</body>
</html>

<?php
} else {
    // tabungan tidak ditemukan, redirect ke halaman daftar ttabungan
    header("Location: tabung.php");
    exit();
}
?>

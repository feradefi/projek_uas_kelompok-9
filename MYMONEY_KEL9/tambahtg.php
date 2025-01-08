<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total_hutang = $_POST['total_hutang'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan'];

    if (empty($total_hutang) || empty($tgl_bayar) || empty($status) || empty($catatan)) {
        $errorMessage = 'Data harus diisi!!!';
    } else {
        $sql = "INSERT INTO hutag (username, total_hutang, tgl_bayar, status, catatan) VALUES ('$username', '$total_hutang', '$tgl_bayar', '$status', '$catatan')";

        if (mysqli_query($koneksi, $sql)) {
            header("Location: hutang.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    }
}

mysqli_close($koneksi);
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Tambah Data</title>
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
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: lightgray;
            width: 500px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-250">
    <div class="center">
        <div class="w-96 form-container">
            <h2 class="text-2xl font-bold mb-4">Tambah Data</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <?php if (!empty($errorMessage)) : ?>
                    <div class="mb-4">
                        <p class="text-red-500"><?php echo $errorMessage; ?></p>
                    </div>
                <?php endif; ?>
                <div class="mb-4">
                    <label for="total_hutang" class="block text-gray-700">Total Hutang (Rp)</label>
                    <input type="number" id="total_hutang" name="total_hutang" class="border border-gray-300 rounded-md px-4 py-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="tgl_bayar" class="block text-gray-700">Tanggal Bayar</label>
                    <input type="date" id="tgl_bayar" name="tgl_bayar" class="border border-gray-300 rounded-md px-4 py-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Status</label>
                    <select id="status" name="status" class="border border-gray-300 rounded-md px-4 py-2 w-full">
                        <option value="lunas">Lunas</option>
                        <option value="belum">Belum Lunas</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="catatan" class="block text-gray-700">Catatan</label>
                    <input type="text" id="catatan" name="catatan" class="border border-gray-300 rounded-md px-4 py-2 w-full">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
                    <a type="button" href="hutang.php" class="bg-red-500 text-white px-4 py-2 rounded-md ml-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

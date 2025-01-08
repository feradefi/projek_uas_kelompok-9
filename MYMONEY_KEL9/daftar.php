<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($koneksi, $sql)) {
        // Tambahkan data transaksi kosong untuk pengguna baru
        $sql_insert_transaksi = "INSERT INTO transaksi (username) VALUES ('$username')";
        mysqli_query($koneksi, $sql_insert_transaksi);

        // Notifikasi berhasil
        $signup_success = true;
    } else {
        // Notifikasi gagal
        $signup_error = true;
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Daftar</title>
</head>
<body>

    
    <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:900px">
            <div class="md:flex w-full">
                <div class="md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-gray-900">Daftar <br> My-Money</h1>
                        <p>Masukkan informasi Anda</p>
                    </div>
                    <?php if(isset($signup_success) && $signup_success) { ?>
        <div class="alert alert-success" role="alert">
            Pendaftaran berhasil. Silahkan ke halaman <a href="index.php" class="underline">login</a><br>
        </div>
    <?php } ?>
    <?php if(isset($signup_error) && $signup_error) { ?>
        <div class="alert alert-danger" role="alert">
            Pendaftaran gagal. Silahkan coba lagi.
        </div>
    <?php } ?>
                    <form method="POST" action="">
                        <div>
                            <div class="flex -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label for="" class="text-xs font-semibold px-1">Username</label>
                                    <input type="text" name="username" class="w-full p-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Masukkan username Anda" required>
                                </div>
                            </div>
                            <div class="flex -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label for="" class="text-xs font-semibold px-1">Email</label>
                                    <input type="email" name="email" class="w-full p-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Masukkan email Anda" required>
                                </div>
                            </div>
                            <div class="flex -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label for="" class="text-xs font-semibold px-1">Password</label>
                                    <input type="password" name="password" class="w-full p-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Masukkan password Anda" required>
                                </div>
                            </div>
                            <div class="flex -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <button type="submit" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-sm text-gray-500 mt-4">
                        Sudah punya akun? <a href="index.php" class="underline">Login disini</a>
                    </div>
                </div>
                <div class="hidden md:block md:w-3/4 py-10 px-10" style="background : url(https://i.pinimg.com/564x/1c/0a/77/1c0a7776892fb96cdd61c6e531a113c1.jpg); background-size: cover;">
                </div>
            </div>
        </div>
    </div>
</body>
</html>


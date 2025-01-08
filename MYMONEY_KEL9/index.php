<?php
session_start();
include 'koneksi.php';

$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['username'] = $username;

        // Cek apakah pengguna baru atau bukan
        $sql_transaksi = "SELECT * FROM transaksi WHERE username='$username'";
        $result_transaksi = mysqli_query($koneksi, $sql_transaksi);

        if (mysqli_num_rows($result_transaksi) == 0) {
            // Jika pengguna baru, sisipkan data transaksi kosong ke dalam tabel transaksi
            $sql_insert_transaksi = "INSERT INTO transaksi (username, keterangan) VALUES ('$username', 'Belum Ada data Yang di Input')";
            mysqli_query($koneksi, $sql_insert_transaksi);
        }

        header("Location: home.php");
        exit();
    } else {
        $login_error = "Username atau password tidak valid.";
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
    <title>Login</title>
</head>
<body>
    <?php if(isset($login_error) && !empty($login_error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $login_error; ?>
        </div>
    <?php } ?>
    <div class="min-w-screen min-h-screen bg-blue-950 flex items-center justify-center px-5 py-5">
        <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:900px">
            <div class="md:flex w-full">
            <div class="hidden md:block md:w-3/4 py-10 px-10" style="background : url(https://i.pinimg.com/564x/46/3e/08/463e0888237b1fb385bbc1daba8d5ed1.jpg); background-size: cover;">
                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-gray-900">Login <br> My-Money</h1>
                        <p>Masukkan informasi Anda</p>
                    </div>
                    <form method="POST" action="">
                        <div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Username</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi text-gray-400 text-lg"></i></div>
                                        <input type="text" name="username" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Masukkan username anda">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-12">
                                    <label for="" class="text-xs font-semibold px-1">Password</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                        <input type="password" name="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button type="submit" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Login</button>
                                </div>
                                </div>
                                <div class="text-center text-sm text-gray-500 mt-4">
                            Belum punya akun? <a href="daftar.php" class="underline">Daftar disini</a>
                        </div>
                            
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>

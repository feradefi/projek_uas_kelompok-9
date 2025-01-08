<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>HOME</title> 
    </head>
    <body class="bg-gray-100">
        <!-- component -->
<aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
    <div>
        <div class="-mx-6 px-6 py-4">
            <a href="home.php" title="home">
            <h3 hidden class="text-3xl text-blue-900 font-large lg:block font-black">My-Money</h3><br>
                <h3 hidden class="text-xl text-gray-500 font-medium lg:block">Halo, <?php echo $_SESSION['username']; ?>!</h3>
            </a>
        </div>

        <ul class="space-y-2 tracking-wide mt-8">
            <li>
                <a href="home.php" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                    <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                        <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                        <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current group-hover:text-sky-300"></path>
                    </svg>
                    <span class="-mr-1 font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="transaksi.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                    </svg>
                    <span class="group-hover:text-gray-700">Data Transaksi</span>
                </a>
            </li>
            <li>
            <a href="hutang.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                    </svg>
                    <span class="group-hover:text-gray-700">Data Hutang</span>
                </a>
            </li>
            <li>
                <a href="tabung.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                    </svg>
                    <span class="group-hover:text-gray-700">Data Tabungan</span>
                </a>
            </li>
            <li>
                <a href="about.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                    </svg>
                    <span class="group-hover:text-gray-700">About</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ... -->
<div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
    <form action="logout.php" method="POST">
        <button type="submit" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="group-hover:text-gray-700">Logout</span>
        </button>
    </form>
</div>
<!-- ... -->

</aside>
<div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <div class="sticky z-10 top-0 h-16 border-b bg-blue-900 lg:py-2.5">
        <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
            <h4 class="text-3xl text-gray-50 font-medium lg:block hidden lg:flex-grow text-center">Dashboard</h4>
            <h4 class="text-3xl text-gray-50 font-medium lg:hidden block text-center">Dashboard</h4>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    
        <div class="bg-white shadow-lg p-4 mb-8">
            <h2 class="text-lg font-semibold mb-4 text-center">Halaman Ini Berisi Informasi Data Keuangan Anda</h2>
        </div>
        
    <div class="container mx-auto px-4 py-8">
    <!-- Grafik Transaksi -->
    <div class="bg-white rounded-lg shadow-lg p-4 mb-8">
        <h2 class="text-3xl font-semibold mb-4 text-center">Grafik Transaksi</h2>
        <canvas id="transactionChart"></canvas>
    </div>

    <!-- Informasi Detail Transaksi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Info Jumlah Transaksi -->
    
    <div class="bg-white rounded-lg shadow-lg p-4">
        <h2 class="text-lg font-semibold mb-4">Jumlah Data Transaksi</h2>
            <p class="text-3xl font-bold">
                <?php
                // Mengambil jumlah transaksi dari tabel untuk user yang login
                $query = "SELECT COUNT(*) AS total_transaksi FROM transaksi WHERE username = '$username'";
                $result = mysqli_query($koneksi, $query);
                $row = mysqli_fetch_assoc($result);
                $totalTransaksi = $row['total_transaksi'];

                // Menampilkan jumlah transaksi
                echo $totalTransaksi;
                ?>
            </p>
    </div>

    <!-- Info Total Pendapatan -->
    <div class="bg-white rounded-lg shadow-lg p-4">
        <h2 class="text-lg font-semibold mb-4">Total Pendapatan</h2>
        <p class="text-3xl font-bold">
        <?php
        // Mengambil total pendapatan dari tabel
        $query = "SELECT SUM(jumlah) AS total_pendapatan FROM transaksi WHERE kategori = 'pendapatan' AND username = '$username'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        $totalPendapatan = $row['total_pendapatan'];

        // Menampilkan total pendapatan
        echo $totalPendapatan;
        ?>
        </p>
    </div>

    <!-- Info Total Pengeluaran -->
    <div class="bg-white rounded-lg shadow-lg p-4">
        <h2 class="text-lg font-semibold mb-4">Total Pengeluaran</h2>
        <p class="text-3xl font-bold">
        <?php
        // Mengambil total pengeluaran dari tabel
        $query = "SELECT SUM(jumlah) AS total_pengeluaran FROM transaksi WHERE kategori = 'pengeluaran' AND username = '$username'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        $totalPengeluaran = $row['total_pengeluaran'];

        // Menampilkan total pengeluaran
        echo $totalPengeluaran;
        ?>
        </p>
    </div>

<!-- Info Saldo -->
    <div class="bg-white rounded-lg shadow-lg p-4">
    <h2 class="text-lg font-semibold mb-4">Saldo Pada Data Transaksi</h2>
        <p class="text-3xl font-bold">
        <?php
        // Menghitung saldo (total pendapatan - total pengeluaran)
        $saldo = $totalPendapatan - $totalPengeluaran;

        // Jika saldo negatif, set saldo menjadi 0
        if ($saldo < 0) {
            $saldo = 0;
        }

        // Menampilkan saldo
        echo $saldo;
        ?>
        </p>
    </div>


    <!-- Info data tabungan -->
    <div class="bg-white rounded-lg shadow-lg p-4">
        <h2 class="text-lg font-semibold mb-4">Data Tabungan Anda</h2>
        <p class="text-3xl font-bold">
            <?php
            // Mengambil jumlah transaksi dari tabel untuk user yang login
            $query = "SELECT COUNT(*) AS total_transaksi FROM tabungan WHERE username = '$username'";
            $result = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_assoc($result);
            $totalTransaksi = $row['total_transaksi'];

            // Menampilkan jumlah transaksi
            echo $totalTransaksi;
            ?>
        </p>
    </div>


    <!-- Info data hutang belum lunas -->
    <div class="bg-white rounded-lg shadow-lg p-4">
        <h2 class="text-lg font-semibold mb-4">Data Hutang Belum Lunas</h2>
        <p class="text-3xl font-bold">
            <?php
            // Mengambil total hutang dari tabel dengan status belum selesai
            $query = "SELECT COUNT(*) AS total_hutang FROM hutag WHERE status = 'belum' AND username = '$username'";
            $result = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_assoc($result);
            $totalHutang = $row['total_hutang'];

            // Menampilkan total hutang
            echo $totalHutang;
            ?>
        </p>
    </div>
    </div>
    </div>

    <div class="bg-white shadow-lg p-4 mb-8">
                <h2 class="text-2xl font-semibold mb-4 text-center  font-bold">Hutang Lewat Jatuh Tempo</h2>
        <?php
        // Mengambil data hutang yang telah lewat jatuh tempo
        $query = "SELECT * FROM hutag WHERE status = 'belum' AND tgl_bayar < CURDATE() AND username = '$username'";
        $result = mysqli_query($koneksi, $query);

        // Jika terdapat hutang yang telah lewat jatuh tempo
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $namaHutang = $row['catatan'];
                $tanggalPembayaran = $row['tgl_bayar'];
                echo "<p class='text-red-500 text-lg font-semibold mb-4'> -. $namaHutang dengan tanggal pembayaran $tanggalPembayaran telah lewat jatuh tempo!!</p>";
            }
        } else {
            echo "<p>Tidak ada hutang yang telah lewat jatuh tempo.</p>";
        }
        ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('transactionChart').getContext('2d');

    var data = {
        labels: ['Jumlah Transaksi', 'Total Pendapatan', 'Total Pengeluaran'],
        datasets: [
            {
                label: 'Nilai',
                data: [
                    <?php echo $totalTransaksi; ?>,
                    <?php echo $totalPendapatan; ?>,
                    <?php echo $totalPengeluaran; ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)', // Warna grafik jumlah transaksi
                    'rgba(54, 162, 235, 0.2)', // Warna grafik total pendapatan
                    'rgba(255, 99, 132, 0.2)'  // Warna grafik total pengeluaran
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',   // Warna batas grafik jumlah transaksi
                    'rgba(54, 162, 235, 1)',   // Warna batas grafik total pendapatan
                    'rgba(255, 99, 132, 1)'    // Warna batas grafik total pengeluaran
                ],
                borderWidth: 1
            }
        ]
    };

    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    var transactionChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>

    </div>
    </div>
    
</div>

</body>
</html>
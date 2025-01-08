<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
$username = $_SESSION['username'];
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Menyusun query sesuai dengan input pencarian
$query = "SELECT * FROM hutag WHERE username='$username'";

if (!empty($search)) {
    $query .= " AND status LIKE '%$search%'";
}

// Function to get user's transaction list
function getHutang($koneksi, $username, $search)
{
    $sql = "SELECT * FROM hutag WHERE username='$username' AND status LIKE '%$search%'";
    $result = mysqli_query($koneksi, $sql);
    $no = 1;
    $rowColor = true;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rowClass = $rowColor ? 'bg-white' : 'bg-gray-100'; // Menentukan kelas CSS untuk setiap baris
            $rowColor = !$rowColor; // Toggle nilai untuk warna strip

            echo "<tr class='$rowClass'>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . $no++ . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['total_hutang'] . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['tgl_bayar'] . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['status'] . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['catatan'] . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>";
            echo "<a type='button' class='bg-yellow-500 text-white px-4 py-2 rounded-md mr-2' href='edithut.php?id=" . $row['id_hutang'] . "'>EDIT</a>";
            echo "<a type='button' class='bg-red-500 text-white px-4 py-2 rounded-md mr-2' href='hapushut.php?id=" . $row['id_hutang'] . "' onclick='return confirmDelete()'>HAPUS</a>";
            echo "<a type='button' class='bg-blue-500 text-white px-4 py-2 rounded-md' href='detailhut.php?id=" . $row['id_hutang'] . "'>Detail transaksi</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6' class='text-center'>Belum ada data yang diinput.</td></tr>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"></link>
    </script>
    <title>Hutang</title>    
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
            <a href="home.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
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
                    <span class="-mr-1 font-medium">Data Transaksi</span>
                </a>
            </li>
            <li>
            <a href="hutang.php" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                    <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                    <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                    </svg>
                    <span class="-mr-1 font-medium">Data Hutang</span>
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
                <a href="About.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
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
            <h4 class="text-3xl text-gray-50 font-medium lg:block hidden lg:flex-grow text-center">Data Hutang</h4>
            <h4 class="text-3xl text-gray-50 font-medium lg:hidden block text-center">Data Hutang</h4>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
        <div class="bg-white shadow-lg p-4 mb-8">
            <h2 class="text-lg font-semibold mb-4 text-center">Dihalaman ini Anda Bisa Mengelola Data Hutang/ Tanggungan Anda</h2>
        </div>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-4">
            <a type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="tambahtg.php">Tambah Data+ </a>
        </div>
    <!--search bar -->
    <form action="" method="GET">
        <div class="flex items-center mb-4">
            <label for="search" class="mr-2">Cari berdasarkan status:</label>
            <select name="search" id="search" class="border border-gray-300 px-4 py-2 rounded-md">
                <option value="">Semua</option>
                <option value="lunas" <?php if ($search === 'lunas') echo 'selected'; ?>>Lunas</option>
                <option value="belum" <?php if ($search === 'belum') echo 'selected'; ?>>Belum</option>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">Cari</button>
        </div>
    </form>

    <!-- ... -->
    <div class="bg-white rounded-lg shadow-lg p-4 mb-8">
    <table class="w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Total Hutang</th>
                            <th class="border border-gray-300 px-4 py-2">Tanggal Bayar</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Catatan</th>
                            <th class="border border-gray-300 px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border border-gray-300 px-4 py-2 text-center">
                    <?php
                    $rowColor = true; // Variable untuk menentukan warna strip
                    getHutang($koneksi, $username, $search);
                    ?>
                    </tbody>
                </table>
            </div>

    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>
    </div>

        </div>
    </div>
    </body>
</html>

<?php
mysqli_close($koneksi);
?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: index.php");
}

include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>About</title>    
    </head>
<body class="bg-gray-100">
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
            <a href="about.php" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                    <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                    </svg>
                    <span class="-mr-1 font-medium">About</span>
                </a>
            </li>
        </ul>
    </div>

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
            <h4 class="text-3xl text-gray-50 font-medium lg:block hidden lg:flex-grow text-center">About</h4>
            <h4 class="text-3xl text-gray-50 font-medium lg:hidden block text-center">About</h4>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    
        <div class="bg-white shadow-lg p-4 mb-8">
            <h2 class="text-lg font-semibold mb-4 text-center">Tentang Web My-Money</h2>
        </div>
        
        <div class="container mx-auto px-4 py-8">

<!-- ... -->
<section >
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center">
            <div class="w-full md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto -mt-78">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-20 shadow-lg rounded-lg bg-blue-100">
                    <img alt="..." src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=700&amp;q=80" class="w-full align-middle rounded-t-lg">
                    <blockquote class="relative p-8 mb-4">
                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="absolute left-0 w-full block h-95-px -top-94-px">
                            <polygon points="-30,95 583,95 583,65" class="text-blue-950 fill-current"></polygon>
                        </svg>
                        <h4 class="text-xl font-bold text-black">
                            Web ini dibuat oleh kelompok 9
                        </h4>
                        <p class="text-md font-light mt-2 text-gray">
                            Disini kami membuat web keuangan. Web keuangan dapat menjadi sumber informasi yang berharga bagi pengguna dalam mengelola keuangan mereka.
                        </p>
                    </blockquote>
                </div>
            </div>
            
            <div class="w-full md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-20 shadow-lg rounded-lg bg-blue-100">
                    <div class="w-full px-4">
                        <div class="relative flex flex-col">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-white">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                                <h6 class="text-xl mb-1 font-semibold">Tujuan</h6>
                                <p class="mb-4 text-blueGray-500">
                                    Menyediakan informasi yang relevan, dan memberi layanan keuangan kepada pengguna 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="w-full md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-20 shadow-lg rounded-lg bg-blue-100">
                    <div class="w-full px-4">
                        <div class="relative flex flex-col">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-white">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <h6 class="text-xl mb-1 font-semibold">Manfaat</h6>
                                <p class="mb-4 text-blueGray-500">
                                    Untuk membantu pengguna mengelola keuangan mereka dengan lebih efektif.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-20 shadow-lg rounded-lg bg-blue-100">
                    <div class="w-full px-4">
                        <div class="relative flex flex-col">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-white">
                                    <i class="fas fa-drafting-compass"></i>
                                </div>
                                <h6 class="text-xl mb-1 font-semibold text-black">Fitur</h6>
                                <p class="mb-4 text-blueGray-gray">
                                    Web ini menyediakan Fitur yang dapat membantu pengguna seperti jumlah transaksi, pemasukkan, pengeluaran dan isi saldo.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="bg-blueGray-50 rounded-lg shadow-lg p-4 mb-8">
        <h2 class="text-center text-2xl font-semibold mt-3 text-center">Profil Pembuat Web</h2>
            <div><br><br>
                <h2 class="text-center text-xl font-semibold mt-1 text-center">Kelas PBW A <br> Kelompok 9</h2>
            <div class="h-full ml-10 mt-10 mb-10 md:ml-10">
                <div class="flex flex-col md:flex-row space-x-0 md:space-x-10 space-y-10 md:space-y-0 justify-center items-center ">
                <div class="rounded-xl">
                    <div class="flex flex-col md:w-auto">
                        <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-10">
                            <img class="w-30 h-32 rounded-full mx-auto" src="https://i.pinimg.com/564x/f2/83/ff/f283ff54e85bf888715c644d5996f272.jpg" alt="Profile picture">
                            <h2 class="text-center text-2xl font-semibold mt-3">Alvita Aqila Habsah</h2>
                            <p class="text-center text-gray-600 mt-1">220441100075</p>
                        </div>
                    </div>
                </div>
    
                <div class="rounded-xl">
                    <div class="flex flex-col md:w-auto">
                        <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-10">
                            <img class="w-30 h-32 rounded-full mx-auto" src="https://i.pinimg.com/564x/b8/7f/85/b87f85291aedcdbab88a88fd44275d65.jpg" alt="Profile picture">
                            <h2 class="text-center text-2xl font-semibold mt-3">Fera Defi Susanti</h2>
                            <p class="text-center text-gray-600 mt-1">220441100045</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        </div>
        </section>
</body>
</html>
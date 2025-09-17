<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
$userId = $_SESSION['user_id'] ?? 'ID Tidak Ditemukan';
$userEmail = $_SESSION['user_email'] ?? 'Email Tidak Ditemukan';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tel-U Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- Header -->
<header class="bg-cover bg-center h-32" style="background-image: url('assets/paket.jpg');">
    <div class="bg-black bg-opacity-55 h-full flex items-center justify-center text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-5xl font-bold">Tel-U Hub</h1>
            <p class="text-sm mt-1">Selamat Datang di Tel-u Hub platform Logistik di Telkom University</p>
        </div>
    </div>
</header>

<!-- Info Pengguna -->
<div class="bg-white p-6 rounded-xl shadow-md mb-8 mx-4 mt-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Informasi Pengguna !</h2>
        <p class="mb-2">📧 <strong>Email Anda:</strong> <?php echo htmlspecialchars($userEmail); ?></p>
        <p>👤 <strong>ID Pengguna:</strong> <?php echo htmlspecialchars($userId); ?></p>
</div>

<!-- Tombol Navigasi -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mx-4">
    <!-- Tambahkan Data Agen -->
    <a href="indexAgen.php"class="flex items-center justify-center gap-2 bg-indigo-600 text-white text-center py-4 rounded-lg shadow hover:bg-indigo-700 transition duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-6 4a4 4 0 100-8 4 4 0 000 8z"/>
        </svg>
        Tambahkan Data Agen
    </a>

    <!-- Tambahkan Data Kurir -->
    <a href="indexKrr.php"class="flex items-center justify-center gap-2 bg-emerald-600 text-white text-center py-4 rounded-lg shadow hover:bg-emerald-700 transition duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5.121 17.804A6 6 0 1116 18h-2m-2 0h-2m-2 0h-.879z"/>
        </svg>
        Tambahkan Data Kurir
    </a>

    <!-- Tambahkan Data Paket -->
    <a href="indexPaket.php"class="flex items-center justify-center gap-2 bg-indigo-500 text-white text-center py-4 rounded-lg shadow hover:bg-indigo-600 transition duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M20 12V6a2 2 0 00-2-2h-3M4 6v12a2 2 0 002 2h12a2 2 0 002-2v-6m-2 0H6"/>
        </svg>
        Tambahkan Data Paket
    </a>

    <!-- Tambahkan Data Pengiriman -->
    <a href="indexPengambilan.php"class="flex items-center justify-center gap-2 bg-rose-600 text-white text-center py-4 rounded-lg shadow hover:bg-rose-700 transition duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 17H7a4 4 0 01-4-4V5a2 2 0 012-2h11a2 2 0 012 2v6h-1a3 3 0 00-3 3v1h-2l-2 4z"/>
        </svg>
        Tambahkan Data Pengambilan Paket
    </a>

    </a>
</div>

<!-- Footer Tombol -->
<div class="absolute bottom-0 right-0 mb-4 mr-4 text-center">
    <a href="logout.php"class="flex items-center gap-2 bg-rose-500 text-white px-6 py-3 rounded hover:bg-rose-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m0-4v-1a2 2 0 114 0v1"/>
        </svg>
        Logout
    </a>
</div>

<!-- <div class="absolute bottom-0 left-0 mb-4 ml-4 text-center">
    <a href="index.php" class="flex items-center gap-2 bg-gray-600 text-white px-6 py-3 rounded hover:bg-gray-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Halaman Utama
    </a>
</div> -->

</body>
</html>

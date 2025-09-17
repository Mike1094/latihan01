<?php
include 'konek.php';
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
    <title>Form Tambah Data Paket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-100 via-red-100 to-yellow-100">
<div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-lg">
    <h2 class="text-3xl font-extrabold mb-8 text-center text-red-600">Form Tambah Data Paket</h2>
    <form method="POST" action="">
        <div class="mb-5">
            <label class="block text-gray-800 font-semibold mb-2">ID Paket</label>
            <input type="text" name="id_paket" required 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 hover:shadow-md transition">
        </div>

        <div class="mb-5">
            <label class="block text-gray-800 font-semibold mb-2">Nama Paket</label>
            <input type="text" name="nama_paket" required 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 hover:shadow-md transition">
        </div>

        <div class="mb-5">
            <label class="block text-gray-800 font-semibold mb-2">Berat Paket (kg)</label>
            <input type="number" step="0.01" name="berat_paket" required 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 hover:shadow-md transition">
        </div>

        <div class="mb-5">
            <label class="block text-gray-800 font-semibold mb-2">Alamat Tujuan</label>
            <input type="text" name="alamat_tujuan" required 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 hover:shadow-md transition">
        </div>

        <div class="mb-5">
            <label class="block text-gray-800 font-semibold mb-2">Jenis Paket</label>
            <select name="jenis_paket" required 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 hover:shadow-md transition">
                <option value="">-- Pilih Jenis Paket --</option>
                <option value="Dokumen">Dokumen</option>
                <option value="Barang">Barang</option>
                <option value="Makanan">Makanan</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-800 font-semibold mb-2">Harga Paket (Rp)</label>
            <input type="number" name="harga_paket" required 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 hover:shadow-md transition">
        </div>

        <button type="submit" 
            class="w-full bg-red-500 text-white font-bold py-3 px-6 rounded-xl hover:bg-red-600 hover:scale-105 active:scale-95 transition transform duration-200">
            💾 Simpan
        </button>
    </form>
</div>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h3>Tes 1: Hashing dan Verifikasi Langsung dengan Password Baru</h3>";
$passwordTesBaru = "inipasswordtes123ABC"; // Gunakan string yang benar-benar baru dan sedikit kompleks
echo "Password yang diuji: '" . htmlspecialchars($passwordTesBaru) . "'<br>";

// 1. Hashing
$hashDihasilkan = password_hash($passwordTesBaru, PASSWORD_DEFAULT);
echo "Hash yang baru dihasilkan: '" . htmlspecialchars($hashDihasilkan) . "'<br>";
echo "Panjang hash: " . strlen($hashDihasilkan) . "<br>";

// 2. Verifikasi Langsung dengan hash yang baru saja dibuat
if (password_verify($passwordTesBaru, $hashDihasilkan)) {
    echo "<strong style='color:green;'>VERIFIKASI LANGSUNG BERHASIL!</strong> Fungsi hash dan verify bekerja normal untuk data baru ini.<br>";
} else {
    echo "<strong style='color:red;'>VERIFIKASI LANGSUNG GAGAL!</strong> Ini menunjukkan masalah serius pada fungsi password_hash/verify di lingkungan PHP Anda.<br>";
}

echo "<hr>";

echo "<h3>Tes 2: Verifikasi Ulang Data Bermasalah Anda (dari database)</h3>";
$passwordProblem = "mike1094"; // Password yang Anda gunakan
$hashProblemDariDB = '$2y$10$RBLgprR94cQKryiqxGBlwumN3ymBFxbWAKLw6wTg3w'; // Hash dari database Anda untuk "mike1094"

echo "Password yang diuji: '" . htmlspecialchars($passwordProblem) . "'<br>";
echo "Hash dari DB: '" . htmlspecialchars($hashProblemDariDB) . "'<br>";

if (password_verify($passwordProblem, $hashProblemDariDB)) {
    echo "<strong style='color:green;'>VERIFIKASI ULANG (Data Problem) BERHASIL!</strong> (Ini akan sangat mengejutkan jika terjadi)<br>";
} else {
    echo "<strong style='color:red;'>VERIFIKASI ULANG (Data Problem) GAGAL.</strong> (Sesuai dengan tes mandiri Anda sebelumnya)<br>";
}
?>
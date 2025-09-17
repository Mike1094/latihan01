<?php
// 1. Mulai sesi. Ini penting untuk bisa mengakses dan menghancurkan sesi yang ada.
session_start();

// 2. Hapus semua variabel sesi.
// Cara paling sederhana adalah dengan mengosongkan array $_SESSION.
$_SESSION = array();

// 3. Jika diinginkan untuk menghancurkan cookie sesi juga,
//    Ini direkomendasikan untuk logout yang lebih bersih.
//    Catatan: Ini akan menghancurkan sesi, bukan hanya data sesi!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, // Set waktu kedaluwarsa di masa lalu
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Akhirnya, hancurkan sesi.
session_destroy();

// 5. Redirect pengguna ke halaman login (atau halaman utama).
//    Pastikan nama file 'login.php' sesuai dengan halaman login Anda.
header("Location: login.php");
exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah redirect.
?>

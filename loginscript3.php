<?php
// 1. Mulai sesi di baris paling atas! WAJIB!
session_start();

// PERINGATAN: Kelas ini menggunakan perbandingan password plaintext, yang SANGAT TIDAK AMAN.
// Gunakan hanya untuk tujuan pembelajaran atau eksperimen terbatas.
// JANGAN GUNAKAN DI LINGKUNGAN PRODUKSI.
class Loginscript {
    private $emailUser;
    private $passwordUser;

    function __construct($emailUser, $passwordUser) {
        $this->emailUser = $emailUser;
        $this->passwordUser = $passwordUser;
    }

    /**
     * Mencoba untuk login pengguna dengan perbandingan password plaintext.
     * Mengembalikan array data pengguna jika berhasil, null jika gagal.
     */
    public function loginUser(): ?array {
        $conn = mysqli_connect("localhost", "root", "", "teluhub");

        if (!$conn) {
            error_log("Connection failed: " . mysqli_connect_error());
            return null; // Gagal koneksi
        }

        // Ambil passwordPen (yang diasumsikan plaintext di database)
        $sql = "SELECT idAkunPen, emailPen, passwordPen FROM akunpen WHERE emailPen = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $this->emailUser);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if ($result && mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    mysqli_stmt_close($stmt); // Tutup statement setelah data diambil
                    mysqli_close($conn);    // Tutup koneksi setelah data diambil

                    // PERUBAHAN UTAMA: Perbandingan password plaintext langsung
                    // Ini SANGAT TIDAK AMAN.
                    if ($this->passwordUser === $row['passwordPen']) {
                        // Password cocok (plaintext vs plaintext)
                        return $row; // Login berhasil, kembalikan data pengguna
                    } else {
                        // Password salah
                        error_log("Login attempt failed (plaintext): Incorrect password for " . $this->emailUser);
                        return null;
                    }
                } else {
                     // Email tidak ditemukan
                    error_log("Login attempt failed (plaintext): Email not found " . $this->emailUser);
                }
            } else {
                error_log("Statement execution failed (plaintext login): " . mysqli_stmt_error($stmt));
            }
            // Pastikan statement ditutup jika belum
            if (isset($stmt) && $stmt instanceof mysqli_stmt) { // Periksa apakah $stmt adalah objek mysqli_stmt yang valid
               if(!mysqli_stmt_close($stmt)){
                  error_log("Failed to close statement in loginUser (plaintext)");
               }
            }
        } else {
            error_log("Error preparing statement (plaintext login): " . mysqli_error($conn));
        }

        // Pastikan koneksi ditutup jika belum
        if (isset($conn) && $conn instanceof mysqli) { // Periksa apakah $conn adalah objek mysqli yang valid
            if(!mysqli_close($conn)){
                error_log("Failed to close connection in loginUser (plaintext)");
            }
        }
        return null; // Login gagal karena alasan lain
    }
}

$loginMessage = ""; // Variabel untuk menyimpan pesan feedback

// Proses hanya jika form disubmit dengan metode POST dan tombol 'submit' ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password']) && !empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
        $emailUser = trim($_POST['email']);
        $passwordUser = $_POST['password']; // Password diambil mentah

        $loginHandler = new Loginscript($emailUser, $passwordUser);
        $userData = $loginHandler->loginUser();

        if ($userData) {
            // Login berhasil! Set variabel sesi
            $_SESSION['user_id'] = $userData['idAkunPen'];
            $_SESSION['user_email'] = $userData['emailPen'];
            $_SESSION['logged_in'] = true;

            // Redirect ke halaman setelah login berhasil
            header("Location: dashboard.php"); // Ganti 'dashboard.php' jika perlu
            exit();
        } else {
            // Login gagal. Cek apakah email ada untuk pesan yang lebih spesifik
            // (Logika ini mungkin perlu disesuaikan jika Anda tidak ingin membocorkan apakah email ada atau tidak)
            $conn_check_plaintext = mysqli_connect("localhost", "root", "", "teluhub");
            $emailExists_plaintext = false;
            if ($conn_check_plaintext) {
                $sql_check_plaintext = "SELECT idAkunPen FROM akunpen WHERE emailPen = ?";
                $stmt_check_plaintext = mysqli_prepare($conn_check_plaintext, $sql_check_plaintext);
                if ($stmt_check_plaintext) {
                    mysqli_stmt_bind_param($stmt_check_plaintext, "s", $emailUser);
                    mysqli_stmt_execute($stmt_check_plaintext);
                    mysqli_stmt_store_result($stmt_check_plaintext);
                    if (mysqli_stmt_num_rows($stmt_check_plaintext) > 0) {
                        $emailExists_plaintext = true;
                    }
                    mysqli_stmt_close($stmt_check_plaintext);
                }
                mysqli_close($conn_check_plaintext);
            }

            if ($emailExists_plaintext) {
                $loginMessage = "Password yang Anda masukkan salah.";
            } else {
                 if (!$conn_check_plaintext && !$emailExists_plaintext){ // Jika koneksi gagal saat pengecekan
                    $loginMessage = "Tidak dapat terhubung ke database untuk verifikasi.";
                 } else {
                    $loginMessage = "Email tidak ditemukan atau belum terdaftar.";
                 }
            }
        }
    } else {
        $loginMessage = "Email dan password tidak boleh kosong.";
    }
}
?>

<!-- Anda bisa meletakkan HTML form di bawah ini jika file ini juga menampilkan form,
     atau biarkan seperti ini jika ini hanya file proses.
     Pastikan untuk menampilkan $loginMessage jika ada. -->
<?php if (!empty($loginMessage) && $_SERVER["REQUEST_METHOD"] == "POST"): // Tampilkan hanya jika ada pesan dan form sudah disubmit ?>
    <p style="color: red; text-align: center; margin-bottom: 10px; background-color: #ffebee; border: 1px solid #ef9a9a; padding: 10px; border-radius: 5px;">
        <?php echo htmlspecialchars($loginMessage); ?>
    </p>
<?php endif; ?>

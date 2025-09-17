<?php
session_start();

class Loginscript {
    private $emailUser;
    private $passwordUser;

    function __construct($emailUser, $passwordUser) {
        $this->emailUser = $emailUser;
        $this->passwordUser = $passwordUser;
    }
    public function loginUser(): ?array {
        $conn = mysqli_connect("localhost", "root", "", "teluhub");

        if (!$conn) {
            error_log("Connection failed: " . mysqli_connect_error());
            return null;
        }

        $sql = "SELECT idAkunPen, emailPen, passwordPen FROM akunpen WHERE emailPen = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $this->emailUser);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if ($result && mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($this->passwordUser, $row['passwordPen'])) {
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                        return $row;
                    }
                }
            } else {
                error_log("Statement execution failed: " . mysqli_stmt_error($stmt));
            }
            mysqli_stmt_close($stmt);
        } else {
            error_log("Error preparing statement: " . mysqli_error($conn));
        }

        mysqli_close($conn);
        return null; // Login gagal karena alasan lain
    }
}

$loginMessage = "Login berhasil!"; // Variabel untuk menyimpan pesan feedback

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password']) && !empty(trim($_POST['email'])) && !empty($_POST['password'])) {
        $emailUser = trim($_POST['email']);
        $passwordUser = $_POST['password'];

        $loginHandler = new Loginscript($emailUser, $passwordUser);
        $userData = $loginHandler->loginUser();

        if ($userData) {
            // Login berhasil! Set variabel sesi
            // Pastikan 'idAkunPen' adalah nama kolom primary key Anda
            $_SESSION['user_id'] = $userData['idAkunPen'];
            $_SESSION['user_email'] = $userData['emailPen'];
            $_SESSION['logged_in'] = true;

            // Redirect ke halaman setelah login berhasil (misalnya dashboard atau halaman utama)
            // Ganti 'index.php' dengan halaman tujuan Anda
            header("Location: dashboard.php");
            exit();
        } else {
            // Login gagal. Cek apakah email ada untuk pesan yang lebih spesifik
            $conn_check = mysqli_connect("localhost", "root", "", "teluhub");
            $emailExists = false;
            if ($conn_check) {
                $sql_check = "SELECT idAkunPen FROM akunpen WHERE emailPen = ?";
                $stmt_check = mysqli_prepare($conn_check, $sql_check);
                if ($stmt_check) {
                    mysqli_stmt_bind_param($stmt_check, "s", $emailUser);
                    mysqli_stmt_execute($stmt_check);
                    mysqli_stmt_store_result($stmt_check); // Penting untuk mysqli_num_rows pada prepared statement
                    if (mysqli_stmt_num_rows($stmt_check) > 0) {
                        $emailExists = true;
                    }
                    mysqli_stmt_close($stmt_check);
                }
                mysqli_close($conn_check);
            }

            if ($emailExists) {
                $loginMessage = "Password yang Anda masukkan salah.";
            } else {
                // Jika koneksi ke DB gagal saat pemeriksaan atau email tidak ada
                 if (!$conn_check && !$emailExists){
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

/*
Untuk menampilkan pesan error di HTML Anda (di file yang sama jika tidak redirect,
atau simpan di session jika ingin ditampilkan setelah redirect di halaman lain):

Letakkan kode ini di dalam <body> HTML Anda, di tempat Anda ingin pesan muncul:
<?php if (!empty($loginMessage)): ?>
    <p style="color: red; text-align: center; margin-bottom: 10px;"><?php echo htmlspecialchars($loginMessage); ?></p>
<?php endif; ?>

Karena skrip ini melakukan redirect (header("Location: index.php");) saat login berhasil,
pesan sukses tidak akan ditampilkan di halaman login ini. Pesan error akan ditampilkan
jika login gagal.
*/
?>
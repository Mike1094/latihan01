<?php
class Register {
    private $emailUser;
    private $passwordUser;

    function __construct($emailUser, $passwordUser) {
        $this->emailUser = $emailUser;
        $this->passwordUser = $passwordUser; 
    }

    public function getEmailUser() {
        return $this->emailUser;
    }
    public function registerUser(): bool {
        $conn = mysqli_connect("localhost", "root", "", "teluhub");

        if (!$conn) {
            error_log("Connection failed: " . mysqli_connect_error());
            echo "Gagal terhubung ke database. Silakan coba lagi nanti.";
            return false;
        }

        // Pengecekan apakah email sudah pernah digunakan
        $sql_check_email = "SELECT idAkunPen FROM akunpen WHERE emailPen = ?";
        $stmt_check_email = mysqli_prepare($conn, $sql_check_email);

        if ($stmt_check_email) {
            mysqli_stmt_bind_param($stmt_check_email, "s", $this->emailUser);

            if (mysqli_stmt_execute($stmt_check_email)) {
                mysqli_stmt_store_result($stmt_check_email);
                if (mysqli_stmt_num_rows($stmt_check_email) > 0) {
                    mysqli_stmt_close($stmt_check_email);
                    mysqli_close($conn);
                    echo "Email sudah terdaftar. Gunakan email lain.";
                    return false;
                }
            }
            mysqli_stmt_close($stmt_check_email);
        }

        $sql = "INSERT INTO akunpen (emailPen, passwordPen) VALUES (?, ?)";


        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
echo "</pre>";
            $hashedPassword = password_hash($this->passwordUser, PASSWORD_DEFAULT);
            if ($hashedPassword === false) {
                echo "Error hashing password.";
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                return false;
            }
            mysqli_stmt_bind_param($stmt, "ss", $this->emailUser, $hashedPassword);

            if (mysqli_stmt_execute($stmt)) {
                echo "Pendaftaran berhasil!";
                echo "<br><a href='login.php'>Login</a>";
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                return true;
            } else {
                error_log("Error executing statement: " . mysqli_stmt_error($stmt));
                echo "Terjadi kesalahan saat pendaftaran. Error: " . mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                return false;
            }
        } else {
            error_log("Error preparing statement: " . mysqli_error($conn));
            echo "Terjadi kesalahan dalam persiapan query. Error: " . mysqli_error($conn);
            mysqli_close($conn);
            return false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password']) && !empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
        $emailUser = trim($_POST['email']);
        $passwordUser = $_POST['password'];
        if (!filter_var($emailUser, FILTER_VALIDATE_EMAIL)) {
            echo "Format email tidak valid.";
        } else {
            $akunPengguna = new Register($emailUser, $passwordUser);
            $akunPengguna->registerUser();
        }
    } else {
        echo "Email dan password tidak boleh kosong.";
    }
} else {
    // Bagian ini bisa Anda gunakan untuk menampilkan form HTML jika belum disubmit
    // atau biarkan kosong jika file ini murni untuk proses backend.
    echo "Form belum disubmit.";
}
?>

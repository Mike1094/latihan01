<?php
class Loginscript {
    private $emailUser;
    private $passwordUser;

    function __construct($emailUser, $passwordUser) {
        $this->emailUser = $emailUser;
        $this->passwordUser = $passwordUser; 
    }

    public function getEmailUser() {
        return $this->emailUser;
    }
    public function getPasswordUser() {
        return $this->passwordUser;
    }
    
    public function loginUser(): bool {
        $conn = mysqli_connect("localhost", "root", "", "teluhub");

        if (!$conn) {
            error_log("Connection failed: " . mysqli_connect_error());
            echo "Gagal terhubung ke database. Silakan coba lagi nanti.";
            return false;
        }

        $sql = "SELECT * FROM akunpen WHERE emailPen = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $this->emailUser);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                if (password_verify($this->passwordUser, $row['passwordPen'])) {
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    return true;
                } else {
                    echo "Password salah.";
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    return false;
                }
            } else {
                echo "Email tidak ditemukan.";
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

        $login = new Loginscript($emailUser, $passwordUser);
        if ($login->loginUser()) {
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Login gagal. Silakan coba lagi.";
        }
    } else {
        echo "Email dan password tidak boleh kosong.";
    }
}
?>
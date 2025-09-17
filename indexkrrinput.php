<?php
include("konek.php");
    if($conn->connect_error) {
        die("Koneksi gagal: ". $conn->connect_error);
    } else {
        $idkrr = $_POST["idkrr"];
        $nmkrr = $_POST["nmkrr"];
        $almtkrr = $_POST["almtKrr"];
        $nohpkrr = $_POST["nohpkrr"];
        $jk_krr = $_POST["jk_krr"];
        $idagen = $_POST["idagen"];

        $sql = "INSERT INTO kurir (idkrr, nmkrr, almtkrr, nohpkrr, jk_krr, idagen) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $idkrr, $nmkrr, $almtkrr, $nohpkrr, $jk_krr, $idagen);

        if($stmt->execute()) {
            print("<p>Data sudah dimasukkan!</p>");
            exit();
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }

    $conn->close();
?>
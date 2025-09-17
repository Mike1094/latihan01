<?php
include("konek.php");
    if($conn->connect_error) {
        die("Koneksi gagal: ". $conn->connect_error);
    } else {
        $idagen = $_POST["idagen"];
        $nmagen = $_POST["nmagen"];
        $almtagen = $_POST["almtagen"];
        $nohpagen = $_POST["nohpagen"];

        $sql = "INSERT INTO agen (idagen, nmagen, almtagen, nohpagen) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $idagen, $nmagen, $almtagen, $nohpagen);

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
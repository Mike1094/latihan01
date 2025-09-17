<?php
include("konek.php");
?>
<?php
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    $nama_paket = $_POST["nama_paket"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];

    $sql = "INSERT INTO paket (No resi,berat) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama_paket, $harga, $deskripsi);

    if ($stmt->execute()) {
        echo "<p>Data berhasil disimpan!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

$conn->close();
?>
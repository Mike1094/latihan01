<?php
include("konek.php");

// 1. Ambil data yang akan di-update (misalnya dari form)
// Anda memerlukan sebuah ID untuk klausa WHERE
$resi = $_POST['resi']; 
$nm = $_POST['nama'];
$waktu = $_POST['tanggal'];

// 2. Siapkan SQL Statement dengan klausa UPDATE, SET, dan WHERE
// Gunakan '?' sebagai placeholder untuk keamanan
$sql = "UPDATE paket SET nmpengambil = ?, wkt_diterima = ? WHERE noresi = ?";

// 3. Prepare statement
$stmt = $conn->prepare($sql);

if ($stmt) {
    // 4. Bind parameter ke placeholder
    // "ssi" berarti: String, String, Integer. Sesuaikan dengan tipe data kolom Anda.
    // Urutan variabel harus sama dengan urutan '?' pada query SQL.
    $stmt->bind_param("sss", $nm, $waktu, $resi);

    // 5. Eksekusi statement
    if ($stmt->execute()) {
        echo "<p>Data berhasil di-update!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    // 6. Tutup statement
    $stmt->close();
} else {
    echo "Error saat menyiapkan statement: " . $conn->error;
}

// 7. Tutup koneksi
$conn->close();

?>
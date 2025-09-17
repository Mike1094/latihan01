<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
$userId = $_SESSION['user_id'] ?? 'ID Tidak Ditemukan';
$userEmail = $_SESSION['user_email'] ?? 'Email Tidak Ditemukan';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kurir</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 p-10">

<?php if (isset($_COOKIE['username'])): ?>
<p class="mb-4">Cookie: Halo <?= htmlspecialchars($_COOKIE['username']) ?></p>
<?php endif; ?>

<a href="logout.php" class="mb-6 inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>

<h3 class="text-xl font-semibold mb-4">Tambah Kurir</h3>
<form method="post" action="indexkrrinput.php" class="mb-8 space-y-4 max-w-lg bg-white p-6 rounded shadow">
    <div>
        <label class="block font-semibold mb-1" for="idkrr">ID Kurir</label>
        <input type="text" id="idkrr" name="idkrr" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
    </div>

    <div>
        <label class="block font-semibold mb-1" for="nmkrr">Nama Kurir</label>
        <input type="text" id="nmkrr" name="nmkrr" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
    </div>

    <div>
        <label class="block font-semibold mb-1" for="almtKrr">Alamat Kurir</label>
        <input type="text" id="almtKrr" name="almtKrr" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
    </div>

    <div>
        <label class="block font-semibold mb-1" for="nohpkrr">No HP Kurir</label>
        <input type="text" id="nohp" name="nohpkrr" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
    </div>

    <div>
        <label class="block font-semibold mb-1" for="jk_krr">Jenis Kelamin Kurir</label>
        <select id="jk_krr" name="jk_krr" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div>
        <label class="block font-semibold mb-1" for="idagen">ID Agen</label>
        <input type="text" id="idagen" name="idagen" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
    </div>

    <button type="submit" name="tambah"
        class="bg-red-500 text-white px-6 py-3 rounded font-semibold hover:bg-red-600 transition">Tambah</button>
</form>

<h3 class="text-xl font-semibold mb-4">Daftar Kurir</h3>
<table class="w-full max-w-4xl border-collapse bg-white rounded shadow">
    <thead>
        <tr class="bg-red-500 text-white text-left">
            <th class="p-3">#</th>
            <th class="p-3">ID Kurir</th>
            <th class="p-3">Nama</th>
            <th class="p-3">Alamat</th>
            <th class="p-3">No HP</th>
            <th class="p-3">Jenis Kelamin</th>
            <th class="p-3">ID Agen</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_SESSION['kurir'])): ?>
            <?php foreach ($_SESSION['kurir'] as $index => $kurir): ?>
            <tr class="<?= $index % 2 == 0 ? 'bg-gray-100' : '' ?>">
                <td class="p-3"><?= $index + 1 ?></td>
                <td class="p-3"><?= htmlspecialchars($kurir['idkrr']) ?></td>
                <td class="p-3"><?= htmlspecialchars($kurir['nmkrr']) ?></td>
                <td class="p-3"><?= htmlspecialchars($kurir['almtKrr']) ?></td>
                <td class="p-3"><?= htmlspecialchars($kurir['nohp']) ?></td>
                <td class="p-3"><?= htmlspecialchars($kurir['jk_krr']) ?></td>
                <td class="p-3"><?= htmlspecialchars($kurir['idagen']) ?></td>
                <td class="p-3">
                    <a href="?hapus=<?= $index ?>" 
                       onclick="return confirm('Yakin ingin menghapus data kurir ini?')" 
                       class="text-red-600 hover:underline font-semibold">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="8" class="text-center p-4 text-gray-500">Belum ada data kurir.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>

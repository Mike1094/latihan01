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
    <title>Data Agen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 p-10">

<?php if (isset($_COOKIE['username'])): ?>
<?php endif; ?>

<a href="logout.php" class="mb-6 inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>

<h3 class="text-xl font-semibold mb-4">Tambah Agen</h3>
<form method="post" action="indexageninput.php" class="mb-8 space-y-4 max-w-lg bg-white p-6 rounded shadow">
    <div>
        <label class="block font-semibold mb-1" for="idkrr">ID Agen</label>
        <input type="text" id="idagen" name="idagen" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
    </div>

    <div>
        <label class="block font-semibold mb-1" for="nmagen">Nama Agen</label>
        <input type="text" id="nmagen" name="nmagen" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
    </div>

    <div>
        <label class="block font-semibold mb-1" for="almtagen">Alamat Agen</label>
        <input type="text" id="almtagen" name="almtagen" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
    </div>

    <div>
        <label class="block font-semibold mb-1" for="nohpagen">No HP Agen</label>
        <input type="text" id="nohp" name="nohpagen" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
    </div>

    <button type="submit" name="tambah"
        class="bg-red-500 text-white px-6 py-3 rounded font-semibold hover:bg-red-600 transition">Tambah</button>
</form>

<h3 class="text-xl font-semibold mb-4">Daftar Agen</h3>
<table class="w-full max-w-4xl border-collapse bg-white rounded shadow">
    <thead>
        <tr class="bg-red-500 text-white text-left">
            <th class="p-3">#</th>
            <th class="p-3">ID Agen</th>
            <th class="p-3">Nama Agen</th>
            <th class="p-3">Alamat Agen</th>
            <th class="p-3">No HP Agen</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_SESSION['agen'])): ?>
            <?php foreach ($_SESSION['agen'] as $index => $agen): ?>
            <tr class="<?= $index % 2 == 0 ? 'bg-gray-100' : '' ?>">
                <td class="p-3"><?= $index + 1 ?></td>
                <td class="p-3"><?= htmlspecialchars($agen['idagen']) ?></td>
                <td class="p-3"><?= htmlspecialchars($agen['nmagen']) ?></td>
                <td class="p-3"><?= htmlspecialchars($agen['almtagen']) ?></td>
                <td class="p-3"><?= htmlspecialchars($agen['nohpagen']) ?></td>
                <td class="p-3">
                    <a href="?hapus=<?= $index ?>" 
                       onclick="return confirm('Yakin ingin menghapus data agen ini?')" 
                       class="text-red-600 hover:underline font-semibold">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="8" class="text-center p-4 text-gray-500">Belum ada data agen.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>

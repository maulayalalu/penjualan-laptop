<?php 
include 'config.php'; 

// Logika Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM laptops WHERE id=$id");
    header("Location: data-laptop.php");
}

$query = mysqli_query($conn, "SELECT * FROM laptops");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Inventaris - Laptop Sales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex font-sans">
    <?php include 'components/sidebar.php'; ?>
    <div class="flex-1 flex flex-col">
        <?php include 'components/navbar.php'; ?>
        <main class="p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Data Inventaris Laptop</h2>
                <a href="tambah-laptop.php" class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-semibold shadow-md">+ Tambah Laptop</a>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-[10px] font-bold text-gray-400 uppercase">
                        <tr>
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Laptop & Merk</th>
                            <th class="px-6 py-4">Harga</th>
                            <th class="px-6 py-4">Stok</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs divide-y">
                        <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td class="px-6 py-4 text-gray-400">#<?= $row['kode_laptop'] ?></td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-800"><?= $row['nama_laptop'] ?></p>
                                <p class="text-[10px] text-gray-400"><?= $row['merk'] ?></p>
                            </td>
                            <td class="px-6 py-4 font-bold text-blue-600">Rp <?= number_format($row['harga']) ?></td>
                            <td class="px-6 py-4">
                                <span class="<?= $row['stok'] > 5 ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' ?> px-2 py-1 rounded font-bold">
                                    <?= $row['stok'] ?> Unit
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="tambah-laptop.php?edit=<?= $row['id'] ?>" class="text-blue-500">✏️</a>
                                <a href="data-laptop.php?hapus=<?= $row['id'] ?>" class="text-red-500" onclick="return confirm('Hapus data ini?')">🗑️</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
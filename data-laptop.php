<?php 
include 'config.php'; 

// Logika Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    // Gunakan prepared statement atau minimal mysqli_real_escape_string untuk keamanan
    mysqli_query($conn, "DELETE FROM laptops WHERE id=$id");
    header("Location: data-laptop.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM laptops ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Inventaris - A-LINKS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex font-sans">
    <?php include 'components/sidebar.php'; ?>
    
    <div class="flex-1 flex flex-col">
        <?php include 'components/navbar.php'; ?>
        
        <main class="p-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Data Inventaris Laptop</h2>
                    <p class="text-xs text-gray-500">Kelola stok dan spesifikasi perangkat</p>
                </div>
                <a href="tambah-laptop.php" class="bg-blue-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all">
                    + Tambah Laptop
                </a>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Kode</th>
                            <th class="px-6 py-4">Laptop & Merk</th>
                            <th class="px-6 py-4">Spesifikasi (RAM/Store)</th>
                            <th class="px-6 py-4">Harga</th>
                            <th class="px-6 py-4">Stok</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs divide-y divide-gray-50">
                        <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 text-gray-400 font-medium">#<?= $row['kode_laptop'] ?></td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-800"><?= $row['nama_laptop'] ?></p>
                                <p class="text-[10px] text-gray-400"><?= $row['merk'] ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-1">
                                    <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded text-[10px] font-bold"><?= $row['ram'] ?></span>
                                    <span class="bg-indigo-50 text-indigo-600 px-1.5 py-0.5 rounded text-[10px] font-bold"><?= $row['storage'] ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-700">Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                            <td class="px-6 py-4">
                                <span class="<?= $row['stok'] > 5 ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' ?> px-2 py-1 rounded-lg font-bold">
                                    <?= $row['stok'] ?> Unit
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-3">
                                    <a href="tambah-laptop.php?edit=<?= $row['id'] ?>" class="p-2 hover:bg-blue-50 rounded-lg transition-colors group" title="Edit">
                                        <span class="grayscale group-hover:grayscale-0">✏️</span>
                                    </a>
                                    <a href="data-laptop.php?hapus=<?= $row['id'] ?>" 
                                       class="p-2 hover:bg-red-50 rounded-lg transition-colors group" 
                                       onclick="return confirm('Yakin ingin menghapus laptop <?= $row['nama_laptop'] ?>?')" title="Hapus">
                                        <span class="grayscale group-hover:grayscale-0">🗑️</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                
                <?php if(mysqli_num_rows($query) == 0): ?>
                    <div class="p-12 text-center">
                        <p class="text-gray-400">Belum ada data laptop.</p>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>
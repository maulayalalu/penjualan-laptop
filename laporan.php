<?php 
include 'config.php'; 

// 1. Logika Filter Tanggal
$tgl_mulai = isset($_GET['tgl_mulai']) ? $_GET['tgl_mulai'] : date('Y-m-01'); // Default awal bulan
$tgl_sampai = isset($_GET['tgl_sampai']) ? $_GET['tgl_sampai'] : date('Y-m-d'); // Default hari ini

// 2. Query Ambil Data Penjualan (JOIN dengan tabel laptops untuk ambil nama laptop)
$query = "SELECT penjualan.*, laptops.nama_laptop, laptops.merk 
          FROM penjualan 
          JOIN laptops ON penjualan.id_laptop = laptops.id 
          WHERE tgl_transaksi BETWEEN '$tgl_mulai' AND '$tgl_sampai'
          ORDER BY tgl_transaksi DESC";
$sql = mysqli_query($conn, $query);

// 3. Hitung Ringkasan (Summary)
$q_sum = mysqli_query($conn, "SELECT SUM(total_bayar) as total_duit, SUM(jumlah_beli) as total_unit 
                              FROM penjualan 
                              WHERE tgl_transaksi BETWEEN '$tgl_mulai' AND '$tgl_sampai'");
$summary = mysqli_fetch_assoc($q_sum);
$total_pendapatan = $summary['total_duit'] ?? 0;
$total_unit = $summary['total_unit'] ?? 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan - A-LINKS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background-color: white !important; padding: 0 !important; }
            main { padding: 0 !important; max-height: none !important; overflow: visible !important; }
        }
    </style>
</head>
<body class="bg-gray-50 flex font-sans">
    <div class="no-print">
        <?php include 'components/sidebar.php'; ?>
    </div>

    <div class="flex-1 flex flex-col">
        <div class="no-print">
            <?php include 'components/navbar.php'; ?>
        </div>
        
        <main class="p-8 space-y-6 overflow-y-auto max-h-[calc(100vh-4rem)]">
            <div class="flex justify-between items-end">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Laporan Penjualan</h2>
                    <p class="text-sm text-gray-500">Periode: <?= date('d M Y', strtotime($tgl_mulai)) ?> s/d <?= date('d M Y', strtotime($tgl_sampai)) ?></p>
                </div>
                
                <form action="" method="GET" class="flex items-center space-x-3 text-xs no-print">
                    <div>
                        <label class="block text-[10px] font-semibold text-gray-400 mb-1 uppercase">Dari Tanggal</label>
                        <input type="date" name="tgl_mulai" value="<?= $tgl_mulai ?>" class="px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-gray-400 mb-1 uppercase">Sampai Tanggal</label>
                        <input type="date" name="tgl_sampai" value="<?= $tgl_sampai ?>" class="px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="flex space-x-2 mt-auto">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg font-bold hover:bg-black transition-colors">Filter</button>
                        <button type="button" onclick="window.print()" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow-sm flex items-center space-x-1 hover:bg-blue-700 transition-all">
                            <span>🖨️</span> <span>Cetak</span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase">Total Pendapatan</p>
                    <h3 class="text-3xl font-extrabold text-blue-600 mt-2">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase">Unit Terjual</p>
                    <h3 class="text-3xl font-extrabold text-gray-800 mt-2"><?= $total_unit ?> Unit</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase">Status Transaksi</p>
                    <h3 class="text-3xl font-extrabold text-green-600 mt-2">Berhasil</h3>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-gray-50 text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                            <th class="px-6 py-4">ID Transaksi</th>
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4">Produk</th>
                            <th class="px-6 py-4 text-center">Jumlah</th>
                            <th class="px-6 py-4">Total Harga</th>
                            <th class="px-6 py-4">Catatan</th>
                            <th class="px-6 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                        <?php if(mysqli_num_rows($sql) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($sql)): ?>
                            <tr>
                                <td class="px-6 py-4 font-mono text-blue-600 font-bold uppercase"><?= $row['id_transaksi'] ?></td>
                                <td class="px-6 py-4 text-gray-400"><?= date('d M Y', strtotime($row['tgl_transaksi'])) ?></td>
                                <td class="px-6 py-4">
                                    <p class="font-bold text-gray-800"><?= $row['nama_laptop'] ?></p>
                                    <p class="text-[10px] text-gray-400 uppercase"><?= $row['merk'] ?></p>
                                </td>
                                <td class="px-6 py-4 text-center"><?= $row['jumlah_beli'] ?></td>
                                <td class="px-6 py-4 font-bold text-gray-900">Rp <?= number_format($row['total_bayar'], 0, ',', '.') ?></td>
                                <td class="px-6 py-4 text-gray-400 italic text-[10px]"><?= $row['catatan'] ?: '-' ?></td>
                                <td class="px-6 py-4">
                                    <span class="bg-green-50 text-green-600 font-bold text-[10px] px-2 py-1 rounded-full border border-green-100 uppercase">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-gray-400 italic">Belum ada transaksi pada periode ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
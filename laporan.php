<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan - A-LINKS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* CSS Khusus Cetak */
        @media print {
            .no-print { display: none !important; }
            body { background-color: white !important; padding: 0 !important; }
            main { padding: 0 !important; max-height: none !important; overflow: visible !important; }
            .bg-white { border: none !important; shadow: none !important; }
            .rounded-2xl { border-radius: 0 !important; }
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
                    <p class="text-sm text-gray-500">Pantau performa penjualan dan ringkasan transaksi laptop Anda.</p>
                </div>
                <div class="flex items-center space-x-3 text-xs no-print">
                    <div>
                        <label class="block text-[10px] font-semibold text-gray-400 mb-1">Dari Tanggal</label>
                        <input type="date" class="px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-semibold text-gray-400 mb-1">Sampai Tanggal</label>
                        <input type="date" class="px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none">
                    </div>
                    <button onclick="window.print()" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg mt-auto shadow-sm flex items-center space-x-1 hover:bg-blue-700">
                        <span>🖨️</span> <span>Cetak Laporan</span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase">Total Pendapatan</p>
                    <h3 class="text-3xl font-extrabold text-blue-600 mt-2">Rp 85.000.000</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase">Unit Terjual</p>
                    <h3 class="text-3xl font-extrabold text-gray-800 mt-2">10 Unit</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase">Rata-rata/Hari</p>
                    <h3 class="text-3xl font-extrabold text-gray-800 mt-2">Rp 8.500K</h3>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center no-print">
                    <h3 class="font-bold text-gray-800 text-sm">Daftar Transaksi Terbaru</h3>
                    <div class="flex space-x-2">
                        <button class="p-2 border border-gray-200 rounded-lg text-xs">⚙️ Filter</button>
                    </div>
                </div>
                
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-gray-50 text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                            <th class="px-6 py-3">ID Transaksi</th>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Produk & Spek</th>
                            <th class="px-6 py-3">RAM</th>
                            <th class="px-6 py-3">Storage</th>
                            <th class="px-6 py-3">Total Harga</th>
                            <th class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                        <tr>
                            <td class="px-6 py-4 font-mono text-blue-600 font-bold">#TRX-00982</td>
                            <td class="px-6 py-4 text-gray-400">24 April 2026</td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-800">MacBook Air M2</p>
                                <p class="text-[10px] text-gray-400">Space Grey</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded font-bold">8GB</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 italic">SSD 256GB</td>
                            <td class="px-6 py-4 font-bold">Rp 15.000.000</td>
                            <td><span class="bg-green-50 text-green-600 font-bold text-[10px] px-2 py-0.5 rounded">SELESAI</span></td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 font-mono text-blue-600 font-bold">#TRX-00981</td>
                            <td class="px-6 py-4 text-gray-400">23 April 2026</td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-800">VivoBook 14</p>
                                <p class="text-[10px] text-gray-400">White </p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded font-bold">8GB</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 italic">SSD 512GB</td>
                            <td class="px-6 py-4 font-bold">Rp 7.000.000</td>
                            <td><span class="bg-green-50 text-green-600 font-bold text-[10px] px-2 py-0.5 rounded">SELESAI</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-mono text-blue-600 font-bold">#TRX-00983</td>
                            <td class="px-6 py-4 text-gray-400">25 April 2026</td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-800">IdeaPad Slim 3</p>
                                <p class="text-[10px] text-gray-400">White </p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded font-bold">8GB</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 italic">SSD 512GB</td>
                            <td class="px-6 py-4 font-bold">Rp 7.500.000</td>
                            <td><span class="bg-green-50 text-green-600 font-bold text-[10px] px-2 py-0.5 rounded">SELESAI</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-mono text-blue-600 font-bold">#TRX-00984</td>
                            <td class="px-6 py-4 text-gray-400">26 April 2026</td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-800">Aspire Lite 14</p>
                                <p class="text-[10px] text-gray-400">White </p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded font-bold">8GB</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 italic">SSD 512GB</td>
                            <td class="px-6 py-4 font-bold">Rp 6.500.000</td>
                            <td><span class="bg-green-50 text-green-600 font-bold text-[10px] px-2 py-0.5 rounded">SELESAI</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><title>Laporan Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex font-sans">
    <?php include 'components/sidebar.php'; ?>
    <div class="flex-1 flex flex-col">
        <?php include 'components/navbar.php'; ?>
        <main class="p-8 space-y-6 overflow-y-auto max-h-[calc(100vh-4rem)]">
            <div class="flex justify-between items-end">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Laporan Penjualan</h2>
                    <p class="text-sm text-gray-500">Pantau performa penjualan dan ringkasan transaksi laptop Anda.</p>
                </div>
                <div class="flex items-center space-x-3 text-xs">
                    <div><label class="block text-[10px] font-semibold text-gray-400 mb-1">Dari Tanggal</label><input type="text" placeholder="dd/mm/tttt" class="px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none"></div>
                    <div><label class="block text-[10px] font-semibold text-gray-400 mb-1">Sampai Tanggal</label><input type="text" placeholder="dd/mm/tttt" class="px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none"></div>
                    <button class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg mt-auto shadow-sm flex items-center space-x-1"><span>🖨️</span> <span>Cetak Laporan</span></button>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 flex flex-col justify-between shadow-sm relative overflow-hidden">
                    <p class="text-xs font-semibold text-gray-400">Total Pendapatan Keseluruhan</p>
                    <h3 class="text-3xl font-extrabold text-blue-600 mt-2">Rp 40.500.000</h3>
                    <div class="mt-4 text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-md inline-block w-max">▲ 12.5% <span class="font-normal text-gray-400 ml-1">vs bulan lalu</span></div>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 flex flex-col justify-between shadow-sm">
                    <p class="text-xs font-semibold text-gray-400">Total Laptop Terjual</p>
                    <h3 class="text-3xl font-extrabold text-gray-800 mt-2">50 Unit</h3>
                    <div class="mt-4 text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-md inline-block w-max">▲ 8.2% <span class="font-normal text-gray-400 ml-1">vs bulan lalu</span></div>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 flex flex-col justify-between shadow-sm">
                    <p class="text-xs font-semibold text-gray-400">Rata-rata Penjualan / Hari</p>
                    <h3 class="text-3xl font-extrabold text-gray-800 mt-2">Rp 4.500K</h3>
                    <div class="mt-4 text-[10px] font-semibold text-gray-500 bg-gray-50 px-2 py-0.5 rounded-md inline-block w-max">Tetap stabil</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 text-sm">Daftar Transaksi Terbaru</h3>
                    <div class="flex space-x-2"><button class="p-2 border border-gray-200 rounded-lg text-xs">⚙️ Filter</button><button class="p-2 border border-gray-200 rounded-lg text-xs">📥 Download</button></div>
                </div>
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-gray-50 text-[10px] font-bold text-gray-400 uppercase tracking-wider"><th class="px-6 py-3">ID Transaksi</th><th class="px-6 py-3">Tanggal</th><th class="px-6 py-3">Produk</th><th class="px-6 py-3">Qty</th><th class="px-6 py-3">Total Harga</th><th class="px-6 py-3">Status</th><th class="px-6 py-3 text-center">Aksi</th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                        <tr><td class="px-6 py-4 font-mono text-blue-600 font-bold">#TRX-00982</td><td class="px-6 py-4 text-gray-400">24 April 2026, 14:20</td><td class="px-6 py-4"><p class="font-bold text-gray-800">MacBook Pro M3 14"</p><p class="text-[10px] text-gray-400">Space Grey | 16GB RAM</p></td><td class="px-6 py-4 font-bold text-orange-500">1</td><td class="px-6 py-4 font-bold">Rp 30.999.000</td><td><span class="bg-green-50 text-green-600 font-bold text-[10px] px-2 py-0.5 rounded">SELESAI</span></td><td class="px-6 py-4 text-center"><a href="#" class="text-blue-600 hover:underline">Detail</a></td></tr>
                        <tr><td class="px-6 py-4 font-mono text-blue-600 font-bold">#TRX-00981</td><td class="px-6 py-4 text-gray-400">23 April 2026, 11:05</td><td class="px-6 py-4"><p class="font-bold text-gray-800">ASUS ROG Zephyrus G14</p><p class="text-[10px] text-gray-400">White | RTX 4060</p></td><td class="px-6 py-4 font-bold text-orange-500">2</td><td class="px-6 py-4 font-bold">Rp 37.999.000</td><td><span class="bg-green-50 text-green-600 font-bold text-[10px] px-2 py-0.5 rounded">SELESAI</span></td><td class="px-6 py-4 text-center"><a href="#" class="text-blue-600 hover:underline">Detail</a></td></tr>
                        <tr><td class="px-6 py-4 font-mono text-blue-600 font-bold">#TRX-00980</td><td class="px-6 py-4 text-gray-400">22 April 2026, 16:45</td><td class="px-6 py-4"><p class="font-bold text-gray-800">Lenovo Legion Slim 5</p><p class="text-[10px] text-gray-400">Grey | Ryzen 7</p></td><td class="px-6 py-4 font-bold text-orange-500">1</td><td class="px-6 py-4 font-bold">Rp 24.500.000</td><td><span class="bg-yellow-50 text-yellow-600 font-bold text-[10px] px-2 py-0.5 rounded">DIPROSES</span></td><td class="px-6 py-4 text-center"><a href="#" class="text-blue-600 hover:underline">Detail</a></td></tr>
                        <tr><td class="px-6 py-4 font-mono text-blue-600 font-bold">#TRX-00979</td><td class="px-6 py-4 text-gray-400">21 April 2026, 10:12</td><td class="px-6 py-4"><p class="font-bold text-gray-800">Dell XPS 13 Plus</p><p class="text-[10px] text-gray-400">Platinum | i7-13th Gen</p></td><td class="px-6 py-4 font-bold text-orange-500">1</td><td class="px-6 py-4 font-bold">Rp 37.599.000</td><td><span class="bg-green-50 text-green-600 font-bold text-[10px] px-2 py-0.5 rounded">SELESAI</span></td><td class="px-6 py-4 text-center"><a href="#" class="text-blue-600 hover:underline">Detail</a></td></tr>
                    </tbody>
                </table>
                <div class="bg-gray-50/50 px-6 py-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                    <span>Menampilkan 4 dari 450 transaksi</span>
                    <div class="flex space-x-1">
                        <button class="px-3 py-1.5 border border-gray-200 bg-white text-gray-400 rounded-lg font-medium cursor-not-allowed" disabled>Sebelumnya</button>
                        <button class="px-3 py-1.5 bg-blue-600 text-white rounded-lg font-medium">1</button>
                        <button class="px-3 py-1.5 border border-gray-200 bg-white text-gray-600 rounded-lg font-medium hover:bg-gray-50">2</button>
                        <button class="px-3 py-1.5 border border-gray-200 bg-white text-gray-600 rounded-lg font-medium hover:bg-gray-50">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><title>Dashboard - A-LINKS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex font-sans">
    <?php include 'components/sidebar.php'; ?>
    <div class="flex-1 flex flex-col">
        <?php include 'components/navbar.php'; ?>
        <main class="p-8 space-y-8 overflow-y-auto max-h-[calc(100vh-4rem)]">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Dashboard Overview</h2>
                <p class="text-sm text-gray-500">Pantau performa penjualan dan inventaris laptop secara real-time.</p>
            </div>
            
            <div class="grid grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 flex flex-col justify-between relative shadow-sm">
                    <div class="flex justify-between items-start"><span class="text-2xl p-2 bg-blue-50 rounded-xl">💻</span><span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-md">+2.5%</span></div>
                    <div class="mt-4"><p class="text-xs text-gray-400 font-medium">Total Model Laptop</p><p class="text-2xl font-bold text-gray-800 mt-1">50</p></div>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 flex flex-col justify-between relative shadow-sm">
                    <div class="flex justify-between items-start"><span class="text-2xl p-2 bg-orange-50 rounded-xl">📦</span><span class="text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-md">Stok Rendah</span></div>
                    <div class="mt-4"><p class="text-xs text-gray-400 font-medium">Total Stok Unit</p><p class="text-2xl font-bold text-gray-800 mt-1">500</p></div>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 flex flex-col justify-between relative shadow-sm">
                    <div class="flex justify-between items-start"><span class="text-2xl p-2 bg-green-50 rounded-xl">🛒</span><span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-md">+12%</span></div>
                    <div class="mt-4"><p class="text-xs text-gray-400 font-medium">Laptop Terjual</p><p class="text-2xl font-bold text-gray-800 mt-1">60</p></div>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 flex flex-col justify-between relative shadow-sm">
                    <div class="flex justify-between items-start"><span class="text-2xl p-2 bg-purple-50 rounded-xl">🪙</span><span class="text-xs font-semibold text-purple-600 bg-purple-50 px-2 py-1 rounded-md">Meningkat</span></div>
                    <div class="mt-4"><p class="text-xs text-gray-400 font-medium">Total Pendapatan (IDR)</p><p class="text-2xl font-bold text-gray-800 mt-1">350jt</p></div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-2 bg-white p-6 rounded-2xl border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <div><h3 class="font-bold text-gray-800">Analisis Penjualan Mingguan</h3><p class="text-xs text-gray-400">Data transaksi 7 hari terakhir</p></div>
                        <button class="text-xs border border-gray-200 rounded-lg px-3 py-1.5 font-medium text-gray-600">Minggu Ini ⬇️</button>
                    </div>
                    <div class="h-48 flex items-end justify-between px-4 pt-4 border-b border-gray-100">
                        <div class="w-10 bg-blue-200 rounded-t h-20"></div>
                        <div class="w-10 bg-blue-200 rounded-t h-28"></div>
                        <div class="w-10 bg-blue-200 rounded-t h-24"></div>
                        <div class="w-10 bg-blue-600 rounded-t h-40"></div>
                        <div class="w-10 bg-blue-200 rounded-t h-32"></div>
                        <div class="w-10 bg-blue-200 rounded-t h-20"></div>
                        <div class="w-10 bg-blue-200 rounded-t h-16"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-400 font-medium px-4 pt-2">
                        <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-gray-800">Transaksi Terkini</h3>
                            <a href="#" class="text-xs text-blue-600 font-medium hover:underline">Lihat Semua</a>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">💻</div>
                                    <div><p class="font-bold text-gray-800">MacBook Air M2</p><p class="text-gray-400 text-[10px]">ID Transaksi: #10522</p></div>
                                </div>
                                <div class="text-right"><p class="font-bold text-gray-800">Rp 19.9jt</p><p class="text-green-500 font-semibold text-[10px]">BERHASIL</p></div>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">💻</div>
                                    <div><p class="font-bold text-gray-800">Dell XPS 13</p><p class="text-gray-400 text-[10px]">ID Transaksi: #10521</p></div>
                                </div>
                                <div class="text-right"><p class="font-bold text-gray-800">Rp 24.2jt</p><p class="text-green-500 font-semibold text-[10px]">BERHASIL</p></div>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">💻</div>
                                    <div><p class="font-bold text-gray-800">Asus ROG Strix</p><p class="text-gray-400 text-[10px]">ID Transaksi: #10520</p></div>
                                </div>
                                <div class="text-right"><p class="font-bold text-gray-800">Rp 24.0jt</p><p class="text-orange-500 font-semibold text-[10px]">PENDING</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-2 bg-gradient-to-r from-blue-600 to-blue-700 p-6 rounded-2xl text-white flex justify-between items-center">
                    <div>
                        <h4 class="text-lg font-bold">Ingin menambah stok baru?</h4>
                        <p class="text-xs text-blue-100 mt-1">Dapatkan update harga terbaru dari distributor resmi untuk unit laptop generasi ke-14.</p>
                    </div>
                    <a href="tambah-laptop.php" class="bg-white text-blue-600 px-4 py-2 rounded-xl text-xs font-bold shadow-md whitespace-nowrap">Tambah Data Sekarang</a>
                </div>
                <div class="bg-blue-50 border border-blue-100 p-6 rounded-2xl flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-gray-800 text-sm">Laporan Bulanan Siap</h4>
                        <p class="text-xs text-gray-500 mt-1">Ringkasan performa bulan Mei telah disusun secara otomatis.</p>
                    </div>
                    <span class="text-3xl text-blue-300">📄</span>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
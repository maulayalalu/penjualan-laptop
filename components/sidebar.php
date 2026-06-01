<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between min-h-screen font-sans">
    <div class="p-6">
        <div class="mb-8">
            <h1 class="text-xl font-bold text-blue-600">A-LINKS</h1>
            <p class="text-xs text-gray-500 uppercase tracking-wider">Sistem Manajemen</p>
        </div>
        <nav class="space-y-1">
            <a href="dashboard.php" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg <?= $current_page == 'dashboard.php' ? 'bg-blue-50 text-blue-600 border border-blue-200 border-dashed' : 'text-gray-600 hover:bg-gray-50' ?>">
                <span class="mr-3">📊</span> Dashboard
            </a>
            <a href="data-laptop.php" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg <?= $current_page == 'data-laptop.php' ? 'bg-blue-50 text-blue-600 border border-blue-200 border-dashed' : 'text-gray-600 hover:bg-gray-50' ?>">
                <span class="mr-3">💻</span> Data Laptop
            </a>
            <a href="tambah-laptop.php" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg <?= $current_page == 'tambah-laptop.php' ? 'bg-blue-50 text-blue-600 border border-blue-200 border-dashed' : 'text-gray-600 hover:bg-gray-50' ?>">
                <span class="mr-3">➕</span> Tambah Laptop
            </a>
            <a href="penjualan.php" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg <?= $current_page == 'penjualan.php' ? 'bg-blue-50 text-blue-600 border border-blue-200 border-dashed' : 'text-gray-600 hover:bg-gray-50' ?>">
                <span class="mr-3">💵</span> Penjualan
            </a>
            <a href="laporan.php" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg <?= $current_page == 'laporan.php' ? 'bg-blue-50 text-blue-600 border border-blue-200 border-dashed' : 'text-gray-600 hover:bg-gray-50' ?>">
                <span class="mr-3">📈</span> Laporan
            </a>
        </nav>
    </div>
    
    <div class="p-4 border-t border-gray-100">
        <div class="flex items-center mb-4">
            <img class="h-9 w-9 rounded-full object-cover" src="c:\Users\MAULAYALALU\Downloads\rm8.png" alt="Admin">
            <div class="ml-3">
                <p class="text-sm font-semibold text-gray-700">Admin Utama</p>
                <p class="text-xs text-gray-500">Super Admin</p>
            </div>
        </div>
        <a href="index.php" class="flex items-center px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg border border-transparent hover:border-red-200 border-dashed">
            <span class="mr-3">🚪</span> Keluar
        </a>
    </div>
</div>
<div class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-8">
    <div class="w-96 relative">
        <form action="data-laptop.php" method="GET">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">🔍</span>
            <input type="text" 
                   name="cari" 
                   placeholder="Cari data penjualan atau laptop..." 
                   value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>"
                   class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </form>
    </div>

    <div class="flex items-center space-x-4">
        <button class="text-gray-500 hover:text-gray-700 relative">
            <span class="absolute -top-1 -right-1 bg-red-500 h-2 w-2 rounded-full border border-white"></span>
            🔔
        </button>
        <button class="text-gray-500 hover:text-gray-700">⚙️</button>
        <div class="h-6 w-px bg-gray-200"></div>
        <span class="text-sm font-medium text-gray-700">Admin Panel</span>
    </div>
</div>
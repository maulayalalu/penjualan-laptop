<?php 
include 'config.php'; 

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $ram = $_POST['ram'];        // Menangkap data RAM
    $storage = $_POST['storage']; // Menangkap data Storage
    $kode = "LPT-" . rand(100, 999);

    // Update query SQL untuk memasukkan ram dan storage
    $sql = "INSERT INTO laptops (kode_laptop, nama_laptop, merk, harga, stok, ram, storage, kondisi) 
            VALUES ('$kode', '$nama', '$merk', '$harga', '$stok', '$ram', '$storage', 'Baru')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: data-laptop.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Laptop - A-LINKS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex">
    <?php include 'components/sidebar.php'; ?>
    <div class="flex-1">
        <?php include 'components/navbar.php'; ?>
        <main class="p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Laptop Baru</h2>
            
            <form action="" method="POST" class="bg-white p-8 rounded-2xl border shadow-sm space-y-4 max-w-2xl">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Nama Laptop</label>
                    <input type="text" name="nama" required placeholder="Contoh: MacBook Air M2" class="w-full px-4 py-2 border rounded-lg text-xs outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Merk</label>
                        <select name="merk" class="w-full px-4 py-2 border rounded-lg text-xs outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Apple</option><option>Dell</option><option>ASUS</option><option>Lenovo</option><option>Acer</option><option>HP</option><option>Samsung</option><option>Microsoft</option>
                            <option>Huawei</option><option>Toshiba</option><option>MSI</option><option>Razer</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" required placeholder="0" class="w-full px-4 py-2 border rounded-lg text-xs outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">RAM</label>
                        <input type="text" name="ram" required placeholder="Contoh: 8GB / 16GB" class="w-full px-4 py-2 border rounded-lg text-xs outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Storage</label>
                        <input type="text" name="storage" required placeholder="Contoh: SSD 512GB" class="w-full px-4 py-2 border rounded-lg text-xs outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Stok Awal</label>
                    <input type="number" name="stok" required placeholder="0" class="w-full px-4 py-2 border rounded-lg text-xs outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex gap-2 pt-2">
                    <button type="submit" name="simpan" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-xs font-bold shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all">
                        Simpan Laptop
                    </button>
                    <a href="data-laptop.php" class="bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-gray-200 transition-all">
                        Batal
                    </a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
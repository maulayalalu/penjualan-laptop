<?php 
include 'config.php'; 

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kode = "LPT-" . rand(100, 999);

    $sql = "INSERT INTO laptops (kode_laptop, nama_laptop, merk, harga, stok, kondisi) 
            VALUES ('$kode', '$nama', '$merk', '$harga', '$stok', 'Baru')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: data-laptop.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Laptop</title>
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
                    <input type="text" name="nama" required class="w-full px-4 py-2 border rounded-lg text-xs outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Merk</label>
                        <select name="merk" class="w-full px-4 py-2 border rounded-lg text-xs">
                            <option>Apple</option><option>Dell</option><option>Asus</option><option>Lenovo</option><option>Acer</option><option>HP</option><option>AXIOO</option><option>AVITA</option><option>ZREX</option>
                            <option>HUWAWEI</option><option>INFINIX</option><option>XIOMI</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" required class="w-full px-4 py-2 border rounded-lg text-xs outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Stok Awal</label>
                    <input type="number" name="stok" required class="w-full px-4 py-2 border rounded-lg text-xs outline-none">
                </div>
                <div class="flex gap-2">
                    <button type="submit" name="simpan" class="bg-blue-600 text-white px-6 py-2 rounded-xl text-xs font-bold shadow-md hover:bg-blue-700">Simpan Laptop</button>
                    <a href="data-laptop.php" class="bg-gray-100 text-gray-600 px-6 py-2 rounded-xl text-xs font-bold">Batal</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
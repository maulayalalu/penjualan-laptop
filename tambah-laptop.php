<?php 
include 'config.php'; 

$id = "";
$nama = "";
$merk = "";
$harga = "";
$stok = "";
$ram = "";
$storage = "";
$is_edit = false;

// 1. CEK JIKA SEDANG MODE EDIT
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $is_edit = true;
    $result = mysqli_query($conn, "SELECT * FROM laptops WHERE id=$id");
    while($row = mysqli_fetch_assoc($result)) {
        $nama = $row['nama_laptop'];
        $merk = $row['merk'];
        $harga = $row['harga'];
        $stok = $row['stok'];
        $ram = $row['ram'];
        $storage = $row['storage'];
    }
}

// 2. LOGIKA SIMPAN (TAMBAH ATAU UPDATE)
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];

    if ($is_edit) {
        // Logika UPDATE
        $sql = "UPDATE laptops SET 
                nama_laptop='$nama', merk='$merk', harga='$harga', 
                stok='$stok', ram='$ram', storage='$storage' 
                WHERE id=$id";
    } else {
        // Logika INSERT
        $kode = "LPT-" . rand(100, 999);
        $sql = "INSERT INTO laptops (kode_laptop, nama_laptop, merk, harga, stok, ram, storage, kondisi) 
                VALUES ('$kode', '$nama', '$merk', '$harga', '$stok', '$ram', '$storage', 'Baru')";
    }
    
    if (mysqli_query($conn, $sql)) {
        header("Location: data-laptop.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $is_edit ? 'Edit' : 'Tambah' ?> Laptop - A-LINKS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex">
    <?php include 'components/sidebar.php'; ?>
    <div class="flex-1">
        <?php include 'components/navbar.php'; ?>
        <main class="p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6"><?= $is_edit ? 'Edit Data' : 'Tambah Laptop Baru' ?></h2>
            
            <form action="" method="POST" class="bg-white p-8 rounded-2xl border shadow-sm space-y-4 max-w-2xl">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Nama Laptop</label>
                    <input type="text" name="nama" value="<?= $nama ?>" required class="w-full px-4 py-2 border rounded-lg text-xs outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Merk</label>
                        <select name="merk" class="w-full px-4 py-2 border rounded-lg text-xs outline-none">
                            <?php 
                            $brands = ["Acer", "ASUS", "Apple", "Dell", "Fujitsu", "Gigabyte", "HP (Hewlett-Packard)", "Huawei", "LG", "Lenovo", "Microsoft", "MSI", "Razer", "Samsung", "Toshiba"];
                            foreach($brands as $b) {
                                $selected = ($merk == $b) ? "selected" : "";
                                echo "<option value='$b' $selected>$b</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" value="<?= $harga ?>" required class="w-full px-4 py-2 border rounded-lg text-xs outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">RAM</label>
                        <input type="text" name="ram" value="<?= $ram ?>" required placeholder="Contoh: 16GB" class="w-full px-4 py-2 border rounded-lg text-xs outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Storage</label>
                        <input type="text" name="storage" value="<?= $storage ?>" required placeholder="Contoh: SSD 512GB" class="w-full px-4 py-2 border rounded-lg text-xs outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Stok</label>
                    <input type="number" name="stok" value="<?= $stok ?>" required class="w-full px-4 py-2 border rounded-lg text-xs outline-none">
                </div>

                <div class="flex gap-2 pt-2">
                    <button type="submit" name="simpan" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-xs font-bold shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all">
                        <?= $is_edit ? 'Simpan Perubahan' : 'Simpan Laptop' ?>
                    </button>
                    <a href="data-laptop.php" class="bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-gray-200">Batal</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
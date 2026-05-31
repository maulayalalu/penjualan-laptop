<?php 
include 'config.php'; 

// Ambil data laptop untuk dropdown
$laptops = mysqli_query($conn, "SELECT * FROM laptops WHERE stok > 0");

// Logika Simpan Transaksi
if (isset($_POST['simpan_transaksi'])) {
    $id_laptop = $_POST['id_laptop'];
    $tgl = $_POST['tgl'];
    $qty = $_POST['qty'];
    $catatan = $_POST['catatan'];
    $id_trx = "TRX-" . rand(1000, 9999);

    // Ambil harga laptop
    $data_lpt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga, stok FROM laptops WHERE id=$id_laptop"));
    $total = $data_lpt['harga'] * $qty;

    if ($data_lpt['stok'] >= $qty) {
        // 1. Simpan ke tabel penjualan
        mysqli_query($conn, "INSERT INTO penjualan (id_transaksi, id_laptop, tgl_transaksi, jumlah_beli, total_bayar, catatan) 
                            VALUES ('$id_trx', '$id_laptop', '$tgl', '$qty', '$total', '$catatan')");
        
        // 2. Kurangi stok laptop di tabel laptops
        mysqli_query($conn, "UPDATE laptops SET stok = stok - $qty WHERE id=$id_laptop");
        
        header("Location: penjualan.php?status=sukses");
    } else {
        echo "<script>alert('Stok tidak cukup!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penjualan - Laptop Sales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex">
    <?php include 'components/sidebar.php'; ?>
    <div class="flex-1">
        <?php include 'components/navbar.php'; ?>
        <main class="p-8">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-2 bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                    <h2 class="text-xl font-bold mb-2">Input Transaksi Baru</h2>
                    <p class="text-xs text-gray-400 mb-6">Silakan lengkapi detail penjualan laptop di bawah ini.</p>
                    
                    <form action="" method="POST" class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold mb-1">Pilih Unit Laptop</label>
                                <select name="id_laptop" required class="w-full p-2.5 border rounded-xl text-xs outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Pilih Laptop...</option>
                                    <?php while($l = mysqli_fetch_assoc($laptops)): ?>
                                        <option value="<?= $l['id'] ?>"><?= $l['nama_laptop'] ?> (Stok: <?= $l['stok'] ?>)</option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold mb-1">Tanggal Transaksi</label>
                                <input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="w-full p-2.5 border rounded-xl text-xs outline-none">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold mb-1">Jumlah Beli</label>
                                <input type="number" name="qty" min="1" value="1" class="w-full p-2.5 border rounded-xl text-xs outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold mb-1">Harga Satuan</label>
                                <input type="text" disabled placeholder="Otomatis" class="w-full p-2.5 bg-gray-50 border rounded-xl text-xs">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold mb-1">Catatan Tambahan (Opsional)</label>
                            <textarea name="catatan" class="w-full p-2.5 border rounded-xl text-xs outline-none" rows="3"></textarea>
                        </div>

                        <div class="flex gap-2 pt-4">
                            <button type="reset" class="px-6 py-2.5 border rounded-xl text-xs font-bold">Batal</button>
                            <button type="submit" name="simpan_transaksi" class="flex-1 bg-blue-600 text-white py-2.5 rounded-xl text-xs font-bold shadow-lg shadow-blue-100">💾 Simpan Transaksi</button>
                        </div>
                    </form>
                </div>

                <div class="space-y-4">
                    <div class="bg-blue-600 p-6 rounded-2xl text-white shadow-xl relative overflow-hidden">
                        <div class="relative z-10">
                            <p class="text-[10px] font-bold opacity-80 uppercase tracking-widest">Total Pembayaran</p>
                            <h3 class="text-4xl font-extrabold mt-2">Rp 0</h3>
                            <div class="mt-4 pt-4 border-t border-blue-400 text-[10px] flex justify-between">
                                <span>PPN (11%)</span>
                                <span class="font-bold">Rp 0</span>
                            </div>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-10 text-8xl">💳</div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
// Data laptop dari PHP ke JavaScript
const laptopData = {
    <?php 
    mysqli_data_seek($laptops, 0); // Reset pointer data
    while($l = mysqli_fetch_assoc($laptops)) {
        echo "'{$l['id']}': {harga: {$l['harga']}},";
    }
    ?>
};
const selectLaptop = document.querySelector('select[name="id_laptop"]');
const inputQty = document.querySelector('input[name="qty"]');
const displayHarga = document.querySelector('input[placeholder="Otomatis"]');
const displayTotal = document.querySelector('h3.text-4xl');

function hitungTotal() {
    const id = selectLaptop.value;
    const qty = inputQty.value;
    
    if (id && laptopData[id]) {
        const harga = laptopData[id].harga;
        const total = harga * qty;
        
        // Update tampilan harga satuan
        displayHarga.value = "Rp " + new Intl.NumberFormat('id-ID').format(harga);
        
        // Update tampilan total bayar (Besar)
        displayTotal.innerText = "Rp " + new Intl.NumberFormat('id-ID').format(total);
    } else {
        displayHarga.value = "";
        displayTotal.innerText = "Rp 0";
    }
}

// Jalankan fungsi saat laptop dipilih atau jumlah diubah
selectLaptop.addEventListener('change', hitungTotal);
inputQty.addEventListener('input', hitungTotal);
</script>
</body>
</html>
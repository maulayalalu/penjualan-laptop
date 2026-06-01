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
    $status_default = "BERHASIL"; // Sesuaikan dengan database kamu

    // Ambil harga laptop
    $query_lpt = mysqli_query($conn, "SELECT harga, stok FROM laptops WHERE id=$id_laptop");
    $data_lpt = mysqli_fetch_assoc($query_lpt);
    $total = $data_lpt['harga'] * $qty;

    if ($data_lpt['stok'] >= $qty) {
        // 1. Simpan ke tabel penjualan (Menambahkan kolom status agar sesuai database)
        $sql_ins = "INSERT INTO penjualan (id_transaksi, id_laptop, tgl_transaksi, jumlah_beli, total_bayar, catatan, status) 
                    VALUES ('$id_trx', '$id_laptop', '$tgl', '$qty', '$total', '$catatan', '$status_default')";
        
        if (mysqli_query($conn, $sql_ins)) {
            // 2. Kurangi stok laptop di tabel laptops
            mysqli_query($conn, "UPDATE laptops SET stok = stok - $qty WHERE id=$id_laptop");
            header("Location: penjualan.php?status=sukses");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Stok tidak cukup!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penjualan - A-LINKS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex font-sans">
    <?php include 'components/sidebar.php'; ?>
    <div class="flex-1 flex flex-col">
        <?php include 'components/navbar.php'; ?>
        <main class="p-8">
            <?php if(isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 text-xs font-bold rounded-r-xl">
                    ✅ Transaksi Berhasil Disimpan! Data stok telah diperbarui.
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-2 bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                    <h2 class="text-xl font-bold mb-2 text-gray-800">Input Transaksi Baru</h2>
                    <p class="text-[10px] text-gray-400 mb-6 uppercase tracking-wider font-bold">Detail Penjualan Laptop</p>
                    
                    <form action="" method="POST" class="space-y-5">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold mb-1.5 text-gray-500 uppercase">Pilih Unit Laptop</label>
                                <select name="id_laptop" id="select_laptop" required class="w-full p-3 border border-gray-200 rounded-xl text-xs outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50/30">
                                    <option value="">Pilih Laptop...</option>
                                    <?php 
                                    mysqli_data_seek($laptops, 0);
                                    while($l = mysqli_fetch_assoc($laptops)): 
                                    ?>
                                        <option value="<?= $l['id'] ?>"><?= $l['nama_laptop'] ?> (Stok: <?= $l['stok'] ?>)</option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold mb-1.5 text-gray-500 uppercase">Tanggal Transaksi</label>
                                <input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="w-full p-3 border border-gray-200 rounded-xl text-xs outline-none bg-gray-50/30">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold mb-1.5 text-gray-500 uppercase">Jumlah Beli</label>
                                <input type="number" name="qty" id="input_qty" min="1" value="1" class="w-full p-3 border border-gray-200 rounded-xl text-xs outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold mb-1.5 text-gray-500 uppercase">Harga Satuan</label>
                                <input type="text" id="display_harga_satuan" disabled placeholder="Otomatis" class="w-full p-3 bg-gray-100 border border-gray-200 rounded-xl text-xs font-bold text-gray-600">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold mb-1.5 text-gray-500 uppercase">Catatan Tambahan</label>
                            <textarea name="catatan" class="w-full p-3 border border-gray-200 rounded-xl text-xs outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="Contoh: Pembayaran Cash, Bonus Mouse, dll."></textarea>
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button type="reset" class="px-8 py-3 border border-gray-200 rounded-xl text-xs font-bold text-gray-500 hover:bg-gray-50 transition-colors">Batal</button>
                            <button type="submit" name="simpan_transaksi" class="flex-1 bg-blue-600 text-white py-3 rounded-xl text-xs font-bold shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all">💾 Simpan Transaksi</button>
                        </div>
                    </form>
                </div>

                <div class="space-y-4">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 rounded-2xl text-white shadow-xl relative overflow-hidden h-fit">
                        <div class="relative z-10">
                            <p class="text-[10px] font-bold opacity-70 uppercase tracking-widest">Total Pembayaran</p>
                            <h3 id="display_total_besar" class="text-3xl font-extrabold mt-2">Rp 0</h3>
                            <div class="mt-6 pt-4 border-t border-blue-400/50 text-[10px] flex justify-between">
                                <span class="opacity-70 font-medium">Estimasi PPN (11%)</span>
                                <span id="display_ppn" class="font-bold">Rp 0</span>
                            </div>
                        </div>
                        <div class="absolute -right-6 -bottom-6 opacity-10 text-9xl">💳</div>
                    </div>
                </div>
            </div>
        </main>
    </div>

<script>
const laptopData = {
    <?php 
    mysqli_data_seek($laptops, 0);
    while($l = mysqli_fetch_assoc($laptops)) {
        echo "'{$l['id']}': {harga: {$l['harga']}},";
    }
    ?>
};

const selectLaptop = document.getElementById('select_laptop');
const inputQty = document.getElementById('input_qty');
const displayHarga = document.getElementById('display_harga_satuan');
const displayTotal = document.getElementById('display_total_besar');
const displayPPN = document.getElementById('display_ppn');

function hitungTotal() {
    const id = selectLaptop.value;
    const qty = parseInt(inputQty.value) || 0;
    
    if (id && laptopData[id]) {
        const harga = laptopData[id].harga;
        const subtotal = harga * qty;
        const ppn = subtotal * 0.11;
        const totalAkhir = subtotal + ppn;
        
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });
        
        displayHarga.value = formatter.format(harga);
        displayTotal.innerText = formatter.format(totalAkhir);
        displayPPN.innerText = formatter.format(ppn);
    } else {
        displayHarga.value = "";
        displayTotal.innerText = "Rp 0";
        displayPPN.innerText = "Rp 0";
    }
}

selectLaptop.addEventListener('change', hitungTotal);
inputQty.addEventListener('input', hitungTotal);
</script>
</body>
</html>
<?php
include 'config.php';

if (isset($_POST['bayar'])) {
    // 1. Ambil data dari form penjualan
    $id_laptop   = mysqli_real_escape_string($conn, $_POST['id_laptop']);
    $qty_beli    = mysqli_real_escape_string($conn, $_POST['qty']);
    $total_bayar = mysqli_real_escape_string($conn, $_POST['total_harga']);
    $tgl_transaksi = date('Y-m-d H:i:s');
    $trx_id      = "TRX-" . rand(10000, 99999); // Generate ID Transaksi acak

    // 2. Cek stok saat ini dulu (jangan sampai jual lebih dari stok yang ada)
    $cek_stok = mysqli_query($conn, "SELECT stok, nama_laptop FROM laptops WHERE id = '$id_laptop'");
    $data_laptop = mysqli_fetch_assoc($cek_stok);
    $stok_sekarang = $data_laptop['stok'];

    if ($stok_sekarang < $qty_beli) {
        echo "<script>alert('Stok tidak cukup! Sisa stok: $stok_sekarang'); window.history.back();</script>";
        exit;
    }

    // 3. MULAI TRANSAKSI (Gunakan Multi-Query)
    
    // Simpan ke tabel penjualan
    $query_jual = "INSERT INTO penjualan (id_transaksi, id_laptop, qty, total_bayar, tanggal, status) 
                   VALUES ('$trx_id', '$id_laptop', '$qty_beli', '$total_bayar', '$tgl_transaksi', 'SELESAI')";

    if (mysqli_query($conn, $query_jual)) {
        
        // 4. OTOMATIS KURANGI STOK DI TABEL LAPTOPS
        // Ini yang bikin "Total Stok Unit" di Dashboard berkurang
        $query_update_stok = "UPDATE laptops SET stok = stok - $qty_beli WHERE id = '$id_laptop'";
        mysqli_query($conn, $query_update_stok);

        // Redirect ke laporan atau dashboard
        header("Location: laporan-laptop.php?status=sukses");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
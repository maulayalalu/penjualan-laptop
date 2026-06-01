<?php
session_start();
$error = "";

// Logika Login Lengkap
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 1. Validasi Username
    if ($username === "laya") {
        // 2. Validasi Password jika Username Benar
        if ($password === "123456789") {
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password yang Anda masukkan salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - A-LINKS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Efek getar saat salah input */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        .shake { animation: shake 0.2s ease-in-out 0s 2; }
    </style>
</head>
<body class="bg-gradient-to-tr from-blue-50 to-indigo-100 min-h-screen flex flex-col justify-between items-center py-12 font-sans">
    
    <div class="bg-white p-8 rounded-2xl shadow-xl w-[440px] border border-gray-100 text-center mt-auto">
        <!-- Logo Aplikasi -->
        <div class="inline-flex items-center justify-center p-3 bg-blue-600 rounded-xl text-white mb-4 shadow-md shadow-blue-200">
            💻
        </div>
        <h2 class="text-2xl font-bold text-gray-800">A-LINKS</h2>
        <p class="text-sm text-gray-500 mt-1 mb-6">Sistem Manajemen Penjualan Terintegrasi</p>
        
        <!-- Peringatan Error (Username / Password Salah) -->
        <?php if ($error) : ?>
            <div class="shake bg-red-50 border-l-4 border-red-500 text-red-700 p-3 mb-4 rounded-lg text-left">
                <p class="text-xs font-bold">⚠️ <?= $error; ?></p>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="text-left space-y-4">
            <!-- Kolom Username -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
                <input type="text" name="username" 
                       value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : 'laya' ?>" 
                       required 
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <!-- Kolom Password -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    
                    <!-- Tombol Tukar Gambar Mata -->
                    <button type="button" id="togglePassword" class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 flex items-center justify-center">
                        <img id="eyeIcon" src="eye1-removebg-preview.png" alt="Tampilkan" class="w-5 h-5 object-contain opacity-50 hover:opacity-100 transition-opacity">
                    </button>
                </div>
            </div>

            <!-- Fitur Ingat Saya & Lupa Password -->
            <div class="flex items-center justify-between text-xs text-gray-500 pt-1">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" class="mr-2 rounded border-gray-300"> Ingat saya
                </label>
                <a href="#" class="text-blue-600 hover:underline">Lupa password?</a>
            </div>

            <!-- Tombol Submit (Jarak mt-8 Agar Lebih Kebawah) -->
            <button type="submit" class="w-full mt-8 bg-blue-600 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all flex items-center justify-center gap-2">
                Masuk ke Dashboard ➡️
            </button>
        </form>
    </div>
    
    <!-- Footer Halaman -->
    <div class="mt-auto text-center text-xs text-gray-400 space-y-2">
        <div class="space-x-3 text-gray-500">
            <a href="#" class="hover:text-blue-600">Bantuan</a> 
            <span>•</span> 
            <a href="#" class="hover:text-blue-600">Kebijakan Privasi</a>
        </div>
        <p>© 2026 A-LINKS. All rights reserved.</p>
    </div>

    <!-- JavaScript untuk Menukar Gambar Mata Terbuka/Tertutup -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function () {
            // Cek status input saat ini
            const isPassword = passwordField.getAttribute('type') === 'password';
            
            // Tukar tipe input text/password
            passwordField.setAttribute('type', isPassword ? 'text' : 'password');
            
            // Ganti source gambar berdasarkan kondisi
            if (isPassword) {
                eyeIcon.src = 'eye-removebg-preview.png'; // Menggunakan file gambar tertutup milikmu
                eyeIcon.alt = 'Sembunyikan';
            } else {
                eyeIcon.src = 'eye1-removebg-preview.png'; // Kembali menggunakan file gambar terbuka
                eyeIcon.alt = 'Tampilkan';
            }
        });
    </script>

</body>
</html>
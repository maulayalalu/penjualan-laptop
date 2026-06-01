<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - A-LINKS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-tr from-blue-50 to-indigo-100 min-h-screen flex flex-col justify-between items-center py-12">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-[440px] border border-gray-100 text-center mt-auto">
        <div class="inline-flex items-center justify-center p-3 bg-blue-600 rounded-xl text-white mb-4 shadow-md shadow-blue-200">
            💻
        </div>
        <h2 class="text-2xl font-bold text-gray-800">A-LINKS</h2>
        <p class="text-sm text-gray-500 mt-1 mb-6">Sistem Manajemen Penjualan Terintegrasi</p>
        
        <form action="dashboard.php" method="POST" class="text-left space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"></span>
                    <input type="text" value="laya" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>
            <div>
                <div class="relative">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input type="password" id="password" value="admin" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                    <button type="button" id="togglePassword" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">👁️</button>
                </div>
            </div>
            <div class="flex items-center justify-between text-xs text-gray-500 pt-1">
                <label class="flex items-center"><input type="checkbox" class="mr-2 rounded border-gray-300"> Ingat saya</label>
                <a href="#" class="text-blue-600 hover:underline">Lupa password?</a>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-200 shadow-lg shadow-blue-200 flex items-center justify-center space-x-2">
                <span>Masuk ke Dashboard</span> ➡️
            </button>
        </form>
    </div>
    
    <div class="mt-auto text-center text-xs text-gray-400 space-y-1">
        <div class="space-x-3 text-gray-500"><a href="#">Bantuan</a> <span>•</span> <a href="#">Kebijakan Privasi</a></div>
    </div>

    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        // Balikkan tipe input: jika password jadi text, jika text jadi password
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Opsional: Ubah icon saat diklik (misal mata terbuka jadi mata tertutup)
        this.textContent = type === 'password' ? '👁️' : '🙈';
    });
</script>

</body>
</html>
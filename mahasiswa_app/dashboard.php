<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: auth/login.php");
    exit;
}

include 'config/database.php';

// Hitung statistik
$stats_mahasiswa = $conn->query("SELECT COUNT(*) as total FROM mahasiswa")->fetch_assoc();
$stats_users = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aplikasi Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Aplikasi Mahasiswa</h1>
            <div>
                <span class="text-gray-700 mr-4">Halo, <strong><?= htmlspecialchars($_SESSION['nama'] ?? 'User') ?></strong></span>
                <a href="auth/logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang!</h2>
            <p class="text-gray-600 text-lg">Kelola data mahasiswa dengan mudah dan cepat.</p>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-md p-6 text-white">
                <h3 class="text-lg font-semibold mb-2">Total Mahasiswa</h3>
                <p class="text-4xl font-bold"><?= $stats_mahasiswa['total'] ?></p>
            </div>
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-md p-6 text-white">
                <h3 class="text-lg font-semibold mb-2">Total Pengguna</h3>
                <p class="text-4xl font-bold"><?= $stats_users['total'] ?></p>
            </div>
        </div>

        <!-- Menu Navigasi -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Menu Utama</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="mahasiswa/index.php" class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg text-center transition">
                    📚 Kelola Data Mahasiswa
                </a>
                <a href="auth/logout.php" class="block bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg text-center transition">
                    🚪 Logout
                </a>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-6 mt-8">
        <p>&copy; 2026 - Karimah Irsyadiyah.</p>
    </footer>
</body>
</html>
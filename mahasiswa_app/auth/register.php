<?php
session_start();
include '../config/database.php';

if(isset($_SESSION['user'])){
    header("Location: ../dashboard.php");
    exit;
}

$error = "";
$success = "";

if(isset($_POST['register'])){
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // VALIDASI
    if(empty($nama) || empty($email) || empty($password) || empty($confirm_password)){
        $error = "Semua field wajib diisi!";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Format email tidak valid!";
    } elseif($password !== $confirm_password){
        $error = "Password tidak cocok!";
    } elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)){
        $error = "Password minimal 8 karakter, mengandung huruf besar, huruf kecil, dan angka!";
    } else {
        // Cek email sudah ada
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0){
            $error = "Email sudah terdaftar!";
        } else {
            // Insert user baru
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (nama, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama, $email, $hash);
            
            if($stmt->execute()){
                $success = "Registrasi berhasil! Silahkan login.";
                // Redirect setelah 2 detik
                header("refresh:2;url=login.php");
            } else {
                $error = "Terjadi kesalahan saat registrasi!";
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Aplikasi Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-blue-600 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl p-8 w-96">
        <h2 class="text-3xl font-bold text-center mb-8 text-blue-600">Daftar</h2>
        
        <?php if($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <?php if($success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" 
                    value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" placeholder="Masukkan email" 
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" placeholder="Min 8 karakter (besar, kecil, angka)"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="text-xs text-gray-500 mt-1">Minimal 8 karakter, mengandung huruf besar, huruf kecil, dan angka</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                <input type="password" name="confirm_password" placeholder="Ulangi password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <button type="submit" name="register" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Daftar
            </button>
        </form>
        
        <p class="text-center mt-6 text-gray-600">
            Sudah punya akun? <a href="login.php" class="text-blue-600 font-semibold hover:underline">Login di sini</a>
        </p>
    </div>
</body>
</html>
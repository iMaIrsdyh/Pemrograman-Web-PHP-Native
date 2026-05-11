<?php
session_start();
include '../config/database.php';

if(isset($_SESSION['user'])){
    header("Location: ../dashboard.php");
    exit;
}

$error = "";

if(isset($_POST['login'])){
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if(empty($email) || empty($password)){
        $error = "Email dan password harus diisi!";
    } else {
        // Gunakan prepared statement untuk keamanan
        $stmt = $conn->prepare("SELECT id, nama, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if($data && password_verify($password, $data['password'])){
            $_SESSION['user'] = $data['id'];
            $_SESSION['nama'] = $data['nama'];
            header("Location: ../dashboard.php");
            exit;
        } else {
            $error = "Email atau password salah!";
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
    <title>Login - Aplikasi Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-blue-600 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl p-8 w-96">
        <h2 class="text-3xl font-bold text-center mb-8 text-blue-600">Login</h2>
        
        <?php if($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" placeholder="Masukkan email" 
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" placeholder="Masukkan password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <button type="submit" name="login" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Login
            </button>
        </form>
        
        <p class="text-center mt-6 text-gray-600">
            Belum punya akun? <a href="register.php" class="text-blue-600 font-semibold hover:underline">Daftar di sini</a>
        </p>
    </div>
</body>
</html>
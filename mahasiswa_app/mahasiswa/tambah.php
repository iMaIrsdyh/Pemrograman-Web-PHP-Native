<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/database.php';

$error = "";
$success = "";

if(isset($_POST['tambah'])){
    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $jurusan = trim($_POST['jurusan'] ?? '');
    $angkatan = $_POST['angkatan'] ?? '';

    // VALIDASI
    if(empty($nim) || empty($nama) || empty($jurusan) || empty($angkatan)){
        $error = "Semua field wajib diisi!";
    } elseif(!is_numeric($angkatan) || $angkatan < 2000 || $angkatan > date('Y')){
        $error = "Angkatan harus berupa tahun yang valid!";
    } else {
        // Cek NIM duplikat
        $stmt = $conn->prepare("SELECT id FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0){
            $error = "NIM sudah terdaftar!";
        } else {
            // Insert
            $stmt = $conn->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, angkatan) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $nim, $nama, $jurusan, $angkatan);
            
            if($stmt->execute()){
                $success = "Data mahasiswa berhasil ditambahkan!";
                // Redirect setelah 2 detik
                header("refresh:2;url=index.php");
            } else {
                $error = "Terjadi kesalahan saat menyimpan data!";
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
    <title>Tambah Mahasiswa - Aplikasi Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Aplikasi Mahasiswa</h1>
            <div>
                <span class="text-gray-700 mr-4">Halo, <strong><?= htmlspecialchars($_SESSION['nama'] ?? 'User') ?></strong></span>
                <a href="../auth/logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8 max-w-md">
        <div class="mb-6">
            <a href="index.php" class="text-blue-600 hover:text-blue-800 font-semibold">&larr; Kembali ke List</a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Data Mahasiswa</h2>

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
                    <label class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
                    <input type="text" name="nim" placeholder="Masukkan NIM" 
                        value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                    <input type="text" name="nama" placeholder="Masukkan nama lengkap" 
                        value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jurusan</label>
                    <input type="text" name="jurusan" placeholder="Masukkan jurusan" 
                        value="<?= htmlspecialchars($_POST['jurusan'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Angkatan</label>
                    <input type="number" name="angkatan" placeholder="Masukkan tahun angkatan" 
                        value="<?= htmlspecialchars($_POST['angkatan'] ?? '') ?>"
                        min="2000" max="<?= date('Y') ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div class="pt-4">
                    <button type="submit" name="tambah" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-lg transition">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-6 mt-8">
        <p>&copy; 2026 - Karimah Irsyadiyah.</p>
    </footer>
</body>
</html>
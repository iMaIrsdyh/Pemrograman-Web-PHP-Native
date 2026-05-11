<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/database.php';

$search = "";
if(isset($_GET['search'])){
    $search = trim($_GET['search']);
    $stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ? ORDER BY id DESC");
    $search_param = "%$search%";
    $stmt->bind_param("ss", $search_param, $search_param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM mahasiswa ORDER BY id DESC");
}

$total_mahasiswa = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Aplikasi Mahasiswa</title>
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

    <main class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="../dashboard.php" class="text-blue-600 hover:text-blue-800 font-semibold">&larr; Kembali ke Dashboard</a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Data Mahasiswa</h2>
            
            <!-- Search Form -->
            <div class="mb-6">
                <form method="GET" class="flex gap-2">
                    <input type="text" name="search" placeholder="Cari berdasarkan nama atau NIM..." 
                        value="<?= htmlspecialchars($search) ?>"
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition">
                        🔍 Cari
                    </button>
                    <?php if($search): ?>
                        <a href="index.php" class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-lg transition">
                            Reset
                        </a>
                    <?php endif; ?>
                </form>
            </div>

            <!-- Action Buttons -->
            <div class="mb-6 flex justify-between items-center">
                <p class="text-gray-600"><strong><?= $total_mahasiswa ?></strong> data mahasiswa</p>
                <a href="tambah.php" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg transition">
                    Tambah Mahasiswa
                </a>
            </div>

            <!-- Table -->
            <?php if($total_mahasiswa > 0): ?>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b-2 border-gray-300">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">NIM</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Jurusan</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Angkatan</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                                    <td class="px-4 py-3 text-gray-800"><?= htmlspecialchars($row['nim']) ?></td>
                                    <td class="px-4 py-3 text-gray-800"><?= htmlspecialchars($row['nama']) ?></td>
                                    <td class="px-4 py-3 text-gray-800"><?= htmlspecialchars($row['jurusan']) ?></td>
                                    <td class="px-4 py-3 text-gray-800"><?= htmlspecialchars($row['angkatan']) ?></td>
                                    <td class="px-4 py-3 text-center">
                                        <a href="edit.php?id=<?= $row['id'] ?>" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-4 rounded transition mr-2">
                                            ✏️ Edit
                                        </a>
                                        <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-4 rounded transition">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded">
                    <?php if($search): ?>
                        Tidak ada data mahasiswa yang sesuai dengan pencarian "<?= htmlspecialchars($search) ?>".
                    <?php else: ?>
                        Belum ada data mahasiswa. <a href="tambah.php" class="text-blue-600 font-semibold hover:underline">Tambah sekarang</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-6 mt-8">
        <p>&copy; 2026 - Karimah Irsyadiyah.</p>
    </footer>
</body>
</html>
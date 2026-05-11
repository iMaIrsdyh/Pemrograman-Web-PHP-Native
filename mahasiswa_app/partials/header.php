<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Aplikasi Mahasiswa</h1>
            <div>
                <?php if(isset($_SESSION['user'])): ?>
                    <span class="text-gray-700 mr-4">Halo, <?= htmlspecialchars($_SESSION['nama'] ?? 'User') ?></span>
                    <a href="<?= strpos($_SERVER['PHP_SELF'], 'auth') ? 'logout.php' : '../auth/logout.php' ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-4 py-8">

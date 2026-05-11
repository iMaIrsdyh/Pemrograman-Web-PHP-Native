<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Asosiatif</title>
</head>
<body>
    <h1>Array Asosiatif</h1>

    <?php
    $student = [
        "nama" => "Budi Santoso",
        "nim" => "12345678",
        "jurusan" => "Informatika",
        "ipk" => 3.75
    ];

    echo "<p>Nama: " . $student["nama"] . "</p>";
    echo "<p>Jurusan: " . $student["jurusan"] . "</p>";
    ?>
</body>
</html>
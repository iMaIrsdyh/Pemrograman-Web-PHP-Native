<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengulangan Array</title>
</head>
<body>
    <h1>Pengulangan Array</h1>

    <?php
    $fruits = ["Apel", "Jeruk", "Mangga", "Pisang"];
    $student = [
        "nama" => "Budi Santoso",
        "nim" => "12345678",
        "jurusan" => "Teknik Informatika"
    ];

    echo "<h2>FOR LOOP</h2>";
    $total = count($fruits);
    for ($i = 0; $i < $total; $i++) {
        echo $fruits[$i] . "<br>";
    }

    echo "<h2>FOREACH Array Terindeks</h2>";
    foreach ($fruits as $item) {
        echo $item . "<br>";
    }

    echo "<h2>FOREACH Index dan Value</h2>";
    foreach ($fruits as $index => $value) {
        echo $index . ": " . $value . "<br>";
    }

    echo "<h2>FOREACH Array Asosiatif tanpa Key</h2>";
    foreach ($student as $value) {
        echo $value . "<br>";
    }

    echo "<h2>FOREACH Array Asosiatif dengan Key</h2>";
    foreach ($student as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
    ?>
</body>
</html>
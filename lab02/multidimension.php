<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Multidimensi</title>
</head>
<body>
    <h1>Array Multidimensi</h1>

    <?php
    $student = [
        [
            "nama" => "Andi",
            "nilai" => [85, 90, 78]
        ],
        [
            "nama" => "Budi",
            "nilai" => [80, 85, 92]
        ],
        [
            "nama" => "Citra",
            "nilai" => [90, 88, 95]
        ]
    ];

    echo "<p>" . $student[0]["nama"] . "</p>";
    echo "<p>" . $student[2]["nilai"][1] . "</p>";
    ?>
</body>
</html>
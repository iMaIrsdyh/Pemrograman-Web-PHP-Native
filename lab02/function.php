<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fungsi Array</title>
</head>
<body>
    <h1>Fungsi-Fungsi Array PHP</h1>

    <?php
    $fruits = ["Apel", "Jeruk", "Mangga", "Pisang"];

    echo "<p>Jumlah elemen array: " . count($fruits) . "</p>";

    sort($fruits);
    echo "<p>Setelah sort: ";
    print_r($fruits);
    echo "</p>";

    array_push($fruits, "Durian");
    echo "<p>Setelah array_push: ";
    print_r($fruits);
    echo "</p>";

    $last = array_pop($fruits);
    echo "<p>Elemen terakhir yang dihapus: " . $last . "</p>";

    $vegetables = ["Bayam", "Wortel", "Kangkung"];
    $food = array_merge($fruits, $vegetables);
    echo "<p>Hasil merge: ";
    print_r($food);
    echo "</p>";

    $position = array_search("Mangga", $fruits);
    echo "<p>Posisi Mangga: " . $position . "</p>";

    if (in_array("Jeruk", $fruits)) {
        echo "<p>Jeruk ada dalam array</p>";
    }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Web Programming</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #0d6efd;
            margin-top: 25px;
        }

        hr {
            margin: 15px 0;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Hello World!</h1>

        <?php
            echo "<p>Ini adalah script PHP pertama saya</p>";

            $x = 100;
            $y = "100";
        ?>

        <h2>Nilai Awal</h2>

        <?php
            echo "Isi variabel y:<br>";
            var_dump($y);

            echo "<hr>";

            echo "Perbandingan x == y : ";
            var_dump($x == $y);
            echo "<br>";

            echo "Perbandingan x === y : ";
            var_dump($x === $y);
            echo "<br>";

            echo "Perbandingan x !== y : ";
            var_dump($x !== $y);
            echo "<br>";
        ?>

        <h2>Parsing String ke Integer</h2>

        <?php
            $y = (int) $y;

            echo "Isi variabel y setelah parsing:<br>";
            var_dump($y);

            echo "<hr>";

            echo "Perbandingan x != y : ";
            var_dump($x != $y);
            echo "<br>";

            echo "Perbandingan x <> y : ";
            var_dump($x <> $y);
            echo "<br>";

            echo "Perbandingan x !== y : ";
            var_dump($x !== $y);
            echo "<br>";

            echo "Perbandingan x > y : ";
            var_dump($x > $y);
            echo "<br>";

            echo "Perbandingan x < y : ";
            var_dump($x < $y);
            echo "<br>";

            echo "Perbandingan x >= y : ";
            var_dump($x >= $y);
            echo "<br>";

            echo "Perbandingan x <= y : ";
            var_dump($x <= $y);
            echo "<br>";

            echo "Perbandingan x <=> y : ";
            var_dump($x <=> $y);
            echo "<br>";
        ?>

    </div>

</body>

</html>
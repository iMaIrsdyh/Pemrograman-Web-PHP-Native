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

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #0d6efd;
            margin-top: 25px;
        }

        p {
            font-size: 16px;
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

            // Variabel
            $name = "Karimah Irsyadiyah";
            $npm  = "2411533018";

            $a = 8;
            $b = 4;

        ?>

        <h2>Informasi Mahasiswa</h2>

        <?php
            echo "<p><strong>Nama:</strong> $name</p>";
            echo "<p><strong>NPM:</strong> $npm</p>";
            echo "<p><strong>Hari ini:</strong> " . date('d-m-Y H:i') . "</p>";
        ?>

        <h2>Operator Aritmatika</h2>

        <?php
            echo "<p>$a + $b = " . ($a + $b) . "</p>";
            echo "<p>$a - $b = " . ($a - $b) . "</p>";
            echo "<p>$a * $b = " . ($a * $b) . "</p>";
            echo "<p>$a / $b = " . ($a / $b) . "</p>";
            echo "<p>$a % $b = " . ($a % $b) . "</p>";
            echo "<p>$a ** $b = " . ($a ** $b) . "</p>";
        ?>

        <h2>Operator Assignment</h2>

        <?php

            echo "<p>Nilai awal \$a = $a</p>";
            echo "<p>Nilai \$b = $b</p>";

            echo "<hr>";

            $a += $b;
            echo "<p>Setelah \$a += \$b → \$a = $a</p>";

            $a -= $b;
            echo "<p>Setelah \$a -= \$b → \$a = $a</p>";

            $a *= $b;
            echo "<p>Setelah \$a *= \$b → \$a = $a</p>";

            $a /= $b;
            echo "<p>Setelah \$a /= \$b → \$a = $a</p>";

            $a **= $b;
            echo "<p>Setelah \$a **= \$b → \$a = $a</p>";

            $a %= $b;
            echo "<p>Setelah \$a %= \$b → \$a = $a</p>";

        ?>

    </div>

</body>

</html>
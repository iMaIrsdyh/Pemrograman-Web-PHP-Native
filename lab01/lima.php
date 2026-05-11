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

            $x = 100;
            $y = 50;
        ?>

        <h2>Operator Logika</h2>

        <?php

            // AND
            if ($x == 100 and $y == 50) {
                echo "<p><strong>AND</strong> : \$x == 100 and \$y == 50</p>";
            }

            // OR
            if ($x == 100 or $y == 80) {
                echo "<p><strong>OR</strong> : \$x == 100 or \$y == 80</p>";
            }

            // XOR
            if ($x == 100 xor $y == 80) {
                echo "<p><strong>XOR</strong> : \$x == 100 xor \$y == 80</p>";
            }

            // &&
            if ($x == 100 && $y == 50) {
                echo "<p><strong>&&</strong> : \$x == 100 && \$y == 50</p>";
            }

            // ||
            if ($x == 100 || $y == 80) {
                echo "<p><strong>||</strong> : \$x == 100 || \$y == 80</p>";
            }

            // NOT
            if (!($x == 90)) {
                echo "<p><strong>NOT</strong> : !(\$x == 90)</p>";
            }

        ?>

    </div>

</body>

</html>
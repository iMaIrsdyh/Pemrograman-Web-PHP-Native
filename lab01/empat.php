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
        ?>

        <h2>Operator Increment dan Decrement</h2>

        <?php

            // Pre Increment
            $x = 10;

            echo "<p><strong>Pre Increment (++\$x)</strong></p>";
            echo "Nilai awal x = 10 <br>";
            echo "Hasil: " . ++$x;

            echo "<hr>";

            // Post Increment
            $x = 10;

            echo "<p><strong>Post Increment (\$x++)</strong></p>";
            echo "Nilai awal x = 10 <br>";
            echo "Hasil: " . $x++;

            echo "<hr>";

            // Pre Decrement
            $x = 10;

            echo "<p><strong>Pre Decrement (--\$x)</strong></p>";
            echo "Nilai awal x = 10 <br>";
            echo "Hasil: " . --$x;

            echo "<hr>";

            // Post Decrement
            $x = 10;

            echo "<p><strong>Post Decrement (\$x--)</strong></p>";
            echo "Nilai awal x = 10 <br>";
            echo "Hasil: " . $x--;

        ?>

    </div>

</body>

</html>
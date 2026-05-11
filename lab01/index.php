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

        p {
            font-size: 16px;
        }

        .info {
            margin-top: 20px;
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

        ?>

        <div class="info">

            <?php
                // Output dengan interpolation
                echo "<p><strong>Nama:</strong> $name</p>";

                // Output dengan concatenation
                echo "<p><strong>NPM:</strong> " . $npm . "</p>";

                // Fungsi date()
                echo "<p><strong>Hari ini:</strong> " . date("d-m-Y") . "</p>";
            ?>

        </div>

    </div>

</body>

</html>
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

        .line {
            margin: 15px 0;
            border-top: 2px solid #ccc;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Hello World!</h1>

        <?php
            echo "<p>Ini adalah script PHP pertama saya</p>";
        ?>

        <h2>Ternary Operator</h2>

        <?php

            echo "<p>";
            $status = (empty($user)) ? "iMa" : "logged in";
            echo "Status user: $status";
            echo "</p>";

            $user = "John Doe";

            echo "<p>";
            $status = (empty($user)) ? "jow" : "logged in";
            echo "Status user: $status";
            echo "</p>";

        ?>

        <div class="line"></div>

        <h2>Null Coalescing Operator</h2>

        <?php

            
            $user = $_GET["user"] ?? "jow";

            echo "<p>User: $user</p>";

           
            $color = $color ?? "red";

            echo "<p>Color: $color</p>";

        ?>

    </div>

</body>

</html>
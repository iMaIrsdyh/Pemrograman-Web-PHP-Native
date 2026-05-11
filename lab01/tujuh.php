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
            margin: 20px 0;
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

        <h2>IF - ELSEIF - ELSE</h2>

        <?php

            $t = date("H");

            if ($t < "10") {

                echo "<p>Have a good morning!</p>";

            } elseif ($t < "20") {

                echo "<p>Have a good day!</p>";

            } else {

                echo "<p>Have a good night!</p>";

            }

        ?>

        <div class="line"></div>

        <h2>Ternary Operator</h2>

        <?php

            $a = 13;

            $b = $a < 10 ? "Hello" : "Good Bye";

            echo "<p>Hasil: $b</p>";

        ?>

        <div class="line"></div>

        <h2>Nested If</h2>

        <?php

            if ($a > 10) {

                echo "<p>Above 10";

                if ($a > 20) {

                    echo " and also above 20";

                } else {

                    echo " but not above 20";

                }

                echo "</p>";
            }

        ?>

        <div class="line"></div>

        <h2>Switch Case</h2>

        <?php

            $favcolor = "red";

            switch ($favcolor) {

                case "red":
                    echo "<p>Your favorite color is red!</p>";
                    break;

                case "blue":
                    echo "<p>Your favorite color is blue!</p>";
                    break;

                case "green":
                    echo "<p>Your favorite color is green!</p>";
                    break;

                default:
                    echo "<p>Your favorite color is neither red, blue, nor green!</p>";
            }

        ?>

    </div>

</body>

</html>
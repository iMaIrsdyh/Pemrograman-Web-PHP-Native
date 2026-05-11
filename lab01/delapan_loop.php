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

        h2 {
            margin-top: 30px;
            color: #0d6efd;
        }

        .section {
            background-color: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        hr {
            margin: 15px 0;
        }
    </style>
</head>

<body>

    <h1>Hello World!</h1>

    <?php
        echo "<p>Ini adalah script PHP pertama saya</p>";
    ?>

    <!-- WHILE -->
    <div class="section">
        <h2>WHILE</h2>

        <?php
            $i = 1;

            while ($i < 6) {
                echo $i . "<br>";
                $i++;
            }

            echo "<hr>";

            // Alternative Syntax
            $i = 1;

            while ($i < 6):
                echo $i . "<br>";
                $i++;
            endwhile;

            echo "<hr>";

            // Break
            $i = 1;

            while ($i < 6) {
                if ($i == 3) {
                    break;
                }

                echo $i . "<br>";
                $i++;
            }

            echo "<hr>";

            // Continue
            $i = 0;

            while ($i < 6) {
                $i++;

                if ($i == 3) {
                    continue;
                }

                echo $i . "<br>";
            }
        ?>
    </div>

    <!-- DO WHILE -->
    <div class="section">
        <h2>DO WHILE</h2>

        <?php
            $i = 1;

            do {
                echo $i . "<br>";
                $i++;
            } while ($i < 6);

            echo "<hr>";

            
            $i = 8;

            do {
                echo $i . "<br>";
                $i++;
            } while ($i < 6);

            echo "<hr>";

            // Break
            $i = 1;

            do {
                if ($i == 3) {
                    break;
                }

                echo $i . "<br>";
                $i++;
            } while ($i < 6);

            echo "<hr>";

            // Continue
            $i = 0;

            do {
                $i++;

                if ($i == 3) {
                    continue;
                }

                echo $i . "<br>";

            } while ($i < 6);
        ?>
    </div>

    <!-- FOR LOOP -->
    <div class="section">
        <h2>FOR LOOP</h2>

        <?php
            for ($x = 0; $x <= 10; $x++) {
                echo "The number is: $x <br>";
            }

            echo "<hr>";

            // Break
            for ($x = 0; $x <= 10; $x++) {

                if ($x == 3) {
                    break;
                }

                echo "The number is: $x <br>";
            }

            echo "<hr>";

            // Continue
            for ($x = 0; $x <= 10; $x++) {

                if ($x == 3) {
                    continue;
                }

                echo "The number is: $x <br>";
            }

            echo "<hr>";

            // Increment 10
            for ($x = 0; $x <= 100; $x += 10) {
                echo "The number is: $x <br>";
            }
        ?>
    </div>

    <!-- FOREACH -->
    <div class="section">
        <h2>FOREACH</h2>

        <?php
            $colors = array("red", "green", "blue", "yellow");

            foreach ($colors as $x) {
                echo "$x <br>";
            }

            echo "<hr>";

            
            foreach ($colors as $x) {

                if ($x == "blue") {
                    break;
                }

                echo "$x <br>";
            }

            echo "<hr>";

          
            foreach ($colors as $x) {

                if ($x == "blue") {
                    continue;
                }

                echo "$x <br>";
            }

            echo "<hr>";

            
            foreach ($colors as $x):
                echo "$x <br>";
            endforeach;

            echo "<hr>";

            
            $members = array(
                "Peter" => "35",
                "Ben"   => "37",
                "Joe"   => "43"
            );

            foreach ($members as $x => $y) {
                echo "$x : $y <br>";
            }

            echo "<hr>";

            // Object
            class Car {

                public $color;
                public $model;

                public function __construct($color, $model) {
                    $this->color = $color;
                    $this->model = $model;
                }
            }

            $myCar = new Car("red", "Volvo");

            foreach ($myCar as $x => $y) {
                echo "$x : $y <br>";
            }

            echo "<hr>";

            $colors = array("red", "green", "blue", "yellow");

            foreach ($colors as $x) {

                if ($x == "blue") {
                    $x = "pink";
                }
            }

            var_dump($colors);

            echo "<hr>";

            foreach ($colors as &$x) {

                if ($x == "blue") {
                    $x = "pink";
                }
            }

            var_dump($colors);
        ?>
    </div>

</body>
</html>

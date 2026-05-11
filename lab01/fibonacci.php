<!DOCTYPE html>
<html>
<head>
<title>Deret Fibonacci</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
    }
    h1 {
        color: #333;
    }
    .fibonacci-list {
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 5px;
        margin: 20px 0;
    }
    .result {
        font-size: 18px;
        line-height: 1.8;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Program Deret Fibonacci</h1>
    
    <div class="fibonacci-list">
        <h2>Deret Fibonacci (10 Angka Pertama):</h2>
        <div class="result">
            <?php
            $jumlah = 10;
            $a = 0;
            $b = 1;
            
            echo "Menggunakan perulangan FOR:<br>";
            for ($i = 0; $i < $jumlah; $i++) {
                echo $a;
                if ($i < $jumlah - 1) {
                    echo ", ";
                }
                $temp = $a + $b;
                $a = $b;
                $b = $temp;
            }
            ?>
        </div>
    </div>

    <div class="fibonacci-list">
        <h2>Deret Fibonacci (10 Angka Pertama dengan WHILE):</h2>
        <div class="result">
            <?php
            $jumlah = 10;
            $a = 0;
            $b = 1;
            $counter = 0;
            
            echo "Menggunakan perulangan WHILE:<br>";
            while ($counter < $jumlah) {
                echo $a;
                if ($counter < $jumlah - 1) {
                    echo ", ";
                }
                $temp = $a + $b;
                $a = $b;
                $b = $temp;
                $counter++;
            }
            ?>
        </div>
    </div>

    <div class="fibonacci-list">
        <h2>Deret Fibonacci (20 Angka):</h2>
        <div class="result">
            <?php
            $jumlah = 20;
            $a = 0;
            $b = 1;
            
            echo "Menggunakan perulangan FOR:<br>";
            for ($i = 0; $i < $jumlah; $i++) {
                echo $a;
                if ($i < $jumlah - 1) {
                    echo ", ";
                }
                $temp = $a + $b;
                $a = $b;
                $b = $temp;
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>Praktikum Web Programming</title>
</head>
<body>
<h1>Hello World!</h1>
<?php
echo "<p>Ini adalah script PHP pertama saya</p>";
// Variabel
$name = "KARIMAH IRSYADIYAH";
$npm = "2411533018";
$a = 8;
$b = 4;
// Output dengan concatenation
echo "<p>Nama saya: $name</p>";
echo "<p>NPM: $npm</p>";
// Fungsi date()
echo '<p>Hari ini: ' . date('d-m-Y H:i') . '</p>';
echo "<p>$a + $b = " . ($a + $b) . "</p>";
echo "<p>$a - $b = " . ($a - $b) . "</p>";
echo "<p>$a * $b = " . ($a * $b) . "</p>";
echo "<p>$a / $b = " . ($a / $b) . "</p>";
echo "<p>$a % $b = " . ($a % $b) . "</p>";
echo "<p>$a ** $b = " . ($a ** $b) . "</p>";
?>
</body>
</html>
<?php
include 'db.php';
include 'function.php';

if (!isset($_GET['id'])) {
    die("ID tamu tidak ditemukan.");
}

$id = $_GET['id'];
$guest = getGuest($id);

if (!$guest) {
    die("Tamu dengan ID tersebut tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    echo updateGuest($id, $firstname, $lastname, $email);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Guest</title>
</head>
<body>
    <h2>Update Tamu</h2>
    <form method="POST">
        <input type="text" name="firstname" value="<?= $guest['firstname']; ?>" placeholder="First Name" required><br>
        <input type="text" name="lastname" value="<?= $guest['lastname']; ?>" placeholder="Last Name" required><br>
        <input type="email" name="email" value="<?= $guest['email']; ?>" placeholder="Email" required><br>
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="index.php">Kembali ke Daftar Tamu</a></p>
</body>
</html>
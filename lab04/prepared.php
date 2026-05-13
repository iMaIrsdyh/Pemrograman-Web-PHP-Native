<?php
require_once 'db_connection.php';

try {
    $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
    VALUES (:firstname, :lastname, :email)");

    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    $firstname = "Sophie";
    $lastname = "Randall";
    $email = "sophie.randall@example.com";
    $stmt->execute();

    $firstname = "Abigail";
    $lastname = "Wilkins";
    $email = "abigail.wilkins@example.com";
    $stmt->execute();

    $firstname = "Alison";
    $lastname = "Newman";
    $email = "alison.newman@example.com";
    $stmt->execute();

    echo "New records created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
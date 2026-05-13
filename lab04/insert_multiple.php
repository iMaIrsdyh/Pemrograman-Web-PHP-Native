<?php
require_once 'db_connection.php';

try {
    $conn->beginTransaction();

    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('Mary', 'Moe', 'mary@example.com')");

    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('Julie', 'Dooley', 'julie@example.com')");

    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('Kane', 'Que', 'kane@example.com')");

    $conn->commit();
    echo "New records created successfully";
} catch(PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
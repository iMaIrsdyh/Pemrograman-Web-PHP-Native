<?php

function getGuests()
{
    global $connection;

    $sql = "
        SELECT *
        FROM myguests
        LEFT JOIN files
        ON files.myguest_id = myguests.id
    ";

    $stmt = $connection->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
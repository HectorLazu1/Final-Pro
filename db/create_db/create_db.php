<?php


include '../connect/connect_to_db.php';

$conn = get_db_connection();

// Create database
$db_name = "test_db";
$sql = "CREATE DATABASE $db_name";

try {
    $conn->query($sql);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    
}

$conn->close();



?>
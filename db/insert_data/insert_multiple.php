<?php
include '../connect/connect_to_db.php';

$db_name = 'test_db';

$conn = get_db_connection($db_name);

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

try {
    $conn->multi_query($sql);
    $last_id = $conn->insert_id;
    echo "New records created successfully";
} catch (Exception $e) {
    echo 'Error inserting data. Caught exception: ',  $e->getMessage(), "\n";
    
}


$conn->close();
?>
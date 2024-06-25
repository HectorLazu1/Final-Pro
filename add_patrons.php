<?php

include '../connect/connect_to_db.php';

$db_name = 'test_db';

$conn = get_db_connection($db_name);

// sql to create table
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

try {
    $conn->query($sql);
    $last_id = $conn->insert_id;
    echo "Data inserted into MyGuests successfully";
	echo "<br>";
	echo "New record created successfully. Last inserted ID is: " . $last_id;
} catch (Exception $e) {
    echo 'Error inserting data. Caught exception: ',  $e->getMessage(), "\n";
    
}

$conn->close();

?>

<?php


include '../connect/connect_to_db.php';

$db_name = 'test_db';

$conn = get_db_connection($db_name);

// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) NOT NULL AUTO_INCREMENT, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
PRIMARY KEY (id)
)";

try {
    $conn->query($sql);
    echo "Table MyGuests created successfully";
} catch (Exception $e) {
    echo 'Error creating table. Caught exception: ',  $e->getMessage(), "\n";
    
}

$conn->close();

// if ($conn->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// $conn->close();

?>
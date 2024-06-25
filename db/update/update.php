<?php
include '../connect/connect_to_db.php';

$db_name = 'test_db';

$conn = get_db_connection($db_name);

$sql = "UPDATE MyGuests SET lastname=? WHERE id=?";

$last_name = 'Myers';
$id = 3; 

$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $last_name, $id);

$stmt->execute();


if ($stmt->affected_rows > 0) {
    echo "Record updated successfully";
} else {
    echo "No record was updated ";
}

$stmt->close();

/*
NOT using prepared statement

// sql to delete a record
$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

try {
    $conn->query($sql);
    echo "Record updated successfully";
} catch (Exception $e) {
    echo 'Error updating record. Caught exception: ',  $e->getMessage(), "\n";
    
}

*/


$conn->close();
?>
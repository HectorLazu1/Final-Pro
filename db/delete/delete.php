<?php
include '../connect/connect_to_db.php';

$db_name = 'test_db';

$conn = get_db_connection($db_name);

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id=?";
$id = 2;

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Record deleted successfully";
} else {
    echo "No records deleted ";
}

$stmt->close();

/*
NOT using prepared statement

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id=3";

try {
    $conn->query($sql);
    echo "Record deleted successfully";
} catch (Exception $e) {
    echo 'Error deleting record. Caught exception: ',  $e->getMessage(), "\n";
    
}

*/


$conn->close();
?>
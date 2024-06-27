<?php
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'test_db';	
	$conn = get_db_connection($db_name);
	
	// Update a hold:
	$stmt = $conn->prepare("UPDATE Holds SET PatronID=? WHERE ISBN=?");
    $stmt->bind_param("ii", $_POST["newID"], $_POST["updateHold"]);
    $stmt->execute();
	
	
	$conn->close();
?>

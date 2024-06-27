<?php
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'test_db';	
	$conn = get_db_connection($db_name);

	// Add a book to the database:
	$stmt = $conn->prepare("DELETE FROM Holds WHERE ISBN=?");
    $stmt->bind_param("i", $_POST["deleteHold"]);
    $stmt->execute();
	
	
	$conn->close();
?>

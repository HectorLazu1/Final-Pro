<?php
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'test_db';	
	$conn = get_db_connection($db_name);

	$stmt = $conn->prepare("DELETE FROM Books WHERE ISBN = ?");
    $stmt->bind_param("i", $_POST["deleteISBN"]);
    $stmt->execute();
	
	
	$conn->close();
?>

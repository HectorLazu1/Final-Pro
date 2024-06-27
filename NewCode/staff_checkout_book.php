<?php
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'test_db';	
	$conn = get_db_connection($db_name);

	// Checkout a book:
	$stmt = $conn->prepare("INSERT INTO Checkouts (PatronID, ISBN, Checkout_Date, Renewals_Left) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $_POST["checkout_id"], $_POST["checkout_ISBN"], CURRENT_DATE(), 3);
    $stmt->execute();
	
	
	$conn->close();
?>

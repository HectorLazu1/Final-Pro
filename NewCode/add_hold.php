<?php
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'library_try';	
	$conn = get_db_connection($db_name);

	// Check if the requested book is already on hold:
	$stmt = $conn->prepare("SELECT * FROM Holds WHERE ISBN=?");
    $stmt->bind_param("s", $_POST["ISBN"]);
    $stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows == 0){
		$stmt = $conn->prepare("INSERT INTO Holds (ISBN, PatronID) VALUES (?, ?)");
		$stmt->bind_param("si", $_POST["ISBN"], $_POST["id"]);
		$stmt->execute();
		
		echo "Hold successfully placed.";
	} else{
		echo "Unable to place hold; This book is already on hold for another patron.";
	}
	
	$conn->close();
?>

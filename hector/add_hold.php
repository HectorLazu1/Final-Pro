<?php
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'test_db';	
	$conn = get_db_connection($db_name);

	// Check if the requested book is already on hold:
	$stmt = $conn->prepare("SELECT EXISTS (SELECT * FROM Holds WHERE ISBN=?)");
    $stmt->bind_param("i", $_POST["ISBN"]);
    $stmt->execute();
	$exists_bool = $stmt->get_result();

	if ($exists_bool == 0){
		$stmt = $conn->prepare("INSERT INTO Holds (ISBN, PatronID) VALUES (?, ?)");
		$stmt->bind_param("ii", $_POST["ISBN"], $_POST["id"]);
	} else{
		echo "Unable to place hold; This book is already on hold for another patron."
	}
	
	$conn->close();
?>

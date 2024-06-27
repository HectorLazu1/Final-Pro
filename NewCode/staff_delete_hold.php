<?php
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'library_try';	
	$conn = get_db_connection($db_name);

	// Delete the hold if it exists:
	$stmt = $conn->prepare("SELECT * FROM Holds WHERE ISBN=?");
	$stmt->bind_param("s", $_POST['deleteHold']);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows != 0){
		$stmt = $conn->prepare("DELETE FROM Holds WHERE ISBN=?");
		$stmt->bind_param("i", $_POST["deleteHold"]);
		$stmt->execute();
		
		echo "Hold successfully removed.";
	} else{
		echo "No such hold exists.";
	}
	
	$conn->close();
?>

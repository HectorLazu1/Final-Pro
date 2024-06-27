
<?php
	
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'library_try';	
	$conn = get_db_connection($db_name);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$isbn = $_POST["deleteISBN"];

		$stmt = $conn->prepare("DELETE FROM Books WHERE ISBN = ?");
		$stmt->bind_param("s", $isbn);

		// Execute the statement
		if ($stmt->execute()) {
			echo "Book with ISBN $isbn deleted successfully";
		} else {
			echo "Error: " . $stmt->error;
		}

		// Close statement and connection
		$stmt->close();
		$conn->close();
	}
?>




<?php
	// Establish connection with the database:
	include 'db_connect_simple.php';	
	
	// Add a book to the database:
	$stmt = $conn->prepare("INSERT INTO Books (ISBN, Title, Author, Edition, Publisher, Year_Published, Call_Number) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issisis", $_POST["addISBN"], $_POST["add_title"], $_POST["add_author"], $_POST["add_edition"], $_POST["add_publisher"], $_POST["add_year"], $_POST["add_call_number"]);
    $stmt->execute();
	
	
	$conn->close();
?>



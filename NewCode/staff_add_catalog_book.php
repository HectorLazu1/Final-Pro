<?php
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'library_try';	
	$conn = get_db_connection($db_name);

	// Add a book to the database:
	$stmt = $conn->prepare("INSERT INTO Books (ISBN, Book_Title, Author, Edition, Publisher, Year_Published, Call_Number) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issisis", $_POST["addISBN"], $_POST["add_title"], $_POST["add_author"], $_POST["add_edition"], $_POST["add_publisher"], $_POST["add_year"], $_POST["add_call_number"]);
    $stmt->execute();
	
	echo "Book added to catalog.";
	
	$conn->close();
?>

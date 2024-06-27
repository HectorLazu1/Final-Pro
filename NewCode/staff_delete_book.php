<?php
	// Establish connection with the database:
	include 'db_connect_simple.php';

	ini_set("error_reporting", E_ALL); 
	ini_set("html_errors", true); 
	ini_set("display_errors", "stdout"); 

	$stmt = $conn->prepare("DELETE FROM Books WHERE ISBN = ?");
    $stmt->bind_param("i", $_POST["deleteISBN"]);
    $stmt->execute();
	
	if ($stmt->execute()) {
        echo "Book deleted successfully.";
    } else {
        echo "Failed to delete the book.";
    }
	
	$conn->close();
?>

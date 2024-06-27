<?php
	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'library_try';	
	$conn = get_db_connection($db_name);

	// Check if the requested book is already checked out:
	$stmt = $conn->prepare("SELECT * FROM Checkouts WHERE ISBN=?");
    $stmt->bind_param("s", $_POST["checkout_ISBN"]);
    $stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows == 0){
		// If the book is not already checked out, then checkout the book:
		$stmt = $conn->prepare("INSERT INTO Checkouts (PatronID, ISBN, Checkout_Date, Renewals_Left) VALUES (?, ?, CURRENT_DATE(), ?)");
    	$stmt->bind_param("isi", $_POST["checkout_id"], $_POST["checkout_ISBN"], 3);
    	$stmt->execute();
		
		$isbn = $_POST["checkout_ISBN"];
		echo "Book with ISBN $isbn checkedout successfully.";
	} else{
		echo "Unable to checkout book; This book is already checked out to another patron.";
	}
	
	
	$conn->close();
?>

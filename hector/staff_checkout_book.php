<?php
	// Establish connection with the database:
	include 'db_connect_simple.php';

	ini_set("error_reporting", E_ALL); 
	ini_set("html_errors", true); 
	ini_set("display_errors", "stdout"); 

	// Check if the requested book is already checked out:
	$stmt = $conn->prepare("SELECT EXISTS (SELECT * FROM Checkouts WHERE ISBN=?)");
    $stmt->bind_param("i", $_POST["checkout_ISBN"]);
    $stmt->execute();
	$exists_bool = $stmt->get_result();

	if ($exists_bool == 0){
		// If the book is not already checked out, then checkout the book:
		$stmt = $conn->prepare("INSERT INTO Checkouts (PatronID, ISBN, Checkout_Date, Renewals_Left) VALUES (?, ?, ?, ?)");
    	$stmt->bind_param("iisi", $_POST["checkout_id"], $_POST["checkout_ISBN"], CURRENT_DATE(), 3);
    	$stmt->execute();
	} else{
		echo "Unable to checkout book; This book is already checked out to another patron."
	}
	
	
	$conn->close();
?>

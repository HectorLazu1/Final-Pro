<?php

	/* 
 		Code to add new patrons to the library
	*/

	include '../connect/connect_to_db.php';
	
	$db_name = 'test_db';
	
	$conn = get_db_connection($db_name);
	
	// Generate random ID for new patrons:
	while ($i=0){
		$new_id = rand(0, 100); // Generate random number
		if in_array($new_id, $conn->query("SELECT patron_id FROM patrons")) continue; // If the number is already in use as a patronID, then find a different number for the new ID
		else break; // If the number is NOT already in use as a patron ID, then continue with the program
	}

	// Insert new values into the table:
	$sql = "INSERT INTO patrons (patronid, fname, lname, date_of_birth, address, fees, loaned_books)
	VALUES ($new_id, $_POST["fname"], $_POST["lname"], $_POST["dob"], $_POST["address"], 0.0, 0)";
	
	try {
	    $conn->query($sql);
	    $last_id = $conn->insert_id;
	    echo "New patron recorded successfully";
		echo "<br>";
		echo "New record created successfully. Last inserted ID is: " . $last_id;
	} catch (Exception $e) {
	    echo 'Error inserting data. Caught exception: ',  $e->getMessage(), "\n";
	    
	}
	
	$conn->close();

?>

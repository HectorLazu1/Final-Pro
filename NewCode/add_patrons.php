<?php

	/* 
 		Code to add new patrons to the library
	*/

	include '../connect/connect_to_db.php';
	
	$db_name = 'library_try';
	
	$conn = get_db_connection($db_name);
	
	// Generate random ID for new patrons:
	while ($i=0){
		$new_id = rand(0, 100); // Generate random number
		
		// Check if the generated ID number is already in use:
		$stmt = $conn->prepare("SELECT * FROM Patrons WHERE PatronID=?");
	    $stmt->bind_param("i", $new_id);
	    $stmt->execute();
		$result = $stmt->get_result();
	
		if ($result->num_rows != 0){
			break;  // If the generated ID number is NOT already in use, then use this number as the new patron's ID
		} else{
			continue; // If the number IS already in use, generate a new number
		}
	}

	// Insert new values into the table:
	$sql = "INSERT INTO patrons (patronid, fname, lname, date_of_birth, address, fees, loaned_books) VALUES ($new_id, $_POST['fname'], $_POST['lname'], $_POST['dob'], $_POST['address'], 0.0, 0)";
	
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

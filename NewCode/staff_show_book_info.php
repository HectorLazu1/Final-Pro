<?php

    // Establish connection with the database:
    include '../connect/connect_to_db.php';
	  $db_name = 'test_db';	
    $conn = get_db_connection($db_name);

    // Display the appropriate data in response to the textfield input:
    if ($_POST["infoType"] == "loans"){
        $stmt = $conn->prepare("SELECT * FROM Loans");
        $stmt->execute();
        $result = $stmt->get_result();
	    // Output the results
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "ID: " . $row["PatronID"] . " - Book: " . $row["ISBN"] ." - Checkout Date: ". $row["Checkout_Date"] . " - Renewals Left: " . $row["Renewals_Left"] . "<br>";
		}
		else {
		echo "No records found.";
        //Line not used, but scared to delete
	//echo $result;
    } elseif ($_POST["infoType"] == "holds") {
        $stmt = $conn->prepare("SELECT * FROM Holds");
        $stmt->execute();
        $result = $stmt->get_result();
        // Output the results
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "ID: " . $row["PatronID"] . " - Book: " . $row["ISBN"] . "<br>";
    }
		} else {
			echo "No records found.";
	//Line not used, but scared to delete
	//echo $result;
    }
    
    $conn->close();
?>


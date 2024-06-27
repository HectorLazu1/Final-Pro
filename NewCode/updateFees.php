<?php

// Establish connection with the database:
include '../../connect/connect_to_db.php';
$db_name = 'library_try';	
$conn = get_db_connection($db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Display the appropriate data in response to the textfield input:
if ($_POST["infoType"] == "loans") {
    $stmt = $conn->prepare("SELECT * FROM checkouts");
    $stmt->execute();
    $result = $stmt->get_result();
	// Output the results
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "ID: " . $row["PatronID"] . " - Book: " . $row["ISBN"] ." - Checkout Date: ". $row["Checkout_Date"] . " - Renewals Left: " . $row["Renewals_Left"] . "<br>";
		}
	} else {
		echo "No records found.";
	}
} elseif ($_POST["infoType"] == "holds") {
    $stmt = $conn->prepare("SELECT * FROM holds");
    $stmt->execute();
    $result = $stmt->get_result();
	// Output the results
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "ID: " . $row["PatronID"] . " - Book: " . $row["ISBN"] . "<br>";
    }
		} else {
			echo "No records found.";
	}
} else {
    echo "Invalid infoType.";
    $conn->close();
    exit();
}


$stmt->close();
$conn->close();
?>

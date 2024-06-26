<?php

    // Establish connection with the database:
    include '../connect/connect_to_db.php';
	  $db_name = 'test_db';	
    $conn = get_db_connection($db_name);

    // When using this script, the patronID of the patron requesting this service should be sent in using POST
    $patronid = $_POST["patronid"];
    // Retrieve the current fines that the patron owes
    $stmt = $conn->prepare("SELECT late_fees_owed FROM patrons WHERE patronid=?");
    $stmt->bind_param("i", $patronid);
    $stmt->execute();
    $current_fines = $stmt->get_result();
    
    
    // Retrieve all CHECK OUT DATES (from which due dates are derived) for all books in 'checked_out' where the due date is smaller than the current date:
    $stmt = $conn->prepare("SELECT checked_out FROM books WHERE ISBN=(SELECT ISBN FROM checkouts WHERE patronid=? AND ( checkout_date + 30 < CURRENT_DATE() )");
    $stmt->bind_param("i", $patronid);
    $stmt->execute();
    $late_book_dates = $stmt->get_result();
    
    // Add up all the owed late fees
    $added_fees = 0.0
    foreach ($late_book_dates as $time) {
        $late_period = strtotime($time) + strtotime(30);
        $added_fees = $added_fees + ($time * 0.5)
    }
    
    
    $conn->close();
?>



/*$stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");

$stmt->execute();
$result = $stmt->get_result();
*/

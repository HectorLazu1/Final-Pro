<?php

    // Establish connection with the database:
    include '../connect/connect_to_db.php';
	  $db_name = 'test_db';	
    $conn = get_db_connection($db_name);

    // When using this script, the patronID of the patron requesting this service should be sent in using POST
    $patronid = $_POST["patronid"];
    // Retrieve the current fines that the patron owes
    $stmt = $conn->prepare("SELECT Late_Fees_Owed FROM Patrons WHERE Patron_Id=?");
    $stmt->bind_param("i", $patronid);
    $stmt->execute();
    $current_fines = $stmt->get_result();
    
    
    // Retrieve all CHECK OUT DATES (from which due dates are derived) for all books in 'checked_out' where the due date is smaller than the current date:
    $stmt = $conn->prepare("SELECT Checked_Out FROM Books WHERE ISBN=(SELECT ISBN FROM Checkouts WHERE Patron_Id=? AND ( Checkout_Date + 30 < CURRENT_DATE() )");
    $stmt->bind_param("i", $patronid);
    $stmt->execute();
    $late_book_dates = $stmt->get_result();
    
    // Add up all the owed late fees
    $added_fees = 0.0
    foreach ($late_book_dates as $time) {
        $late_period = strtotime("now") - (strtotime($time) + strtotime(30));
        $added_fees = $added_fees + ($late_period * 0.5);
    }

    $stmt  = $conn->prepare("UPDATE Patrons SET Owed_Late_Fees = (Patrons.Owed_Late_Fees + ?)");
    $stmt->bind_param("i", $added_fees);\
    $stmt->execute();
    
    
    $conn->close();
?>

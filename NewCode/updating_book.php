<form method="post" action="updating_book.php">
    ISBN: <input type="text" name="isbn"><br>
    Checkout Status: <input type="text" name="checkout_status"><br>
    <input type="submit" value="Update Checkout Status">
</form>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connect_simple.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST["isbn"];
    $checkout_status = $_POST["checkout_status"];
 

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";


    $stmt = $conn->prepare("UPDATE Books SET Checkout_Status = ? WHERE ISBN = ?");
    $stmt->bind_param("ss", $checkout_status, $isbn);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Book with ISBN $isbn updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();


}
?>
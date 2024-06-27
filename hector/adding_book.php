<form method="post" action="adding_book.php">
    ISBN: <input type="text" name="isbn"><br>
    Book Title: <input type="text" name="title"><br>
    Book Author: <input type="text" name="author"><br>
    Publisher: <input type="text" name="publisher"><br>
    Publication Year: <input type="text" name="year"><br>
    Book Edition: <input type="text" name="edition"><br>
    Call Number: <input type="text" name="call_number"><br>
    Checkout Status: <input type="text" name="checkout_status"><br>
    Renewals: <input type="text" name="renewals"><br>
    Late Fee: <input type="text" name="late_fee"><br>
    Loaning Patron ID: <input type="text" name="loaning_patron_id"><br>
    <input type="submit" value="Add Book">
</form>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connect_simple.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $year = $_POST["year"];
    $edition = $_POST["edition"];
    $call_number = $_POST["call_number"];
    $checkout_status = $_POST["checkout_status"];
    $renewals = $_POST["renewals"];
    $late_fee = $_POST["late_fee"];
    $loaning_patron_id = $_POST["loaning_patron_id"];

    


    $stmt = $conn->prepare("INSERT INTO Books (ISBN, Book_Title, Book_Author, Publisher, Publication_Year, Book_Edition, Call_Number, Checkout_Status, Renewals, Late_Fee, Loaning_Patron_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisssidi", $isbn, $title, $author, $publisher, $year, $edition, $call_number, $checkout_status, $renewals, $late_fee, $loaning_patron_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New book added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();


}
?>




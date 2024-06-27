<form method="post" action="deleting_book.php">
    ISBN: <input type="text" name="isbn"><br>
    <input type="submit" value="Delete Book">
</form>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connect_simple.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST["isbn"];

    $stmt = $conn->prepare("DELETE FROM Books WHERE ISBN = ?");
    $stmt->bind_param("s", $isbn);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Book with ISBN $isbn deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>




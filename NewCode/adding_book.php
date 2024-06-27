
<?php

	// Establish connection with the database:
	include '../connect/connect_to_db.php';
	$db_name = 'library_try';	
	$conn = get_db_connection($db_name);

	/*ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include 'db_connect_simple.php';*/

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$isbn = $_POST["addISBN"];
		$title = $_POST["add_title"];
		$author = $_POST["add_author"];
		$publisher = $_POST["add_publisher"];
		$year = $_POST["add_year"];
		$edition = $_POST["add_edition"];
		$call_number = $_POST["add_call_number"];    


    $stmt = $conn->prepare("INSERT INTO Books (ISBN, Book_Title, Book_Author, Publisher, Publication_Year, Book_Edition, Call_Number) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $isbn, $title, $author, $publisher, $year, $edition, $call_number);

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




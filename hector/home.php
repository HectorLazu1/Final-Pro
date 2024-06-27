


<?php
session_start();
include 'db_connect_simple.php';

// If $_SESSION["username"] exists, allow the user to stay on this page. Otherwise, redirect to login.php
if (isset($_SESSION["username"])) {
    echo "Welcome Back Staffmember: " . $_SESSION["username"];
    echo "<br><a href=\"login.php\">Log out</a>";
    echo "<br><a href='Checkout_Book.php'>Checkout Book</a>";
    echo "<br><a href='settings.php'>Settings</a><br><br>";
} else {
    header("Location: login.php");
    exit();
}

$sql = "SELECT ISBN, Book_Title, Book_Author, Publisher, Publication_Year, Book_Edition, Call_Number, Checkout_Status FROM Books ORDER BY Book_Title ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ISBN</th>
                <th>Book Title</th>
                <th>Book Author</th>
                <th>Publisher</th>
                <th>Publication Year</th>
                <th>Book Edition</th>
                <th>Call Number</th>
                <th>Checkout Status</th>
            </tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["ISBN"] . "</td>
                <td>" . $row["Book_Title"] . "</td>
                <td>" . $row["Book_Author"] . "</td>
                <td>" . $row["Publisher"] . "</td>
                <td>" . $row["Publication_Year"] . "</td>
                <td>" . $row["Book_Edition"] . "</td>
                <td>" . $row["Call_Number"] . "</td>
                <td>" . $row["Checkout_Status"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>

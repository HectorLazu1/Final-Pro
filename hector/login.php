
<div style="position:relative;left:800px;top:400px;border:solid;width:300px;">
    <form action="login.php" method="POST" style="position:relative;left:20px;">
        <p>Please Log in:
        <br />
        <span>Username <input type="Text" name="username"/> </span> 
        <br>
        <br />
        <span>Password <input type="password" name="password"/> </span>
        </p>
        <input type="Submit" value="Log in"/>
    </form>
</div>

<?php
session_start();
include 'db_connect_simple.php';

ini_set("error_reporting", E_ALL); 
ini_set("html_errors", true); 
ini_set("display_errors", "stdout"); 

// Enable error reporting


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Debugging input values


    // Correct column names and table name
    $stmt = $conn->prepare('SELECT password, staff_check FROM Login WHERE username = ?');
    $stmt->bind_param('s', $input_username);
    $stmt->execute();
    $stmt->bind_result($stored_password, $staff_check);
    $stmt->fetch();
    $stmt->close();

    // Assuming you are storing plain text passwords, otherwise use password_hash and password_verify
    if ($input_password === $stored_password) {
        $_SESSION['username'] = $input_username;

        if ($staff_check) { // Check the variable correctly
            header('Location: staff_view_InfoPage.php');
        } else {
            header('Location: home.php');
        }
        exit();
    } else {
        echo '<p> Invalid username or password. </p>';
    }
} else {
    // Remove all session variables
    session_unset(); 

    // Destroy the session 
    session_destroy(); 
}
?>




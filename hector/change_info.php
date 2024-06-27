<?php


// Include your database connection file
include 'db_connect_simple.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patronID = $_POST['patronID'];
    $first_Name = $_POST['first_Name'];
    $last_Name = $_POST['last_Name'];
    $address = $_POST['Address_change'];
    $date_of_birth = $_POST['DOB_change'];


    $stmt = $conn->prepare('UPDATE patrons SET Patron_First_Name = ?, Patron_Last_Name = ?, Address = ? WHERE PatronID = ?');
    $stmt->bind_param('ssss', $first_Name, $last_Name, $address, $patronID);
    $stmt->execute();

    // Check if the query was successful
    if ($stmt->execute()) {
        echo '<p>Patron information updated successfully.</p>';
    } else {
        echo '<p>Failed to update patron information. Please try again.</p>';
    }


    $stmt = $conn->prepare('SELECT Patron_First_Name, Patron_Last_Name, Address, Date_of_Birth FROM patrons WHERE PatronID = ?');
    $stmt->bind_param('i', $patronID);
    $stmt->execute();
    $stmt->bind_result($first_Name, $last_Name, $address, $date_of_birth);

    // Fetch the row and display user information
    if ($stmt->fetch()) {
        echo '<br><br><p>PatronID: ' . $patronID . '</p>';
        echo '<p>First Name: ' . $first_Name . '</p>';
        echo '<p>Last Name: ' . $last_Name . '</p>';
        echo '<p>Address: ' . $address . '</p>';
        echo '<p>Date of Birth: ' . $date_of_birth . '</p>';
    } else {
        echo '<p>No user found with the provided PatronID.</p>';
    }





}


?>


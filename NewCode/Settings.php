<div style="border: 5px solid black; padding: 10px; margin: 10px 0px">
        <form action="change_info.php" method="post">

          <h2> Patron Settings </h2>
        	<span> 
        		Enter your ID <input type="text" name="patronID" style="margin: 8px 2px">
        		<br>
        	</span>

            <p> Enter desired profile info: </p>

            <span> 
        		Change First Name <input type="text" name="first_Name" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Change Last Name <input type="text" name="last_Name" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Change Address<input type="text" name="Address_change" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Change DOB <input type="text" name="DOB_change" style="margin: 8px 2px">
        		<br>
        	</span>
        	
        	<span> 
        		<input type="submit" style="margin: 8px 2px">
        	</span>
        </form>
    </div>

<?php

$sql = "SELECT FROM  WHERE PatronID, Patron_First_Name, Patron_Last_Name, Address, Date_of_BirthORDER, Late_Fees_Owed";
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

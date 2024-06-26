<?php

    // Establish connection with the database:
    include '../connect/connect_to_db.php';
	  $db_name = 'test_db';	
    $conn = get_db_connection($db_name);

    // Display the appropriate data in response to the textfield input:
    if ($_POST["infoType"] == "loans"){
        $stmt = $conn->prepare("SELECT * FROM loans");
        $stmt->execute();
        $result = $stmt->get_result();
        echo $result
    } elseif ($_POST["infoType"] == "holds") {
        $stmt = $conn->prepare("SELECT * FROM holds");
        $stmt->execute();
        $result = $stmt->get_result();
        echo $result
    }
    
    $conn->close();
?>

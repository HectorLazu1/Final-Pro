

<html>
<body>
<br>
<br>
<?php

session_start();

//if $_SESSION["username"] exists, allow the user to stay on this page. otherwise, redirect to login.php

if (isset($_SESSION["username"] ) ){

	echo "Welcome, ".$_SESSION["username"];
	echo "<br><a href=\"login.php\">Log out</a>";
}else{

	header("Location: login.php");

}
?>

</body>
</html>
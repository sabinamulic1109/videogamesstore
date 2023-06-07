
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbime="leamBP";
// Create connection
$con = new mysqli($servername, $username, $password, $dbime);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>
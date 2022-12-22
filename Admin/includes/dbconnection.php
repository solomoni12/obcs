<?php 
// DB credentials.
$host = "localhost";
$username = "root";
$pass = "";
$dbase = "obcsdb";
// Establish database connection.
try
{
$dbh = mysqli_connect($host, $username, $pass, $dbase);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
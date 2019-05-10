<?php
$conn = OpenCon();

$sql = "show tables";
$result = $conn->query($sql);

$table = mysqli_fetch_array($result);
while($table) {
	print("$table[0] <br>");
	$table = mysqli_fetch_array($result);
}

$conn->close();
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "employees";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	echo("oppkobling vellykket"."<br>");
}
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>
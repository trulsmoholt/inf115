<?php
$conn = OpenCon();

$sql = "SELECT DISTINCT title FROM titles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["title"]. "<br> ";
    }
} else {
    echo "0 results";
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
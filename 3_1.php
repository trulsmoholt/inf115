<?php
$conn = OpenCon();

$sql = "show tables";
$result = $conn->query($sql);

$table = mysqli_fetch_array($result);
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
<!DOCTYPE html>
<html>
<body>
<table border = '2'>
<tr>
<th>table</th>
<th>attributes</th>
</tr>
<?php
while ($table) 
{
	$sql1 = "show COLUMNS FROM $table[0]";
    echo "<tr>";
    echo "<td>" . 		"$table[0] <br>" ."</td>";
    echo "<td>";
	$result1 = $conn->query($sql1);
	$collumnames = mysqli_fetch_array($result1);
	while($collumnames){
			print("$collumnames[0], ");
			$collumnames = mysqli_fetch_array($result1);
	}
    echo "</td>";
    echo "</tr>";
	$table = mysqli_fetch_array($result);
}
$conn->close();
?>
</table>
</body>
</html>
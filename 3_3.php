<?php
$conn = OpenCon();




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
<th>tiår</th>
<th>ant kvinner</th>
<th>ant menn</th>
</tr>
<?php
$decade = array("1940","1950","1960","1970","1980","1990","2000","2010");
for($i = 1;$i<count($decade);$i++){
	echo "<tr> <td>".$decade[$i -1 ]."s :</td>";
	$sql = "SELECT COUNT(*) AS number ,gender FROM employees WHERE birth_date BETWEEN '" . $decade[$i - 1] . "-01-01' AND '" . $decade[$i] . "-01-01' GROUP BY gender";
	$query = $conn->query($sql);
	$row1 = $query->fetch_assoc();
	$row2 = $query->fetch_assoc();
	if($row1["gender"]=="F"){
		echo "<td>".$row1["number"]."</td>"."<td>".$row2["number"]."</td>";
	}else{
		echo "<td>".$row2["number"]."</td>"."<td>".$row1["number"]."</td>";
	}
	echo "</tr>";	
}
$conn->close();
?>
</table>
</body>
</html>
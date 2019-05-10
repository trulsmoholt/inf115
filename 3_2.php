<?php
$conn = OpenCon();

$sql = "SELECT dept_name, dept_no FROM departments";
$result = $conn->query($sql);

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
<th>avdeling</th>
<th>sjef</th>
<th>antall ansatte</th>
</tr>
<?php
while ($row = $result->fetch_assoc()) 
{
    echo "<tr>";
    echo "<td>" . 		$row["dept_name"]  ."</td>";
    echo "<td>";
	
	$dept_no = "'".$row["dept_no"]."'";
	$managersql = "SELECT first_name, last_name FROM dept_manager inner join employees on dept_manager.emp_no = employees.emp_no where dept_manager.dept_no =" . $dept_no;
	$manager = $conn->query($managersql);
	if($manager->num_rows == 0){
		echo "null rader";
	}
	$names = $manager->fetch_assoc();
	echo $names["first_name"] . " " . $names["last_name"];
	echo "</td>";
	
	$numemployeessql = "SELECT COUNT(*) FROM dept_emp WHERE dept_no = " . $dept_no;
	$numemployees = $conn->query($numemployeessql);
	$number = $numemployees->fetch_array();
	echo "<td>" . $number[0] . "</td>";
	echo "</tr>";
}
$conn->close();
?>
</table>
</body>
</html>
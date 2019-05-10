<?php
$conn = OpenCon();


$firstquery = "SELECT dept_name, first_name, last_name from (departments inner join dept_manager on departments.dept_no = dept_manager.dept_no) inner join employees on employees.emp_no = dept_manager.emp_no";
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
<th>tiår</th>
<th>ant kvinner</th>
<th>ant menn</th>
</tr>
<?php
$decade = array("40","50","60","70","80","90","00","10");
for($i = 1;$i<count($decade);$i++){
	echo "<tr> <td>".$decade[$i -1 ]."s :</td>";
	$sql = "SELECT COUNT(*) AS number ,gender FROM employees WHERE birth_date BETWEEN '19" . $decade[$i - 1] . "-01-01' AND '19" . $decade[$i] . "-01-01' GROUP BY gender";
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
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
 $average=$total=$yearError = " ";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if (empty($_POST["year"])) {
    $yearError = "Skriv inn årstall";
	}elseif($_POST["year"]<1 or $_POST["year"]>date("Y")){
		echo "------------error------------ skriv riktig årstall";
	}else{
	  $year = $_POST["year"];
	  $sql = "SELECT sum(salary) as total, count(*) as quantity FROM salaries WHERE YEAR(to_date)='".$year."'";
	  $query = $conn->query($sql);
	  $result = $query->fetch_assoc();
	  if($_POST["choice"]=="average"){
		  $average = $result["total"]/$result["quantity"];
	  }elseif($result["total"]==0){
		  $average=$total=" ";
	  }
	  else{
		  $total = $result["total"];
	  }
	  
  }
}   
?>
<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	År:
	<input type="number" name="year">
	  	<span class="error"><?php echo $yearError;?></span><br>
	<input type="radio" name="choice" value="average" > gjennomsnittslønn <br>
	<input type="radio" name="choice" value = "total"> total lønn <br>
	<input type="submit" name="submit" value="Submit"> 
</form>

<?php
if($average != " ") {
echo "gjennomsnittslønn i ". $year. " was ".$average;
}
if($total != " ") {
echo "total lønn i ". $year. " was ".$total;
}
$average = $total = " ";
?>


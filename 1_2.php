<!DOCTYPE HTML>
<html>
<head>
Bla bla
</head>

<body>
<?php

$name = $age = $birthdate = $nameError = $ageError = $birthdateError="";
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{	  if (empty($_POST["name"])) {
    $nameError = "Skriv inn navn";
  }
  
  if (empty($_POST["age"])) {
    $ageError = "Skriv inn alder";
  }
    
  if (empty($_POST["birthdate"])) {
    $birthdateError = "Skriv inn fødselsdato";
  }
else{
	$age = $_POST["age"];
	$today = new Datetime(date('d.m.Y'));
	$birthdate = new DateTime($_POST["birthdate"]);
	$difference = $today->diff($birthdate);
	if ($age != $difference->y) {
		$birthdateError = "Alderen samsvarer ikke med fødselsdato!";
	}
  }
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  navn:<br>
  <input type="text" name="name">
  	<span class="error"><?php echo $nameError;?></span><br>
  <br>
	Alder:
	<input type="number" name="age">
	<span class="error"><?php echo $ageError;?></span><br>
  	Fødselsdato:	
	<input type="date" name="birthdate">
	<span class="error"><?php echo $birthdateError;?></span>
	<br>
	<input type="submit" value="Submit">
</form> 
<?php

?>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if($_POST["language"]=="norsk"){
		print('<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
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
</form> ');
}else{
	print('<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
  name:<br>
  <input type="text" name="name">
  	<span class="error"><?php echo $nameError;?></span><br>
  <br>
	Age:
	<input type="number" name="age">
	<span class="error"><?php echo $ageError;?></span><br>
  	Birthdate:	
	<input type="date" name="birthdate">
	<span class="error"><?php echo $birthdateError;?></span>
	<br>
	<input type="submit" value="Submit">
</form> ');
}
}
?>
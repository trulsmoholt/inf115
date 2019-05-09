<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="radio" name="gender" value="female">Norsk
    <input type="radio" name="gender" value="male">English
	<input type="submit" name="submit" value="Submit">
</form>
<html> 
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/bootstrap.min.js"></script> 
	<link href="css/styles.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="Bilder/favicon.ico">
  <title>Vergissmeinnicht - Start</title>
</head> 
<?php
session_start();
if(!isset($_SESSION['id_user'])) {
 die('Bitte zuerst <a href="login.php">einloggen</a>');
}
?>
<form action="berufe.php">
	<label id ="Spiel_1"> Spiel_1 </label>
    <input type="submit" value="Start" />
</form>
<form action="berufe.php">
	<label id ="Spiel_2"> Spiel_2 </label>
    <input type="submit" value="Start" />
</form>
<form action="berufe.php">
	<label id ="Spiel_3"> Spiel_3 </label>
    <input type="submit" value="Start" />
</form>
</html>
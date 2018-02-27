<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=regenbogenheim', 'root', '');
 
if(isset($_GET['login'])) {
 $user_username = $_POST['user_username'];
 $user_passwort = $_POST['user_passwort'];
 
 $statement = $pdo->prepare("SELECT * FROM heim_user WHERE user_username = :user_username");
 $result = $statement->execute(array('user_username' => $user_username));
 $user = $statement->fetch();
  $statement2 = $pdo->prepare("SELECT * FROM heim_user WHERE user_rfid = :user_rfid");
 $result2 = $statement2->execute(array('user_rfid' => '12345678'));
 $user2 = $statement2->fetch();

 if ($user !== false && password_verify($user_passwort, $user['user_passwort'])|| $user2 !== false ) {
 $_SESSION['id_user'] = $user['id_user'];
 $_SESSION['user_username'] = $user['user_username'];
	if($user2 !== false)
	{
		 $_SESSION['id_user'] = $user2['id_user'];
		$_SESSION['user_username'] = $user2['user_username'];
	}
	
 header("Location: Start.php");
 } else {
 $message = "Bitte Username und Passwort eingeben!";
 echo "<script type='text/javascript'>alert('$message');</script>";
 }
 
}
?>
<!DOCTYPE html> 
<html> 
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/bootstrap.min.js"></script> 
	<link href="css/styles.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="Bilder/favicon.ico">
  <title>Vergissmeinnicht - Login</title>
</head> 
<body>
 
<?php 

?>

<a href="login.php"> <img src="Bilder/LOGO2.png" id="logo"> </a>

<form action="?login=1" method="post" id="Username"> <br>
<p id="Username" align="center"><b> Username </b></p> 
<input type="user_username" id="standardbox" name="user_username"><br>
<p id="Username" align="center"><b> Passwort </b></p> 
<input type="password" id="standardbox" name="user_passwort"><br>
<input type="submit" id ="Login" value="Login" class= "btn btn-dark"><br>
<input type="button" id="Registrieren" class= "btn btn-dark" value="Noch kein Konto? Hier Registrieren!" onClick="parent.location='registrieren.php'"></FORM>


</form> 
</body>
</html>

<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=regenbogenheim', 'root', '');
 
if(isset($_GET['login'])) {
 $user_username = $_POST['user_username'];
 $user_passwort = $_POST['user_passwort'];
 
 $statement = $pdo->prepare("SELECT * FROM heim_user WHERE user_username = :user_username");
 $result = $statement->execute(array('user_username' => $user_username));
 $user = $statement->fetch();
 

 if ($user !== false && password_verify($user_passwort, $user['user_passwort'])) {
 $_SESSION['id_user'] = $user['id_user'];
 $_SESSION['user_username'] = $user['user_username'];
 header("Location: www.start.php");
 } else {
 $errorMessage = "Username oder Passwort war ungültig<br>";
 }
 
}
?>
<!DOCTYPE html> 
<html> 
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">


  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>


    <script src="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/bootstrap.min.js"></script> 
  <title>Login</title> 
  <link href="styles.css" rel="stylesheet" type="text/css">
</head> 
<body>
 
<?php 
if(isset($errorMessage)) {
 echo $errorMessage;
}
?>

<a href="login.php"> <img src="LOGO.png" id="logo"> </a>

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

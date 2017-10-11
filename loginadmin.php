<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=regenbogenheim', 'root', '');
 
if(isset($_GET['login'])) {
 $admin_username = $_POST['admin_username'];
 $admin_passwort = $_POST['admin_passwort'];
 
 $statement = $pdo->prepare("SELECT * FROM heim_admin WHERE admin_username = :admin_username");
 $result = $statement->execute(array('admin_username' => $admin_username));
 $user = $statement->fetch();
 

 if ($user !== false && password_verify($admin_passwort, $user['admin_passwort'])) {
 $_SESSION['id_user'] = $user['id_user'];
 $_SESSION['admin_username'] = $user['admin_username'];
 header("Location: start.php");
 } else {
 $errorMessage = "Username oder Passwort war ungültig<br>"; 
 }
 
}
?>
<!DOCTYPE html> 
<html> 
<head>

    <!-- <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/css/bootstrap.min.css"> -->

  
     <!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script> -->


    <!-- <script src="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/bootstrap.min.js"></script> -->

<title>Login</title> 
<link href="loginadminstyle.css" rel="stylesheet" type="text/css">
</head> 
<body>
 
<?php 
if(isset($errorMessage)) {
 echo $errorMessage;
}
?>

<!-- <img src="img/LOGO.png" id='logo' alt="Selfhtml">-->

<form action="?login=1" method="post">
Username:<br>
<input type="admin_username" id='standardbox{' name="admin_username"><br><br>
 
Passwort:<br>
<input type="password" id='standardbox' name="admin_passwort"><br>
<br>
<input type="submit" class="btn btn-primary" value="Login">
<br>
<br>
<INPUT TYPE="button" class="btn btn-primary" value="Noch kein Konto?" onClick="parent.location='registrierenadmin.php'"></FORM>


</form> 
</body>
</html>

<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=regenbogenheim', 'root', '');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/bootstrap.min.js"></script>
    <style>
  #logo {
  width: 80%; 
  height: 80%;

}
#standardbox{
           width: 50%;
    padding: 1,5% 2%;
    margin: 0,5% 0;
    box-sizing: border-box;

 }


        body {
          background-color: green;
        }


</style>
    <title></title>
  </head>
  <body>
    <!-- <img src="img/LOGO.png" id='logo' alt="Selfhtml"-->
    <?php
                            $showFormular = true; 

                            if(isset($_GET['register'])) {
                             $error = false;
                            
                              $admin_username = $_POST['admin_username'];
                        
                             $passwort = $_POST['passwort'];
                             $passwort2 = $_POST['passwort2'];
                              

                             if(strlen($passwort) == 0) {
                             echo 'Bitte ein Passwort angeben<br>';
                             $error = true;
                             }
                              if(strlen($passwort2) == 0) {
                             echo 'Bitte Passwort wiederholen<br>';
                             $error = true;
                             }
                           
                             
                              if(strlen($admin_username) == 0) {
                             echo 'Bitte einen Username eingeben<br>';
                             $error = true;
                             }
                             if($passwort != $passwort2) {
                             echo 'Die Passwörter müssen übereinstimmen<br>';
                             $error = true;
                             }
                             
                          

                            
                             if(!$error) { 
                             $statement = $pdo->prepare("SELECT * FROM heim_admin WHERE admin_username = :admin_username");
                             $result = $statement->execute(array('admin_username' => $admin_username));
                             $user = $statement->fetch();
                             
                             if($user !== false) {
                             echo 'Der Username ist bereits vergeben<br>';
                             $error = true;
                             } 
                             }
                             if(strlen($passwort) != 0) {
                            $long=0;
							$lower=0;
							$upper=0;
							$number=0;
							//Prüfen ob das Passwort mind. 6 Zeichen hat und mindestens einen kleinen & einen großen Buchstaben sowie eine Zahl enthält!
							if(preg_match('/^[a-zA-Z0-9]{6,}$/', $passwort))
							{
								$long=1;
							}
							if(preg_match('/[a-z]/', $passwort))
							{
							$lower=1;
							}
							if(preg_match('/[A-Z]/', $passwort))
							{
								$upper=1;
							}
							if(preg_match('/[0-9]/', $passwort))
							{
								$number=1;
							}
							if ($long == 1 && $lower == 1 && $upper == 1 && $number == 1)
							{
                   
							}
							else
							{
							echo 'Das Passwort ist zu einfach!
							Das Passwort muss aus folgenden Bestandteilen bestehen:<br>
							- Mindestens 6 Zeichen Lang<br>
							- Mindestens ein Großbuchstabe<br>
							- Mindestens ein Kleinbuchstabe<br>
							- Mindestens eine Zahl<br>';
							$error = true;
                                                    }
                                             }
							if(strlen($passwort) != 0) {
								if($passwort == 'Hallo123' && 'Schalke04' && 'Passwort1' && 'Hallo1' && 'Schatz1')
								{
									echo 'Passwort zu einfach bitte geben sie ein anderes ein';
									$error = true;
								}
							}
											 
                             if(!$error) { 
                             $passwort = password_hash($passwort, PASSWORD_DEFAULT);
                             
                             $statement = $pdo->prepare("INSERT INTO heim_admin ( admin_username, admin_passwort) VALUES (:admin_username, :admin_passwort)");
                             $result = $statement->execute(array('admin_username' => $admin_username, 'admin_passwort' => $passwort));
                             
                             if($result) { 
                             echo 'Du wurdest erfolgreich registriert. <a href="loginadmin.php">Zum Login</a>';
                             $showFormular = false;
                             } else {
                             echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
                             }
                             } 
                            }
                             
                            if($showFormular) {
                            ?>
    <form action="?register=1" method="post">
    <br />Username
    <br />
    <input type="text" id='standardbox' name="admin_username" />
    <br />
 
    <br />Dein Passwort:
    <br />
    <input type="password" id='standardbox' name="passwort" />
    <br />
    <br />Passwort wiederholen:
    <br />
    <input type="password" id='standardbox' name="passwort2" />
    <br />
    <br />
    <input type="submit" value="Anlegen" /> 
    <input type="button" class="btn btn-primary" value="Zurück zum Login"
    onclick="parent.location=&#39;loginadmin.php&#39;" /></form><?php
                            }
                            ?>
  </body>
</html>

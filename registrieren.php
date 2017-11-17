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
	<link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>!!Registrieren!!</title>
  </head>
  <body>
    <!-- <img src="img/LOGO.png" id='logo' alt="Selfhtml"-->
    <?php
                            $showFormular = true; 

                            if(isset($_GET['register'])) {
                             $error = false;
                             $user_vorname = $_POST['user_vorname'];
                              $user_nachname = $_POST['user_nachname'];
                              $user_username = $_POST['user_username'];
                              $user_geburtstag = $_POST['user_geburtstag'];
                              $user_erstaufnahme = $_POST['user_erstaufnahme'];
                              $user_status_patient = $_POST['user_status_patient'];
                              $user_kommentar = $_POST['user_kommentar'];
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
                             if(strlen($user_vorname) == 0) {
                             echo 'Bitte einen Vornamen eingeben<br>';
                             $error = true;
                             }
                             if(strlen($user_nachname) == 0) {
                             echo 'Bitte einen Nachnamen eingeben<br>';
                             $error = true;
                             }
                              if(strlen($user_username) == 0) {
                             echo 'Bitte einen Username eingeben<br>';
                             $error = true;
                             }
                             if($passwort != $passwort2) {
                             echo 'Die Passwörter müssen übereinstimmen<br>';
                             $error = true;
                             }
                             
                              if(strlen($user_geburtstag) != 0) {
                             $pattern = '/^(19|20)[0-9]{2}[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/';
                            if(preg_match($pattern, $user_geburtstag))
                            {
                                    
                            }
                            else
                            {
                              echo "Fehlerhaftes Datum Format(yyyy-mm-tt)";
                               $error = true;
                            }
                                              }
                              if(strlen($user_erstaufnahme) != 0) {
                             $pattern = '/^(19|20)[0-9]{2}[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/';
                            if(preg_match($pattern, $user_erstaufnahme))
                            {
                                    
                            }
                            else
                            {
                              echo "Fehlerhaftes Datum Format(yyyy-mm-tt)";
                               $error = true;
                            }

                            }
                             if(!$error) { 
                             $statement = $pdo->prepare("SELECT * FROM heim_user WHERE user_username = :user_username");
                             $result = $statement->execute(array('user_username' => $user_username));
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
                             
                             $statement = $pdo->prepare("INSERT INTO heim_user (user_nachname, user_vorname, user_username, user_passwort, user_geburtstag, user_erstaufnahme, user_status_patient, user_kommentar) VALUES (:user_nachname, :user_vorname, :user_username, :user_passwort, :user_geburtstag, :user_erstaufnahme, :user_status_patient, :user_kommentar)");
                             $result = $statement->execute(array('user_nachname' => $user_nachname, 'user_vorname' => $user_vorname, 'user_username' => $user_username, 'user_passwort' => $passwort, 'user_geburtstag' => $user_geburtstag, 'user_erstaufnahme' => $user_erstaufnahme, 'user_status_patient' => $user_status_patient, 'user_kommentar' => $user_kommentar));
                             
                             if($result) { 
                             echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
                             $showFormular = false;
                             } else {
                             echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
                             }
                             } 
                            }
                             
                            if($showFormular) {
                            ?>
							
    <form action="?register=1" method="post">
	<p id="Registrieren_Textfeld">Vorname
    </p>
    <br />
    <input type="text" id='standardbox' name="user_vorname" />
    <br />
    <p id="Registrieren_Textfeld">Nachname
    </p>
	<br />
    <input type="text" id='standardbox' name="user_nachname" />
    <br />
    <p id="Registrieren_Textfeld">Username
	 </p>
    <br />
    <input type="text" id='standardbox' name="user_username" />
    <br />
    <p id="Registrieren_Textfeld">Geburtstag
    </p>
	<br />
    <input type="date" id='standardbox' name="user_geburtstag" />
    <br />
    <p id="Registrieren_Textfeld">Erstaufnahme
	</p>
    <br />
    <input type="date" id='standardbox' name="user_erstaufnahme" />
    <br />
    <p style="display:inline" id="Registrieren_Textfeld">Zustand des Patienten
	</p>
    <br />
    <input type="text" id='standardbox' name="user_status_patient" />
    <br />
    <p id="Registrieren_Textfeld">Kommentare
	</p>
    <br />
    <input type="text" id='standardbox' name="user_kommentar" />
    <br />
    <p style="display:inline" id="Registrieren_Textfeld">Dein Passwort
	</p>
    <br />
    <input type="password" id='standardbox' name="passwort" />
    <br />
    <p style="display:inline" id="Registrieren_Textfeld" >Passwort wiederholen
	</p>
    <br />
    <input type="password" id='standardbox' name="passwort2" />
    <br />
    <br />
    <input type="submit" value="Anlegen" /> </input>
    <input type="button" class="btn btn-primary" value="Zurück zum Login"
    onclick="parent.location=&#39;login.php&#39;" /></input>
	</form>
	<?php
							}
	?>
  </body>
</html>

<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <title>VGMN-Analyseverfahren</title>
	<link rel="icon" href="Bilder/favicon.ico">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<br>
<br>
<br>
<br>
<br>

 <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#" align="left">Vergissmeinnicht Analyseverfahren</a>
        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> -->
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Start.php">Start
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="analyse.php">Analyse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About.php">Über uns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Kontakt.php">Kontakt</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	

<?php
$conn = mysqli_connect("localhost", "root", "", "regenbogenheim");
setlocale(LC_TIME, "de_DE");
?>
<form action="rfid.php" method="post">
User hinzufügen
<!-- die ausgewählten Elemente werden in einem Array gespeichert -->
<select name="User[]" multiple="multiple">
<?php

$abfrage_user = mysqli_query($conn, "SELECT id_user, user_vorname , user_nachname  FROM heim_user ORDER BY user_nachname ASC;");
				if ( ! $abfrage_user )
				{
				die('Ungültige Abfrage: ' . mysqli_error());
				}
	
				while ($zeile = mysqli_fetch_array( $abfrage_user, MYSQLI_ASSOC ))
				{
				echo " <option value='". $zeile['id_user'] . "'>". $zeile['user_nachname'] . " " . $zeile['user_vorname'] ."</option>";
				}
			mysqli_free_result( $abfrage_user );
   
?>
</select>

<input type="submit" class ="btn btn-dark" name="absenden" value="Los gehts!">
</form>
    <?php
   //Mit isset() wird überprüft ob einer Variablen bereits
   //ein Wert zugewiesen wurde   
   if (isset($_POST['absenden'])){
      
	   	
		require_once ('rfid.php');
        //es werden alle Werte des Arrays mit einer foreach - 
        //Schleife ausgegeben
		$value = 0;
	
		
         if (isset($_POST['User'])){
            foreach ($_POST['User'] as $value) {
          
			
				$update = mysqli_query($conn, "UPDATE heim_user SET user_rfid = '12345678' WHERE id_user = '$value'; ");
				if ( ! $update )
				{
				die('Ungültige Abfrage: ' . mysqli_error());
				}
				
				
				
		

            }            
        }     }
     ?>

 </body>
 <footer class="footer">
      <div class="container">
        <span class="text-muted" align ="left">Made with &hearts; by Tobias Greinecker & Andreas Krentl & Thomas Krenn </span>
      </div>
    </footer>

</html>
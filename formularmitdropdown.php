 <!DOCTYPE html>
<html>
<head>
    <title>Formular mit Dropdown - Liste</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "", "regenbogenheim");
?>
<form action="formularmitdropdown.php" method="post">
 Wähle das Spiel:
<select name="Spiele">
   <option value="berufe">Berufe</option>
  
 </select>
<br>
User:
<!-- die ausgewählten Elemente werden in einem Array gespeichert -->
<select name="User[]" multiple="multiple">
<?php
$abfrage_user = mysqli_query($conn, "SELECT id_user, user_vorname , user_nachname  FROM heim_user;");
				if ( ! $abfrage_user )
				{
				die('Ungültige Abfrage: ' . mysqli_error());
				}
	
				while ($zeile = mysqli_fetch_array( $abfrage_user, MYSQLI_ASSOC ))
				{
				echo " <option value='". $zeile['id_user'] . "'>". $zeile['user_nachname'] . $zeile['user_vorname'] ."</option>";
				}
			mysqli_free_result( $abfrage_user );
   
?>
</select>
<br>
<input type="submit" name="absenden" value="Liste absenden">
</form>
    <?php
   //Mit isset() wird überprüft ob einer Variablen bereits
   //ein Wert zugewiesen wurde   
   if (isset($_POST['absenden'])){
      
	   	
		require_once ('formularmitdropdown.php');
        //es werden alle Werte des Arrays mit einer foreach - 
        //Schleife ausgegeben
		$value = 0;
		$values = "";
		$values = $_POST['Spiele'];
		echo $values."<br>";
         if (isset($_POST['User'])){
            foreach ($_POST['User'] as $value) {
                echo $value."<br>";
			
				$abfrage = mysqli_query($conn, "SELECT score_punkte, score_datum  FROM heim_score WHERE id_user = $value and score_name = '$values' ORDER BY score_datum DESC ");
				if ( ! $abfrage )
				{
				die('Ungültige Abfrage: ' . mysqli_error());
				}
				
				echo '<table border="1">';
				while ($zeile = mysqli_fetch_array( $abfrage, MYSQLI_ASSOC ))
				{
				echo "<tr>";
				echo "<td>". $zeile['score_punkte'] . "</td>";
				echo "<td>". $zeile['score_datum'] . "</td>";

				echo "</tr>";
				}
				echo "</table>";
			mysqli_free_result( $abfrage );

            }            
        }     }
     ?>
 </body>
</html>
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
?>
<form action="analyse.php" method="post">
 Ich will die Daten des Spiels 
<select name="Spiele">
   <option value="berufe">Berufe</option>
  
 </select>
vom Patienten
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
				echo " <option value='". $zeile['id_user'] . "'>". $zeile['user_nachname'] . $zeile['user_vorname'] ."</option>";
				}
			mysqli_free_result( $abfrage_user );
   
?>
</select>
analysieren.
<input type="submit" class ="btn btn-dark" name="absenden" value="Los gehts!">
</form>
    <?php
   //Mit isset() wird überprüft ob einer Variablen bereits
   //ein Wert zugewiesen wurde   
   if (isset($_POST['absenden'])){
      
	   	
		require_once ('analyse.php');
        //es werden alle Werte des Arrays mit einer foreach - 
        //Schleife ausgegeben
		$value = 0;
		$values = "";
		$values = $_POST['Spiele'];
		echo $values."<br>";
         if (isset($_POST['User'])){
            foreach ($_POST['User'] as $value) {
                echo $value."<br>";
			
				$abfrage = mysqli_query($conn, "SELECT score_punkte, score_datum  FROM heim_score WHERE id_user = $value and score_name = '$values' ORDER BY score_datum DESC; ");
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
	 
	 <canvas id="myChart" width="20%" height="15%"></canvas>
	 
	 <script>var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [	<?php
		if (isset($_POST['absenden'])){
		if (isset($_POST['User'])){
			foreach ($_POST['User'] as $value) {
				}
            foreach ($_POST['User'] as $value) {
                
			
				$abfrage = mysqli_query($conn, "SELECT score_punkte, score_datum  FROM heim_score WHERE id_user = $value and score_name = '$values' ORDER BY score_datum DESC; ");
				if ( ! $abfrage )
				{
				die('Ungültige Abfrage: ' . mysqli_error());
				}
				
			
				while ($zeile = mysqli_fetch_array( $abfrage, MYSQLI_ASSOC ))
				{
		
				echo $zeile['score_punkte'];
				
				
				}
			}
		}
		}
		 ?>],
        datasets: [{
            label: "Analysegraph",
            backgroundColor: 'rgb(0,0,139)',
            borderColor: 'rgb(0,0,139)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
 </body>
 <footer class="footer">
      <div class="container">
        <span class="text-muted" align ="left">Made with &hearts; by Tobias Greinecker & Andreas Krentl </span>
      </div>
    </footer>

</html>
<html>
<canvas id="myChart" width="20%" height="2%"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

	 <script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // Configuration options go here
    options: {}
});
<?phpecho $zeile['score_punkte'].", " ;

				
				}
				
			mysqli_free_result( $abfrage );],
		}}}?>
		<?php
		if (isset($_POST['absenden'])){
		if (isset($_POST['User'])){
            foreach ($_POST['User'] as $value) {
                
			
				$abfrage = mysqli_query($conn, "SELECT score_punkte, score_datum  FROM heim_score WHERE id_user = $value and score_name = '$values' ORDER BY score_datum DESC ");
				if ( ! $abfrage )
				{
				die('Ungültige Abfrage: ' . mysqli_error());
				}
				
			
				while ($zeile = mysqli_fetch_array( $abfrage, MYSQLI_ASSOC ))
				{
		
				echo $zeile['score_datum'].", ";
		 ?>
</script>
 </body>

</html>
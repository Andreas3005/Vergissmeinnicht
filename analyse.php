<html>
<canvas id="myChart" width="3%" height="1%"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<?php


$conn = mysqli_connect("localhost", "root", "", "regenbogenheim");
$result = $conn->query("SELECT score_punkte, score_datum FROM heim_score");

/*$abfrage = mysqli_query($conn, "SELECT score_punkte FROM heim_score");
$ergebnis = mysqli_fetch_object($abfrage);
$katzenwunsch = $ergebnis->count;*/

$abfrage = mysqli_query($conn, "SELECT score_punkte FROM heim_score");
$ergebnis = mysqli_fetch_object($abfrage);
$arr = mysql_fetch_row($abfrage);
/*echo $arr[2];

$outp = array();
while($row = mysqli_fetch_assoc($result))
{
	$outp [] = $row;
}


echo json_encode($outp);
for($i=0; $i < 6; $i++) {
    $a = $i *2;
	echo $katzenwunsch;
}*/

?>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [0, 10, 5, 2, 20, 30, 45],
        datasets: [{
            label: "My First dataset",
            
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
</html>
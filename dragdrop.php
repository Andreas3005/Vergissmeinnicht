<!DOCTYPE html>
<html>
<?php
	session_start();
if(!isset($_SESSION['id_user'])) {
 die('Bitte zuerst <a href="login.php">einloggen');
}
?>
<head>
    <meta charset="UTF-8">
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jdropwords.js"></script>
    <script>
        $(function(){
            $('.jdropwords').jDropWords({
                answers : {
                 "1" : "2",
                 "3" : "4",
                 "5" : "6",
                 "7" : "8",
				 "9" : "10"
                 }
            });
        });
	
		//$.get( "zaehlen.php?punkte=" + punkte + "&spiel=berufe");
		
		
    </script>
	<?php
	
	//Setzt die Punkte
	if(isset($_GET['daten'])){
		$db = mysqli_connect("localhost", "root", "", "regenbogenheim");
			
				$id_user =  $_SESSION['id_user'];
				$score_punkte = $_GET['daten'];
				$score_name = 'dragdrop';
				$eintragen = mysqli_query($db, "INSERT INTO heim_score (id_user, score_punkte, score_name) VALUES ('$id_user', '$score_punkte' , '$score_name')");
	

	}
	
	

	
	?>
    <link type="text/css" rel="stylesheet" href="css/jdropwords.css" />
</head>
<body>
    <h1 style="text-align: center">Setze die richtigen Wörter!</h1>
    <div class="jdropwords">
        <div class="blanks">
            <p>Hallo, ich <span class="blank" id="1"></span> Andreas</p>
            <p><span class="blank" id="3"></span> Ihnen?</p>
            <p>Wo <span class="blank" id="5"></span> Sie ?</p>
            <p>Ich <span class="blank" id="7"></span>in Wels geboren <span class="blank" id="9"></span> Linz-Land.</p>
        </div>
        <ul class="words">
            <li class="word" id="2">bin</li>
            <li class="word" id="4">Wie geht es</li>
            <li class="word" id="6">wohnen</li>
            <li class="word" id="8">wurde </li>
            <li class="word" id="10">und lebe jetzt in</li>
        </ul>
        <div class="actions">
            <a href="#" class="button reset">Reset</a>
            <a href="#" class="button submit">Submit</a>
        </div>
    </div>
</body>
</html>

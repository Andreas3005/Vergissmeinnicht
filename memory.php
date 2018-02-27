<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Memory Game</title>
      <link rel="stylesheet" href="css/stylem.css">
  
</head>

<body>
  <html ng-app="cards">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="flip.css">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-animate.min.js" type="text/javascript"></script>
	</head>
<body>
	<div class="cntr" ng-controller="CardController">
		<div class="timer" ng-class="{critical:isCritical}">
			{{timeLimit | date: 'm:ss'}} 	
		</div>
		<table class="table-top">
			<tr ng-repeat="row in deck.rows">
				<td ng-repeat="card in row.cards">
					<div class="card_container {{!card.isFaceUp ? '' : 'flip'}}" ng-click="isGuarding || check(card)" >
						<div class="card shadow">
							<div class="front face"></div>
							<div class="back face text-center pagination-center">
								<p> {{card.item}} </p>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<div class="startbtn">
			<button type="button" class="btn btn-default btn-lg" ng-disabled="inGame == true" ng-click="start()">Start</button>
			<button type="button" class="btn btn-default btn-lg" onClick="window.location.reload()">Zurücksetzen</button>
		</div>

	</div>
	<?php
		if(isset($_GET['daten'])){
		$db = mysqli_connect("localhost", "root", "", "regenbogenheim");
			
				$id_user =  1;
				$score_punkte = $_GET['daten'];
				$score_name = 'memory';
				$eintragen = mysqli_query($db, "INSERT INTO heim_score (id_user, score_punkte, score_name) VALUES ('$id_user', '$score_punkte' , '$score_name')");
		}
	?>

	}
</html>
    <script  src="js/index.js"></script>
	
</body>
</html>

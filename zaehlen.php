<?php
			session_start();
			if(!isset($_SESSION['id_user'])) {
				die('Bitte zuerst <a href="login.php">einloggen</a>');
			}
					$db = mysqli_connect("localhost", "root", "", "regenbogenheim");
				
				
				
				$id_user =  $_SESSION['id_user'];;
				$score_punkte = $_GET['punkte'];
				$score_name = $_GET['spiel'];
				$eintragen = mysqli_query($db, "INSERT INTO heim_score (id_user, score_punkte, score_name) VALUES ('$id_user', '$score_punkte' , '$score_name')");
				
			?>
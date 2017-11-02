<?php
					$db = mysqli_connect("localhost", "root", "", "regenbogenheim");
				
				
				
				$id_user = "1";
				$score_punkte = $_GET['punkte'];
				$eintragen = mysqli_query($db, "INSERT INTO heim_score (id_user, score_punkte) VALUES ('$id_user', '$score_punkte')");
				
			?>
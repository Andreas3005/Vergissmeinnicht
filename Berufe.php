<html>
 <head>
     <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/css/bootstrap.min.css">

  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>


 
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
        var test = document.cookie;
		alert(test);
		var berufe = ["Dachdecker", "Schlosser", "Maler", "Mechaniker"];
		if (test != null)
		{
		berufe = [];
		 berufe = test;
		
		}
		random(berufe);
		/*<?php
		$db = mysqli_connect("localhost", "root", "", "regenbogenheim");
		$score_punkte = "0";
		?>*/
		function richtig(){
			
			alert("Richtig");
			document.cookie = berufe;
			/*<?php
				session_start();
				if (isset($_GET["berufe"]))
				echo '
				<script type="text/javascript">
				'.$_GET["berufe"].' = var berufe;
				</script>
				';
				echo $berufe;
				//$_SESSION['berufe'] = "$berufe";;
				$id_user = "1";
				
				$eintragen = mysqli_query($db, "INSERT INTO heim_score (id_user, score_punkte) VALUES ('$id_user', '$score_punkte')");
			?>*/
			window.location.reload();  
		}
		function falsch(){
			<?php
			$score_punkte = $score_punkte + 1;
			?>
			alert("Falsch");
	
		}
		function random(berufe){
			var machen = new Array();
			machen [0] = ["schweißen", "sägen", "schleifen", "hämmern"];
			machen [1] = ["fliegen", "schweißen", "schleifen", "schneiden"];
			machen [2]= ["sägen", "abdecken", "malen", "pinseln"];
			machen [3] =["anpflanzen", "austauschen", "schweißen", "bohren"];
			
			
			var berufstelle = Math.floor(Math.random() * berufe.length);
			var berufToUse = berufe[berufstelle];
			berufe.splice(berufstelle,1);
			document.write("<img src='Bilder/Berufe/" + berufToUse + ".jpg' id='logo'>");
			document.write("<h1 id='Login'>Was macht der Beruf " + berufToUse + " nicht?</h1>");
			var a = 0;
			var notdouble = ["", "", "", ""];
            
			
			for(var i = 0; a <= 3; i++)
			{ 
		
		
				
				
			var machenstelle = Math.floor(Math.random() * 4);	
			var valueToUse = machen[berufstelle] [machenstelle];
				
				if (valueToUse !=  notdouble[0] & valueToUse !=  notdouble[1] & valueToUse !=  notdouble[2] & valueToUse !=  notdouble[3])
					{
					notdouble[a] = valueToUse;
					a++;
						if(machenstelle == 0)
						{
							document.write('<INPUT TYPE="button"  value="' + valueToUse + '" id="Login" onClick="richtig();">');
						}
						else{
							document.write('<INPUT TYPE="button" value="' + valueToUse + '" id="Login" onClick="falsch();">');
						}
			
					}
		
  
				}
	
			}
			
			
			
		
</script>
 
<?php
/*session_start();
if(!isset($_SESSION['userid'])) {
 die('Bitte zuerst <a href="login.php">einloggen</a>');
}*/
 



 
?>


</body>
</html>
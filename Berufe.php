<html>
 <head>
     <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/css/bootstrap.min.css">

  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>


 
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

		var berufe = ["Dachdecker", "Schlosser", "Maler", "Mechaniker"];
		random(berufe);
		function richtig(){
			alert("Richtig");
		}
		function falsch(){
			alert("Falsch");
		}
		function random(berufe){
			var Dachdecker = new Array  ("schweißen", "sägen", "schleifen", "hämmern");
			var Schlosser = new Array ("fliegen", "schweißen", "scleifen", "schneiden");
			var Maler = new Array ("sägen", "abdecken", "malen", "pinseln");
			var Mechaniker = new Array ("anpflanzen", "austauschen", "schweißen", "bohren");
			
			
			var berufstelle = Math.floor(Math.random() * berufe.length);
			var berufToUse = berufe[berufstelle];
			berufe.splice(berufstelle,1);
			document.write("<img src='Bilder/Berufe/" + berufToUse + ".jpg' id'logo'>");
			for(var i = 0; i < berufToUse.length; i++){
			var notdouble = ["", "", "", ""];
            var a = 0;
			for(var i = 0; a <= 3; i++)
			{ 
		
		
				
				var beruf1 = berufToUse.toString();;
				var machenstelle = Math.floor(Math.random() * beruf1.length);
				var valueToUse = beruf1[machenstelle];//Fehler beim Array 
				alert(valueToUse);
				if (valueToUse !=  notdouble[0] & valueToUse !=  notdouble[1] & valueToUse !=  notdouble[2] & valueToUse !=  notdouble[3])
					{
					notdouble[a] = valueToUse;
					a++;
						if(machenstelle == 0)
						{
							document.write('<INPUT TYPE="button" class="btn btn-primary" value="' + valueToUse + '" id"Login" onClick="richtig();">');
						}
						else{
							document.write('<INPUT TYPE="button" class="btn btn-primary" value="' + valueToUse + '" id"Login" onClick="falsch();">');
						}
			
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
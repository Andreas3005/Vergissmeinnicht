<html>
 <head>
     <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/css/bootstrap.min.css">

  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>


 
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

		const berufe = ["Dachdecker", "Schlosser", "Maler", "Mechaniker"];
		random(berufe);
		function richtig(){
			alert("Richtig");
			<?php
			$berufe = "var berufe";
			echo $berufe  "test";
			?>
		}
		function falsch(){
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
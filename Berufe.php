<html>
 <head>
     <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/css/bootstrap.min.css">

  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
<?php
session_start();
if(!isset($_SESSION['id_user'])) {
 die('Bitte zuerst <a href="login.php">einloggen</a>');
}
?>


 
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
        
		
		var cookie = getCookie("berufe");
		
		var punkte = 0;
		var berufe = ["Dachdecker", "Schlosser", "Maler", "Mechaniker"];
		if (cookie != 0)
		{
			
			berufe = [];
			var berufe = cookie.split(",");
			var laenge = berufe.length;
		
		}
		random(berufe);
		
		//Setzt das Cookie
		function setCookie(cname, cvalue) {
			var d = new Date();
			
			
			document.cookie = cname + "=" + cvalue + ";path=/";
		}
		//Holt sich das Cookie
		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
			}
		}
		return "";
		}
		//Wird ausgeführt wenn die Richtige eingabe gemacht wurde
		function richtig(){
			
			alert("Richtig");
			setCookie("berufe", berufe);
		
			
			if( 1 == laenge )
			{
			alert("fertig"); 
			$.get( "zaehlen.php?punkte=" + punkte + "&spiel=berufe");
			}
			else{
			window.location.reload();  
			}
		}
		function falsch(){
			punkte = punkte + 1;
			alert("Falsch");
			
		}
		function random(berufe){
			var machen = new Array();
			machen [0] = ["schweißen", "sägen", "schleifen", "hämmern"];
			machen [1] = ["fliegen", "schweißen", "schleifen", "schneiden"];
			machen [2]= ["sägen", "abdecken", "malen", "pinseln"];
			machen [3] =["anpflanzen", "austauschen", "schweißen", "bohren"];
			
			var berufepos = ["Dachdecker", "Schlosser", "Maler", "Mechaniker"];
			var berufstelle = Math.floor(Math.random() * berufe.length);
			var berufToUse = berufe[berufstelle];
			berufe.splice(berufstelle,1);
			
			var position = berufepos.indexOf(berufToUse);
			document.write("<img src='Bilder/Berufe/" + berufToUse + ".jpg' id='logo'>");
			document.write("<h1 id='Login'>Was macht der Beruf " + berufToUse + " nicht?</h1>");
			var a = 0;
			var notdouble = ["", "", "", ""];
            
			
			for(var i = 0; a <= 3; i++)
			{ 
		
		
				
				
			var machenstelle = Math.floor(Math.random() * 4);	
			var valueToUse = machen[position] [machenstelle];
				
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
 


</body>
</html>
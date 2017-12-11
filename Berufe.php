<html>
<Meta charset = "UTF-8">
<title>VGMN - Berufe</title>
<link rel="icon" href="Bilder/favicon.ico">
<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
<body>
  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"> Vergissmeinnicht "Was macht er nicht?"</a>
        </button>
      </div>
    </nav>
</body>
 <head>
<?php
//Session User
session_start();
if(!isset($_SESSION['id_user'])) {
 die('Bitte zuerst <a href="login.php">einloggen');
}
?>


 
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
		//document.write('document.getElementById("falsch").style.display = "none";');
		var uber = getCookie("punkte");
		if(uber = 0)
		{
        var punkte = 0;
		}
		//Variablen deklarieren
		var cookie = getCookie("berufe");
		
	
		var berufe = ["Dachdecker", "Schlosser", "Maler", "Mechaniker", "Kranfahrer", "Feuerwehrmann", "Fotograf", "Arzt", "Architekt" , "Zahnarzt",
		"Kammeramann", "Friseur", "Bauarbeiter", "Taxifahrer", "Sportler", "Fußballer", "Schmied", "Model", "Verkäufer", "Elektriker" ];
		//Wenn der Cookie nicht befüllt ist, wird er neu befüllt.
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
		
	
		//Wird ausgeführt wenn die Richtige Eingabe gemacht wurde
		function richtig(){
			
			
			setCookie("berufe", berufe);
		
			
			if( laenge <= 10  )
			{
			 
			var punkte = getCookie("punkte");
			var punkte = Math.floor(punkte);
			//Cookie löschen
			setCookie('punkte', '', -1, '/', '.Berufe.php');
			setCookie('berufe', '', -1, '/', '.Berufe.php');
			//Punkte vergeben
			$.get( "zaehlen.php?punkte=" + punkte + "&spiel=berufe");
			window.location = "BerufeFinish.php"; 
			}
			else{
			window.location.reload(); 
			}
		}
		//Bei einem Fehler wird dieser angezeit und dem Fehler-Counter ein Punkt hinzugefügt
		function falsch(){
			var punkte = getCookie("punkte");
			document.getElementById("falsch").style.visibility = 'visible';
			punkte.toString()
			var punkte = Math.floor(punkte);
			
			
			
			
			punkte = punkte + 1;
			setCookie("punkte", punkte);
			
			
		}
		//Ein Beruf wird zufällig ausgewählt und dessen Begriffe ebenfalls zufällig ausgegeben
		function random(berufe){
			var machen = new Array();
			machen [0] = ["schweißen", "sägen", "schleifen", "hämmern"];
			machen [1] = ["fliegen", "schweißen", "schleifen", "schneiden"];
			machen [2]= ["sägen", "abdecken", "malen", "pinseln"];
			machen [3] =["anpflanzen", "austauschen", "schweißen", "bohren"];
			machen [4] =["reparieren", "heben", "senken", "befestigen"];
			machen [5] =["schleifen", "löschen", "helfen", "retten"];
			machen [6] =["sägen", "Fotos bearbeiten", "fotografieren", "organisieren"];
			machen [7] =["singen", "Blut abnehemen", "verarzten", "operieren"];
			machen [8] =["löschen", "bauen", "zeichen", "kontrollieren"];
			machen [9] =["bringen", "reißen", "bohren", "untersuchen"];
			machen [10] =["reißen", "aufnehmen", "Filme bearbeiten", "filmen"];
			machen [11] =["lackieren", "schneiden", "kürzen", "rasieren"];
			machen [12] =["rasieren", "mischen", "verputzen", "mauern"];
			machen [13] =["sägen", "transportieren", "fahren", "Gepäck tragen"];
			machen [14] =["schlafen", "fahren", "schwimmen", "laufen"];
			machen [15] =["anfeuern", "schützen", "verfolgen", "laufen"];
			machen [16] =["verfolgen", "schleifen", "erhitzen", "hämmern"];
			machen [17] =["schützen", "anziehen", "schminken", "posieren"];
			machen [18] =["ziehen", "empfehlen", "erklären", "verkaufen"];
			machen [19] =["mauern", "schrauben", "löten", "verkabeln"];
			
			var berufepos = ["Dachdecker", "Schlosser", "Maler", "Mechaniker", "Kranfahrer", "Feuerwehrmann", "Fotograf", "Arzt", "Architekt" , "Zahnarzt","Kameramann", "Friseur", "Bauarbeiter", "Taxifahrer", "Sportler", "Fußballer", "Schmied", "Model", "Verkäufer", "Elektriker" ];
			var berufstelle = Math.floor(Math.random() * berufe.length);
			var berufToUse = berufe[berufstelle];
			berufe.splice(berufstelle,1);
			
			var position = berufepos.indexOf(berufToUse);
			document.write("<img src='Bilder/Berufe/" + berufToUse + ".jpg' id='logo'>");
			document.write("<h1 id='Login'>Was macht der Beruf " + '"' + berufToUse + '"' + " nicht?</h1>");
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
							document.write('<INPUT TYPE="button" class= "btn btn-dark" value="' + valueToUse + '" id="Login" onClick="richtig();">');
						}
						else{
							document.write('<INPUT TYPE="button" class= "btn btn-dark" value="' + valueToUse + '" id="Login" onClick="falsch();">');
						}
			
					}
		
  
				}
	
			}		
</script>
	
<p style="visibility: hidden;" id="falsch">
    Falsch
	</p>

</html>
<html>
 <head>
     <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/css/bootstrap.min.css">

  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>


    <script src="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/bootstrap.min.js"></script>
<script src="css/jquery-3.2.1.min"></script>

<script type="text/javascript">
	/*jQuery(function($){
    	     $( '.menu-btn' ).click(function(){
    	     $('.responsive-menu').toggleClass('expand')
    	     })
        })*/
		
		var berufe = ["Dachdecker", "Schlosser", "Maler", "Mechaniker"];
		random(berufe);
		function richtig(){
			alert("Richtig");
		}
		function falsch(){
			alert("Falsch");
		}
		function random(berufe){
			var Dachdecker = ["schweißen", "sägen", "schleifen", "hämmern"];
			var Schlosser = ["fliegen", "schweißen", "scleifen", "schneiden"];
			var Maler = ["sägen", "abdecken", "malen", "pinseln"];
			var Mechaniker = ["anpflanzen", "austauschen", "schweißen", "bohren"];
			
			
			var berufstelle = Math.floor(Math.random() * berufe.length);
			var berufToUse = berufe[berufstelle];
			berufe.splice(berufstelle,1);
			//document.write("<img src='Bilder/"berufToUse".jpg'>");
			for(var i = 0; i < berufToUse.length; i++){
			var notdouble = ["", "", "", ""];
            var a = 0;
			for(var i = 0; a <= 3; i++)
			{ 
		
		
				
		
				var machenstelle = Math.floor(Math.random() * berufToUse.length);
				var valueToUse = berufToUse[machenstelle];
				if (valueToUse !=  notdouble[0] & valueToUse !=  notdouble[1] & valueToUse !=  notdouble[2] & valueToUse !=  notdouble[3])
					{
					notdouble[a] = valueToUse;
					a++;
						if(machenstelle == 0)
						{
							document.write('<INPUT TYPE="button" class="btn btn-primary" value="'valueToUse'" id"berufbutton" onClick="richtig();">');
						}
						else{
							document.write('<INPUT TYPE="button" class="btn btn-primary" value="'valueToUse'" id"berufbutton" onClick="falsch();">');
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
 <!DOCTYPE html>
<html>
<head>
    <title>Formular mit Dropdown - Liste</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<form action="formularmitdropdown.php" method="post">
 Wahl der Anrede:
<select name="Anrede">
   <option value=" "> </option>
    <option value="Sie">Sie</option>
    <option value="Du">Du</option>
 </select>
<br>
Einkaufsliste:
<!-- die ausgewählten Elemente werden in einem Array gespeichert -->
<select name="Einkauf[]" multiple="multiple">
    <option value="Berufe">Berufe</option>
   <option value="Memory">Memory</option>
    <option value="Brot"></option>
</select>
<br>
<input type="submit" name="absenden" value="Liste absenden">
</form>
    <?php
   //Mit isset() wird überprüft ob einer Variablen bereits
   //ein Wert zugewiesen wurde   
   if (isset($_POST['absenden'])){
       if ($_POST['Anrede']=="Sie"){
            echo "Ihre";
       }
       if ($_POST['Anrede']=="Du"){
            echo "Deine ";
       }
       echo "Einkaufsliste: <br>";
        //es werden alle Werte des Arrays mit einer foreach - 
        //Schleife ausgegeben
         if (isset($_POST['Einkauf'])){
            foreach ($_POST['Einkauf'] as $value) {
                echo $value."<br>";
            }            
        }     }
     ?>
 </body>
</html>
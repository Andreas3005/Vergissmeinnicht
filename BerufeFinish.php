<html>
<Meta charset = "UTF-8">
<title>VGMN - Berufe - Ende</title>
<link rel="icon" href="Bilder/favicon.ico">
<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
	
 <head>
<?php
//Session User
session_start();
if(!isset($_SESSION['id_user'])) {
 die('Bitte zuerst <a href="login.php">einloggen');
}
?>
<script>
function blinkenderText() {
	$('.blinking').fadeOut(500);
	$('.blinking').fadeIn(500);
}
setInterval(blinkenderText, 1000);

</script>

</head>
<body>
  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"> Herzlichen Glückwunsch!!</a>
        </button>
      </div>
    </nav>
	
	<p class="blinking">SIE HABEN ES GESCHAFFT.</p>
</body>
</html>
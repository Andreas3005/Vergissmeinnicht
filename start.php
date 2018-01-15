<!DOCTYPE html>
<?php
//Session User
session_start();
if(!isset($_SESSION['id_user'])) {
 die('Bitte zuerst <a href="login.php">einloggen');
}
?>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Andreas Krentl">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <title>VGMN - Startseite</title>
    <link rel="icon" href="Bilder/favicon.ico">
   

  </head>
  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Vergissmeinnicht Startseite</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Start.php">Start
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="analyse.php">Analyse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About.php">Über uns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Kontakt.php">Kontakt</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="row">
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="Berufe.php"><img class="card-img-top" src="Bilder/Start/wasmachternicht.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="Berufe.php">Was macht er nicht?</a>
              </h4>
              <p class="card-text"><b>Beschreibung: </b> In diesem Spiel müssen Sie die Tätigkeit auswählen, welche der dagestellte Beruf normalerweise nicht macht. <br />
								   <b>Anleitung:</b> Wählen sie die Tätigkeit aus, welche die Person auf dem Foto nicht macht. Hierzu klicken sie auf den jeweiligen Button.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="memory.php"><img class="card-img-top" src="Bilder/Start/memory.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="memory.php">Memory</a>
              </h4>
              <p class="card-text"><b>Beschreibung:</b> Ein Spiel das jeder kennt. Memory. Decken Sie die jeweils gleichen Paare auf, möglichst ohne Fehler. <br />
								   <b>Anleitung: </b> Starten Sie zunächst das Spiel. Danach decke eine Karte auf, danach eine weitere. Suchen Sie möglichst viele Paare!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="dragdrop.php"><img class="card-img-top" src="Bilder/Start/dragndrop.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="dragdrop.php">Drag and Drop</a>
              </h4>
              <p class="card-text"><b>Beschreibung: </b> Ein Spiel, bei dem es das Ziel ist, einen Lückentext zu vervollständigen. </br >
								   <b>Anleitung: </b> Ziehen Sie die Wörter die unten aufgelistet sind, in die entsprechende Lücke.</p>
            </div>
          </div>
        </div>
		
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="Bilder/Start/baldverfuegbar.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#"> Platzhalter für Spiel 4</a>
              </h4>
              <p class="card-text">Hier könnte eine Beschreibung und eine Anleitung stehen...</p>
            </div>
          </div>
        </div>

  
    <footer class="footer">
      <div class="container">
        <span class="text-muted">Made with &hearts; by Andreas Krentl </span>
      </div>
    </footer>
  </body>
</html>

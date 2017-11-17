<html>
<?php
session_start();
if(!isset($_SESSION['id_user'])) {
 die('Bitte zuerst <a href="login.php">einloggen</a>');
}
?>
<form action="berufe.php">
    <input type="submit" value="Start" />
</form>
</html>
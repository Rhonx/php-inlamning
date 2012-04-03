<?php
/**
  	* Registreringssidan
  	*	
	* @autor Kristoffer Walfridsson
*/
 	 session_start();
    if (!empty($_SESSION['a_namn'])) {
        header("Location: fanpage.php");
    }

// connectar till DB
require_once "dbcx.php";
$dbh = dbcx();
// Är användarnamnet ledigt?
$sql = "SELECT `a_namn` FROM `registrering` WHERE `a_namn` = :a_namn";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':a_namn', $_POST['a_namn']);
$stmt->execute();
$a_namn = $stmt->fetch();

if ($a_namn) {
  echo "Username already taken";
} 

//registrering av användaren
else {
require_once "generate-salt.php";
$salt = generateSalt();
$pass = crypt($_POST['pass'], '$6$' . $salt . '$');
$sql = "INSERT INTO `registrering` (`a_namn`, `pass`, `e_mail`, `f_namn`, `e_namn`)
	VALUES (:a_namn, :pass, :e_mail, :f_namn, :e_namn)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':a_namn', $_POST['a_namn']);
$stmt->bindParam(':pass', $_POST['pass']);
$stmt->bindParam(':e_mail', $_POST['e_mail']);
$stmt->bindParam(':f_namn', $_POST['f_namn']);
$stmt->bindParam(':e_namn', $_POST['e_namn']);
$stmt->execute();
}
?>


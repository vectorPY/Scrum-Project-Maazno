<HTML>
<HEAD>
<TITLE>Maazno</TITLE>
</HEAD>
<BODY>
    
<?php 

session_start();

include("../inc.php");

// print_r($_POST);

$username = $_POST['username'];
$vorname = $_POST['vorname'];
$name = $_POST['name'];
$telefon = $_POST['telefon'];
$ort_id = $_POST['ort_id'];
$straße = $_POST['straße'];
$hausnummer = $_POST['hausnummer'];
$email = $_POST['email'];
$passwort = $_POST['passwort'];
$passwort_wiederholen = $_POST['passwort_wiederholen'];

$hash_passwort = hash("sha512", $passwort);

$con = mysqli_connect($host, $user, $passwd, $datenbank) or die("Die Datenbank ist momentan nicht erreichbar!");

$sql = "INSERT INTO nutzer (username, vorname, name, telefon, ort_id, straße, hausnummer, email, passwort, ist_admin) 
  VALUES ('$username', '$vorname', '$name', '$telefon', $ort_id, '$straße', $hausnummer, '$email', '$hash_passwort', false)";

$unique = "SELECT username FROM nutzer WHERE username='$username'";

$user_vergeben = mysqli_query($con, $unique);
$count = mysqli_num_rows($user_vergeben);

// Rueckmeldungen zu den Eingaben bei der Registrierung

if (empty($username) || empty($vorname) || empty($name) || empty($telefon) 
	|| empty($ort_id) || empty($straße) || empty($hausnummer) || empty($email) || empty($passwort) || empty($passwort))
	echo "Achten Sie darauf alle Felder auszufüllen";
else {
	if ($count != 0) {

		echo "<br>";
		echo "<br>";
		echo "Der Benutzername ist bereits vergeben!";
		echo "<br>";

	} else {
		if ($passwort === $passwort_wiederholen) {
			if (mysqli_query($con, $sql))
				echo "Nutzer wurde ertsellt";
			else {
				echo "Beim Erstellen des Nutzers ist ein Fehler aufgetreten!";
				echo mysqli_error($con);
			}
		}
		else {
			echo "Die Passwörter stimmen nicht überein! Wiederhohlen sie ihre eingabe!";
		}
	}
}
?>


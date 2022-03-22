<?php 

session_start();

include("../inc.php");
include "../utils/user.php";

$username = $_POST['username'];
$passwort = $_POST['passwort'];

$hash_passwort = hash("sha512", $passwort);

$con = mysqli_connect($host,$user,$passwd,$datenbank) or die("Die Datenbank ist momentan nicht erreichbar!");

if(!empty($username) && !empty($passwort) && !empty($hash_passwort) && !is_numeric($username)) {

	//read from database
	$sql = "SELECT username, passwort, nutzer_id FROM nutzer WHERE username = '$username'";
	
    $result = mysqli_query($con, $sql);

	if($result) {
		if($result && mysqli_num_rows($result) > 0) {

			$username = mysqli_fetch_assoc($result);
					
			if($username['passwort'] === $hash_passwort) {

				$_SESSION['username'] = $username['username'];

				$_SESSION['nutzer_id'] = $username['nutzer_id'];

				// prüfen, ob der Nutzeraccount Admin - Rechte hat
				if (is_admin($con, $_SESSION["nutzer_id"])) {
					$_SESSION["admin"] = 1;
				} else {
					$_SESSION["admin"] = 0;
				}

				header("Location: ../index.php");
				die;
			}
		}
	}
	
	echo "Falscher username oder passwort!";

	} else {
		echo "Falscher username oder passwort!";
	}
?>


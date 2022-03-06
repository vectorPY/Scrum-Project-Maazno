<?php 

// Fehler anzeigen

ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );

// Daten für die Datenbankverbindung

$host = "localhost";
$user = "root";
$passwd = "";
$datenbank = "Maazno";

// erlaubte Datentypen für Bilder
$allowed = array("png", "jpg", "jpeg");

$con = mysqli_connect($host, $user, $passwd, $datenbank) or die("Failed to connect to the database");

?>
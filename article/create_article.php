<html>
    <head>
        <title>
            Neuer Artikel
        </title>
    </head>
</html>

<?php 

include "../inc.php"; // Daten für die Datenbank inkludieren


// auf die via POST request übermittelten Daten zugreifen
$name = $_POST["name"];
$price = $_POST["price"];
$picture = $_POST["picture"];
$description = $_POST["description"];
$c_id = $_POST["c_id"];

// Datenbankverbindung aufbauen
$con = mysqli_connect($host, $user, $passwd, $datenbank) or die("Failed to connect to the database");

?>
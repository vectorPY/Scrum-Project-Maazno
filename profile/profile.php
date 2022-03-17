<html>
    <head>
        <title>
            Profilübersicht
        </title>
    </head>
</html>

<?php

session_start();

// redirect zur index Seite, wenn nicht eingeloggt
if (empty($_SESSION["nutzer_id"])) {
    header("Location: ../index.php");
}

include_once "../static/header.php";

echo "<center><h1>Ihr Profil</h1></center><br>";

include "../inc.php";
include "../utils/alert.php";

$con = mysqli_connect($host, $user, $passwd, $datenbank) or die("Die Datenbank ist momentan nicht erreichbar!");

// Nutzer - Id aus der Session entnehmen
$user = $_SESSION["nutzer_id"];

// Nutzerdaten abfragen
$query = "SELECT * FROM nutzer, ort, land WHERE nutzer.ort_id=ort.ort_id AND ort.land_id=land.land_id AND nutzer_id=$user;";         
$result = mysqli_query($con, $query);

if ($result->num_rows == 0) {
    php_alert( "Es gibt keine Ergebnisse" );
    header("Refresh: 1; URL=" . $base_url . "../index.html");
} else {  
    // Werte werden in einem Array gespeichert
    $r = $result->fetch_assoc();
    $row = array_values($r);
    
    // Tabelle ausgeben
    echo "
        <div class='row justify-content-center'>
            <div class='col-auto'>
                <table border=1 class='table table-dark table-hover'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Attribut</th>
                        <th>Wert</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nachname:</td>
                        <td> $row[1]</td>
                    </tr>
                    <tr>
                        <td>Vorname:</td>
                        <td> $row[2]</td>
                    </tr>
                    <tr>
                        <td>Telefonnummer:</td>
                        <td> $row[3]</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td> $row[8]</td>
                    </tr>
                    <tr>
                        <td>Straße:</td>
                        <td> $row[4]</td>
                    </tr>
                    <tr>
                        <td>Hausnummer:</td>
                        <td> $row[5]</td>
                    </tr>
                    <tr>
                        <td>Ort:</td>
                        <td> $row[9]</td>
                    </tr>
                    <tr>
                        <td>PLZ:</td>
                        <td> $row[10]</td>
                    </tr>
                    <tr>
                        <td>Land:</td>
                        <td> $row[13]</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    ";
} 

include_once "../static/footer.php";

?>
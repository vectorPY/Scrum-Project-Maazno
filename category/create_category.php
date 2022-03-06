<html>
    <head>
        <title>
            Neue Kategorie
        </title>
    </head>
</html>

<?php 


include "../inc.php"; // Daten für die Datenbank inkludieren


// auf die via POST request übermittelten Daten zugreifen
$kategorie = $_POST["kategorie"];


$con = mysqli_connect($host, $user, $passwd, $datenbank) or die("Failed to connect to the database");

// keine leeren Eingaben erlaubt
if (empty($kategorie) ) {
    echo "Achten Sie bitte darauf alle erforderlichen Daten einzugeben";
} else {
        $sql = "INSERT INTO kategorie(kategorie) VALUES ('$kategorie')";
        
        if (mysqli_query($con, $sql)) {
            echo "Kategorie wurde erstellt";
        } else {   
            // TODO: error handling überarbeiten
            echo mysqli_error($con); // Ausgabe eines Fehlers
        }

    } 
?>
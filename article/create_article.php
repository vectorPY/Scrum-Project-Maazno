<html>
    <head>
        <title>
            Neuer Artikel
        </title>
    </head>
</html>

<?php 

include "../inc.php"; // Daten für die Datenbank inkludieren
include "../utils/article.php"; // Funktionen, die mehrfach verwendet werden

// auf die via POST request übermittelten Daten zugreifen
$name = $_POST["name"];
$price = $_POST["price"];
$picture = $_FILES["picture"]; // über FILES kommen wir an das Bild
$description = $_POST["description"];
$c_id = $_POST["c_id"];

if (empty($name) || empty($price) || empty($description) || empty($c_id)) {
    echo "Achten Sie bitte darauf alle erforderlichen Daten einzugeben";
} else {
    // Datenbankverbindung aufbauen
    $con = mysqli_connect($host, $user, $passwd, $datenbank) or die("Failed to connect to the database");

    $valid_id = valid_category_id($con, $c_id);

    // Kategorie existiert
    if ($valid_id) {
        $filename = basename($picture["name"]);
        $filetype = pathinfo($filename, PATHINFO_EXTENSION); 
        
        // Datentyp ist erlaubt
        if (in_array($filetype, $allowed)) {
            $image = $picture['tmp_name']; 
            $content = addslashes(file_get_contents($image)); 

            $sql = "INSERT INTO artikel(name, preis, bild, beschreibung, kategorie_id) VALUES ('$name', $price, '$content', '$description', $c_id)";
            
            if (mysqli_query($con, $sql)) {
                echo "Erstellt";
            } else {
                echo mysqli_error($con);
            }

        } else {
            echo "Datentyp ist nicht korrekt";
        }
    } else {
        echo "Wähle bitte eine existierende Kategorie";
    }
}

?>
<?php 

include_once("../static/header.php");

include "../inc.php";
include "../utils/article.php";

$con = mysqli_connect($host, $user, $passwd, $datenbank) or die("Die Datenbank ist momentan nicht erreichbar!");

// der geg. Suchbegriff
$search = $_POST["search"];

// Abfrage der Artikel
$res = search_article($con, $search);

?>

<div class="container">

    <?php
    $counter = 0;

    echo '<div class="row">';

    while ($row_article = mysqli_fetch_assoc($res)) {
        if ($counter % 4 == 0 and $counter != 0) {
            echo '</div>';
            echo '<br>';
            echo '<div class="row">';
        }

        // HTML code zum Hinzufueguen der Artikel als "cards"
        echo '<div class="col-sm-3" >';
        echo '<a href="../article/article_detailed_view.php?article_id='. $row_article["artikel_id"] .'" class="text-decoration-none text-reset">';
        echo '<div class="card h-100">';
        echo '<img src="data:image/jpg/png/;charset=utf8;base64,'. base64_encode($row_article["bild"]) .'" class="card-img-top" alt="'. $row_article["name"] .'">';
        echo '<div class="card-body">';
        echo '<h4>'. $row_article["name"] .'</h4>'. $row_article["preis"] .'&euro;';
        echo '</div></div></a>';
        echo '</div>';
        $counter++;
    }

    echo '</div>';

    include_once("../static/footer.php");
    ?>

</div>
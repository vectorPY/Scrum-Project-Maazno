<?php
    include_once("../static/header.php");
    include_once("../utils/article.php");
    include_once("../inc.php");
?>

<div class="container">

    <?php 
        $article = get_all_article($con);
        $counter = 0;
        echo '<div class="row">';
        // Schleife, zur hinzufuegung der Artikel in den view
        while($row_article = mysqli_fetch_assoc($article)){
            // counter zaehlt, wie viele Elemente sich schon in der Reihe befinden und geht in die neue Reihe, wenn es vier Elemente in der Reihe gibt
            if ($counter % 4 == 0 and $counter != 0){
                echo '</div>';
                echo '<br>';
                echo '<div class="row">';
            }
            // HTML code zur hinzufuegung der Artikel als "cards"
            echo '<div class="col-sm-3" >';
            echo '<a href="article_detailed_view.php?article_id='. $row_article["artikel_id"] .'" class="text-decoration-none text-reset">';
            echo '<div class="card h-100">';
            echo '<img src="data:image/jpg/png/;charset=utf8;base64,'. base64_encode($row_article["bild"]) .'" class="card-img-top" alt="'. $row_article["name"] .'">';
            echo '<div class="card-body">';
            echo '<h4>'. $row_article["name"] .'</h4>'. $row_article["preis"] .'&euro;';
            echo '</div></div></a>';
            echo '</div>';
            $counter++;
        }
        echo '</div>';
    ?>


<?php
    include_once("../static/footer.php");
?>
<?php
    include_once("../static/header.php");
    include_once("../utils/article.php");
    include_once("../inc.php");

?>

<div class="container">
    <!-- Form welches nach den parametern zum sortieren fragt und zur gleichen Seite zurueck leitet -->
    <form action="/Scrum-Project-Maazno/article/article_view.php" method="post"> 
        <div class="row"> 
            <div class="col-sm-5"></div>
            <div class="col-sm-3">
                Kategorie: <select class="form-select-sm" aria-label="kategorie_id" name="kategorie_id"> <!-- Dropdownmenue fuer die Kategorien -->
                    <option selected value="alles">Alles</option>
                    <?php 
                        $kategorie = get_all_kategorie($con);
                        // Schleife, die alle Kategorien zum dropdownmenue hinzufuegt
                        while ($kategorie_row = mysqli_fetch_assoc($kategorie)){
                            echo '<option value="'. $kategorie_row["kategorie_id"] .'">'. $kategorie_row["kategorie"] .'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                Sortieren nach: <select class="form-select-sm" aria-label="sort" name="sort"> <!-- Dropdownmenue nach was sortiert werden soll -->
                    <option selected value="name_asc">Name &uarr;</option>
                    <option value="name_desc">Name &darr;</option>
                    <option value="preis_asc">Preis &uarr;</option>
                    <option value="preis_desc">Preis &darr;</option>
                </select>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-success">Sort</button> <!-- Knopf zum abschicken des Forms -->
            </div>
        </div>
    </form>

    <?php 
        // Prüfen ob der Nutzer eine Abfrage betätigt hat
        if (isset($_POST["kategorie_id"])){
            $kategorie_id = $_POST["kategorie_id"];
            $sort = $_POST["sort"];
        }
        else{ // wenn nicht wird nach den Standatwerten sortiert
            $kategorie_id = "alles";
            $sort = "name_asc";
        }
        // Abfrage nach den Artikeln sortiert
        $value = get_sorted_article($con, $kategorie_id, $sort);
        $counter = 0;


        echo '<div class="row">';  
        // Schleife, zur hinzufuegung der Artikel in den view
        while($row_article = mysqli_fetch_assoc($value)){
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
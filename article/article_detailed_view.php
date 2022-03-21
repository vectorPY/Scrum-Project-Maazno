<?php
    include_once("../static/header.php");
    include_once("../utils/article.php");
    include_once("../inc.php");
?>


<div class="container">
    <div class="row">
        <div class="col-5">
            <?php
                $article = mysqli_fetch_assoc(get_one_article($con, $_GET["article_id"])); //Alle Informationen des Artikels auf article speichern
                echo '<div class="sticky-top" style="top: 73px"><img src="data:image/jpg/png/;charset=utf8;base64,'. base64_encode($article["bild"]) .'" class="card-img-top" alt="'. $article["name"] .'"></div>'; //Bild anzeigen
            ?>
        </div>
        <div class="col-4"> <!-- Name, Preis, Beschreibung anzeige -->
            <h1><?php echo "<br>". $article["name"]. "<br><hr>"?></h2>
            <h4><?php echo "Preis: ".$article["preis"]."&euro; <br><hr>"?></h4>
            <?php echo $article["beschreibung"]?>
        </div>
        <div class="col-3 "> <!-- Fenster zum hinzufuegen zum Warenkorb -->
            <div class="card sticky-top" style="top: 88px">
                <br>
                <div class="text-center">
                    <h4><?php echo $article["preis"]?> &euro; </h4>
                    <hr>
                </div>
                <?php //Fallunterscheidung ob der User eingeloggt ist um zu gucken wohin der User geleitet wird
                    if (isset($_SESSION['nutzer_id'])){ //User ist eingeloggt
                        echo '<form action="/Scrum-Project-Maazno/cart/add_to_cart.php" method="post">'; //Artikel wird zum Warenkorb hinzugefuegt
                    }
                    else{ //User ist nicht eingeloggt
                        echo '<form action="/Scrum-Project-Maazno/auth/login_form.php" method="post">'; //User wird zum login geleitet
                    }
                ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                Menge:
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="menge"> <!-- Auswahl zur Menge an Artikeln -->
                                    <option value="1"selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <?php 
                            if (isset($_SESSION['nutzer_id'])){ //guckt ob User eingeloggt ist um Fehler zu vermeiden
                                echo '<input type="hidden" name="artikel_id" value="'. $article["artikel_id"] .'">';
                                echo '<input type="hidden" name="nutzer_id" value="'. $_SESSION['nutzer_id'] .'">';
                            }
                        ?>
                        <br>
                        <button type="submit" class="btn btn-warning w-100">In den Warenkorb<img src="../img/shopping-cart.svg" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once("../static/footer.php");
?>
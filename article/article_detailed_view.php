<?php
    include_once("../static/header.php");
    include_once("../utils/article.php");
    include_once("../inc.php");
?>


<div class="container">
    <div class="row">
        <div class="col-5">
            <?php
                $article = mysqli_fetch_assoc(get_one_article($con, $_GET["article_id"]));
                echo '<div class="sticky-top" style="top: 56px"><img src="data:image/jpg/png/;charset=utf8;base64,'. base64_encode($article["bild"]) .'" class="card-img-top" alt="'. $article["name"] .'"></div>';
            ?>
        </div>
        <div class="col-4">
            <h1><?php echo "<br>". $article["name"]. "<br><hr>"?></h2>
            <h4><?php echo "Preis: ".$article["preis"]."&euro; <br><hr>"?></h4>
            <?php echo $article["beschreibung"]?>
        </div>
        <div class="col-3 ">
            <div class="card sticky-top" style="top: 88px">
                <br>
                <h4><div class="text-center"><?php echo $article["preis"]?>&euro;<p><hr></h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            Menge:
                        </div>
                        <div class="col-8">
                            <form action="../cart/add_to_cart.php" method="post">
                                <select class="form-select form-select-sm" name="menge">
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
                        <?php echo '<input type="hidden" name="artikel_id" value="'. $article["artikel_id"] .'">' ?>
                        <?php echo '<input type="hidden" name="nutzer_id" value="'. $_SESSION['nutzer_id'] .'">' ?>
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
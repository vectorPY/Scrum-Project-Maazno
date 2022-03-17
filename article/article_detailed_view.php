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
        <div class="col-5">
            <h1><?php echo "<br>". $article["name"]. "<br><hr>"?></h2>
            <h4><?php echo "Preis: ".$article["preis"]."&euro; <br><hr>"?></h4>
            <?php echo $article["beschreibung"]?>
        </div>
        <div class="col-2">
            <br><br>
            <div class="card h-100">
                <h4><?php echo $article["preis"]."&euro; <br><hr>"?></h4>
                <div class="card-body">
                    <form action="../cart/add_to_card.php" method="post">
                        Menge: <input type="number" name="menge" id="1">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once("../static/footer.php");
?>
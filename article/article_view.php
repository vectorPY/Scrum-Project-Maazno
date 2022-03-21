<?php
    include_once("../static/header.php");
    include_once("../utils/article.php");
    include_once("../inc.php");

?>


<body class="text-center">
<br>
    <h1 class="h3 mb-3 fw-normal">Kategorieauswahl (optional) </h1>  
    <form method="post">
    
    <div class="form-check form-check-inline">
    <input type="checkbox" name='alle' value="Alle"> Alle <br/>
    </div>

    <div class="form-check form-check-inline">
    <input type="checkbox" name='küchenutensilien' value="Küchenutensilien"> Küchenutensilien <br/>
    </div>

    <div class="form-check form-check-inline">
    <input type="checkbox" name='spiel' value="Spiel"> Spiel <br/>
    </div>
    <br>
    <br>
    <h1 class="h3 mb-3 fw-normal">Bitte wählen sie  eine Option aus! </h1>
    <form method="post">
        
        <input type="checkbox" name='preis' value="Preis"> Preis absteigend <br/>
        <input type="checkbox" name='preis2' value="Preis"> Preis aufsteigend <br/>
        <input type="checkbox" name='name' value="Name"> Name aufsteigend <br/>
        <input type="checkbox" name='name2' value="Name"> Name absteigend <br/>
        <br>
        <br>
        <input type="submit" value="Submit" name="submit">
        <br>
        <br>
    </form>
        


<div class="container">

    <?php 
        echo '<div class="row">';

        $value = get_all_article($con);
        $counter = 0;
        
        if (isset($_POST['preis'])) {
            $value = order_article_preis($con);
        } else if (isset($_POST['preis2'])) {
            $value = order_article_preis_asc($con);
        } else if (isset($_POST['name'])) {
            $value = order_article_name($con);
        } else if (isset($_POST['name2'])) {
            $value = order_article_name_desc($con);
        } else if (isset($_POST['alle'])) {
            $value = get_all_article($con);
        } else if (isset($_POST['küchenutensilien'])) {
            $value = get_all_article_kuechenutensilien($con);
        } else if (isset($_POST['spiel'])) {
            $value = get_all_article_spiel($con);
        } 

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









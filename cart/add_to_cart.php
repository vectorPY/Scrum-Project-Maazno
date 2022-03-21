<?php
    include_once("../inc.php");
    include_once("../utils/cart.php");

    
    // Informationen aus POST herausnehmen 
    $anzahl= $_POST["menge"];
    $artikel_id = $_POST["artikel_id"];
    $nutzer_id = $_POST["nutzer_id"];
    
    add_to_cart($con, $artikel_id, $anzahl, $nutzer_id); //Artikel in den Warenkorb hinzufuegen
    header("Location: ../index.php"); //Umleiten zur homepage
    exit; //Beenden des Codes
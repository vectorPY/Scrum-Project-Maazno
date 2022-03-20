<?php 

/** 
 * überprüft, ob die Kategorie id existiert
 * 
 * @param con: die Datenbankverbindung
 * @param c_id: Die Id der Kategorie
 * 
 * @return: true/false entsprechend der Beschreibung
*/ 
function valid_category_id($con, $c_id) {
    $sql = "SELECT * FROM kategorie WHERE kategorie_id = $c_id";

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res))
        return true;
    else
        return false;
}

/**
 * gibt alle Attribute von artikel zurück
 *
 * @param  con: die Datenbankverbindung
 * @return object mysqli_result mit allen Attributen der Antwort.
 */
function get_all_article($con){
    $sql = "SELECT `artikel_id`, `name`, `preis`, `bild`, `beschreibung`, `kategorie_id` FROM `artikel` ORDER BY artikel_id;";

    return mysqli_query($con, $sql);
}

/**
 * gibt alle Attribute von artikel zurück, welche die Kategorie Küchenutensilien haben
 *
 * @param  con: die Datenbankverbindung
 * @return object mysqli_result mit allen Attributen der Antwort.
 */
function get_all_article_kuechenutensilien($con){
    $sql = "SELECT `artikel_id`, `name`, `preis`, `bild`, `beschreibung`, `kategorie_id` FROM `artikel` WHERE `kategorie_id` = 2 ORDER BY artikel_id;";

    return mysqli_query($con, $sql);
}

/**
 * gibt alle Attribute von artikel zurück, welche die Kategorie Spiel haben
 *
 * @param  con: die Datenbankverbindung
 * @return object mysqli_result mit allen Attributen der Antwort.
 */
function get_all_article_spiel($con){
    $sql = "SELECT `artikel_id`, `name`, `preis`, `bild`, `beschreibung`, `kategorie_id` FROM `artikel` WHERE `kategorie_id` = 1 ORDER BY artikel_id;";

    return mysqli_query($con, $sql);
}


function get_one_article($con, $artikel_id){
    $sql = "SELECT `artikel_id`, `name`, `preis`, `bild`, `beschreibung`, `kategorie_id` FROM `artikel` WHERE artikel_id=$artikel_id;";

    return mysqli_query($con, $sql);
}
/** 
 * Sucht nach bestimmten Artikel (anhand des Namens)
 * 
 * @param con: die Datenbankverbindung
 * @param search: Der String nach dem gesucht wird
 * 
 * @return object mysqli_result mit den passenden Artikeln
*/ 
function search_article($con, $search) {
    $sql = "SELECT * FROM artikel WHERE artikel.name LIKE '%$search%'";

    return mysqli_query($con, $sql);
}


/**
 * gibt alle Attribute von artikel nach Preis absteigend sortiert zurück
 *
 * @param  con: die Datenbankverbindung
 * @return object mysqli_result mit allen Attributen nach Preis absteigend sortiert.
 */
function order_article_preis($con){
    $sql = "SELECT `artikel_id`, `name`, `preis`, `bild`, `beschreibung`, `kategorie_id` FROM `artikel` ORDER BY preis desc;";

    return mysqli_query($con, $sql);
}

/**
 * gibt alle Attribute von artikel nach Preis aufsteigend zurück
 *
 * @param  con: die Datenbankverbindung
 * @return object mysqli_result mit allen Attributen nach Preis aufsteigend sortiert.
 */
function order_article_preis_asc($con){
    $sql = "SELECT `artikel_id`, `name`, `preis`, `bild`, `beschreibung`, `kategorie_id` FROM `artikel` ORDER BY preis asc;";

    return mysqli_query($con, $sql);
}

/**
 * gibt alle Attribute von artikel nach Name sortiert zurück
 *
 * @param  con: die Datenbankverbindung
 * @return object mysqli_result mit allen Attributen nach Name sortiert.
 */
function order_article_name($con){
    $sql = "SELECT `artikel_id`, `name`, `preis`, `bild`, `beschreibung`, `kategorie_id` FROM `artikel` ORDER BY name;";

    return mysqli_query($con, $sql);
}

/**
 * gibt alle Attribute von artikel nach Name absteigend sortiert zurück
 *
 * @param  con: die Datenbankverbindung
 * @return object mysqli_result mit allen Attributen nach Name absteigend sortiert.
 */
function order_article_name_desc($con){
    $sql = "SELECT `artikel_id`, `name`, `preis`, `bild`, `beschreibung`, `kategorie_id` FROM `artikel` ORDER BY name desc;";

    return mysqli_query($con, $sql);
}
?>
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
?>
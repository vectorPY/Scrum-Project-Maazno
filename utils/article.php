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
 * gibt die Attribute eines Artikels zurueck
 *
 * @param  con: die Datenbankverbindung
 * @param  string $artikel_id
 * @return object mysqli_result mit dem Artikel mit gefragter Artikelnummer
 */
function get_one_article($con, $artikel_id){
    $sql = "SELECT * FROM `artikel` WHERE artikel_id=$artikel_id;";

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
 * Gibt alle Artikel aus, nach welchen gefiltert wurde
 *
 * @param  con: die Datenbankverbindung
 * @param  string $kategorie_id: String mit der Kategorie_id oder mit "alles"
 * @param  string $sort: String der bestimmt nach was sortiert wird
 * @return mysqli_result mit den passenden Artikeln
 */
function get_sorted_article($con, $kategorie_id, $sort){
    if ($kategorie_id == "alles"){
        if ($sort == "preis_asc"){
            $sql = 'SELECT * FROM `artikel` ORDER BY `preis` ASC;';
        }
        elseif ($sort == "preis_desc"){
            $sql = 'SELECT * FROM `artikel` ORDER BY `preis` DESC;';
        }
        elseif ($sort == "name_asc"){
            $sql = 'SELECT * FROM `artikel` ORDER BY `name` ASC;';
        }
        elseif ($sort == "name_desc"){
            $sql = 'SELECT * FROM `artikel` ORDER BY `name` DESC;';
        }
    }
    else{
        if ($sort == "preis_asc"){
            $sql = 'SELECT * FROM `artikel` WHERE `kategorie_id`='. $kategorie_id .' ORDER BY `preis` ASC;';
        }
        elseif ($sort == "preis_desc"){
            $sql = 'SELECT * FROM `artikel` WHERE `kategorie_id`='. $kategorie_id .' ORDER BY `preis` DESC;';
        }
        elseif ($sort == "name_asc"){
            $sql = 'SELECT * FROM `artikel` WHERE `kategorie_id`='. $kategorie_id .' ORDER BY `name` ASC;';
        }
        elseif ($sort == "name_desc"){
            $sql = 'SELECT * FROM `artikel` WHERE `kategorie_id`='. $kategorie_id .' ORDER BY `name` DESC;';
        }
    }

    return mysqli_query($con, $sql);
}

/**
 *
 * @param con: die Datenbankverbindung
 *
 * @return object mysqli_result mit den passenden Kategorien
 */
function get_all_kategorie($con){
    $sql = "SELECT * FROM `kategorie`";

    return mysqli_query($con, $sql);
}

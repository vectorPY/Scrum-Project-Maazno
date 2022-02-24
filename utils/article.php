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
?>
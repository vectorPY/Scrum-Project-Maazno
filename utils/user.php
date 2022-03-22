<?php 

/**
 * prüft, ob ein geg. Nutzer ein Admin ist
 * 
 * @param con: die Datenbankverbindung
 * @param id: die Nutzer ID 
 * 
 * @return: true, wenn admin, sonst false
 */
function is_admin($con, $id) {
    $sql = "SELECT ist_admin FROM nutzer WHERE nutzer.nutzer_id = $id";

    $res = mysqli_query($con, $sql);

    if ($res)
        return true;
    return false;
}

?>
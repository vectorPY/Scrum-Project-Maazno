<?php
    
    function add_to_cart($con, $artikel_id, $anzahl, $nutzer_id){
        $sql = "INSERT INTO `im_warenkorb`(`artikel_id`, `anzahl`, `nutzer_id`) VALUES ('$artikel_id','$anzahl','$nutzer_id')";

        mysqli_query($con, $sql);
    }
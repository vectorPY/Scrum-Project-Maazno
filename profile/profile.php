<?php

require_once('connection.php');

session_start();

$user = 1;
$query="select * from nutzer,ort,land where nutzer.ort_id=ort.ort_id and ort.land_id=land.land_id and nutzer_id=$user;";     #sql abfrage mit suche nach dem user      
$result=mysqli_query($con,$query);
if($result->num_rows == 0){
    echo "es gibt keine ergebnisse";
    header("location:link.html");
}else{  
    $r = $result->fetch_assoc();
    $row=array_values($r);
print_r ($row);
    echo "
    <ul class='list-group'>
        <li class='list-group-item'>$row[0]</li>
        <li class='list-group-item'>$row[1]</li>
        <li class='list-group-item'>$row[2]</li>
        <li class='list-group-item'>$row[3]</li>
        <li class='list-group-item'>And a fifth one</li>
    </ul>
    ";
} 
       
       
?>
<?php

include "../inc.php";
$con = mysqli_connect($host,$user,$passwd,$datenbank) or die("Die Datenbank ist momentan nicht erreichbar!");

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
    <table >
    <thead>
        <tr>
            <th>Deine Profilübersicht</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nachname:</td>
            <td> $row[1]</td>
        </tr>
        <tr>
            <td>Vorname:</td>
            <td> $row[2]</td>
        </tr>
        <tr>
            <td>Telefonnummer:</td>
            <td> $row[3]</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td> $row[8]</td>
        </tr>
        <tr>
            <td>Straße:</td>
            <td> $row[4]</td>
        </tr>
        <tr>
            <td>Hausnummer:</td>
            <td> $row[5]</td>
        </tr>
        <tr>
            <td>Passwort:</td>
            <td> $row[6]</td>
        </tr>

        <tr>
            <td>Ort:</td>
            <td> $row[9]</td>
        </tr>
        <tr>
            <td>PLZ:</td>
            <td> $row[10]</td>
        </tr>
        <tr>
            <td>Land:</td>
            <td> $row[12]</td>
        </tr>
        </tbody>
    </table>>
    ";
} 
       
       
?>
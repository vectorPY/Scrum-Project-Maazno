<?php 

include "../inc.php";
include "../utils/article.php";

$con = mysqli_connect($host, $user, $passwd, $datenbank) or die("Die Datenbank ist momentan nicht erreichbar!");

$search = $_POST["search"];

$res = search_article($con, $search);

$rows = mysqli_fetch_all($res);

print_r($rows);

?>
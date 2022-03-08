<?php
$artikel_id = $_GET["artikel_id"];     //artikel_id aus der URL
$action = $_GET["action"]; //action aus der URL

switch($action) {   //entscheiden
case "add":
$_SESSION["warenkorb"][$artikel_id]++; //hinzufuegen der Menge des Produktes $artikel_id
break;
case "remove":
$_SESSION["warenkorb"][$artikel_id]--; //entfernen der Menge des Produktes $artikel_id
if($_SESSION["warenkorb"][$artikel_id] == 0) unset($_SESSION["warenkorb"][$artikel_id]); //Falls die Menge Null ist, wird sie vollständig entfernt
case "empty":
unset($_SESSION["warenkorb"]); //den Warenkorb leeren
break;
}

if($_SESSION["warenkorb"]) {
foreach($_SESSION["warenkorb"] as $artikel_id => $anzahl) {
$result = mysql_query("SELECT * FROM product WHERE id = "$artikel_id"");
if(isset($result)) {
while($row = mysql_fetch_assoc($result)) {
$artikel.preis = $row["artikel.preis"]
$line_cost = $artikel.preis * $anzahl;
$total = $total + $line_cost;
?>
<tr>
<td><?php echo $row ["artikel.name"]; ?></td>
<td><?php echo $row ["artikel.preis"]; ?></td>
<td><?php echo $row ["anzahl"]; ?></td>
<td><?php echo "<a href="$_SERVER[PHP_SELF]$action=remove&artikel_id={$result["artikel_id"]}" class="btn btn-warning btn-fill btn-sm pull-right">Remove</a>"; ?></td>
<td><?php echo $line_cost; ?></td>
</tr>
<?php
}
}
}
} else {
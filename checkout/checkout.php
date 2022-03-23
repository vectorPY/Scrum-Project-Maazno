<?php
include_once("../static/header.php");
include_once("../utils/article.php");
include_once("../inc.php");
$userId = 0;
if (@$_SESSION['nutzer_id']) {
    $userId = $_SESSION['nutzer_id'];
}
$newSql = "SELECT artikel.bild as bild,artikel.name as name,im_warenkorb.anzahl as anzahl,artikel.preis as preis  FROM im_warenkorb INNER  JOIN artikel ON im_warenkorb.artikel_id = artikel.artikel_id WHERE im_warenkorb.nutzer_id = '$userId' ORDER  BY  im_warenkorb.created_at DESC";
$total = 0;
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rs = mysqli_query($con, $newSql);
                    if (mysqli_num_rows($rs) > 0):
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($rs)):

                ?>

                    <tr>
                        <td><?=$count?></td>
                        <td><img style="max-width: 50px" src="data:image/jpg/png/;charset=utf8;base64,<?=base64_encode($row['bild'])?>" alt=""></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['anzahl']?></td>
                        <td><?=($row['anzahl'] * ($row['preis']))?>€</td>
                        <?php $total = $total + ($row['anzahl'] * ($row['preis'])) ?>
                    </tr>
                            <?php
                                $count++;
                            ?>
                <?php endwhile;  ?>
                        <tr>
                            <td colspan="4" style="text-align: right;margin-right: 10px">Total</td>
                            <td><?=$total?>€</td>
                        </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <?php if ($total > 0): ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include_once("../static/footer.php");
?>

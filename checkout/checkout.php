<?php
include_once("../static/header.php");
include_once("../utils/article.php");
include_once("../inc.php");
$userId = 0;
if (@$_SESSION['nutzer_id']) {
    $userId = $_SESSION['nutzer_id'];
}
$newSql = "SELECT artikel.bild as bild,artikel.name as name,cart.qty as qty,artikel.preis as preis  FROM cart INNER  JOIN artikel ON cart.product_id = artikel.artikel_id WHERE cart.user_id = '$userId' ORDER  BY  cart.created_at DESC";
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
                        <td><?=$row['qty']?></td>
                        <td><?=($row['qty'] * ($row['preis']))?>€</td>
                        <?php $total = $total + ($row['qty'] * ($row['preis'])) ?>
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
<!--                <a href="checkout-success.php" class="btn btn-success">Checkout</a>-->
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include_once("../static/footer.php");
?>

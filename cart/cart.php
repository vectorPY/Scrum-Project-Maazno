<?php
session_start();

include("../inc.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $con = mysqli_connect($host,$user,$passwd,$datenbank);
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $userId = $_POST['user_id'];
    if ($userId > 0){
        $sql = "INSERT INTO  cart(product_id,user_id,qty) VALUES('$id','$userId','$qty')";
        $result = mysqli_query($con, $sql);
        $html = '';
        if ($result){
            $newSql = "SELECT artikel.bild as bild,artikel.name as name,cart.qty as qty,artikel.preis as preis  FROM cart INNER  JOIN artikel ON cart.product_id = artikel.artikel_id WHERE cart.user_id = '$userId' ORDER  BY  cart.created_at DESC";
            $rs = mysqli_query($con, $newSql);
            if (mysqli_num_rows($rs) > 0){
                while($row = mysqli_fetch_assoc($rs)){
                    $html .='<li>
                            <div class="media">
                                <img style="max-width: 60px;float: left" class="align-self-center mr-3" src="data:image/jpg/png/;charset=utf8;base64,'.base64_encode($row['bild']).'" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0">'.$row['name'].'</h5>
                                    <span class="d-block">Quantity: '.$row['qty'].'</span>
                                    <span class="d-block">Price: '.((int) $row['qty'] * (int)$row['preis']).'</span>
                                </div>
                            </div>
                        </li><hr>';
                }
                $html .='<li><a href="checkout/checkout.php">See All Product</a></li>';
                echo json_encode([
                   'status'=>true,
                   'data'=> $html
                ]);
                die();
            }
        }
    }
}

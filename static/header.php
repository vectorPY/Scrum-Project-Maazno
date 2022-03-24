<!-- HTML/PHP code, für die Navigationbar -->
<?php
	session_start();
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<!doctype html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://use.fontawesome.com/67ed5102d2.js"></script>
		<title>Maazno</title>
	</head>

	<body>
		<!--Navbar-->
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="/Scrum-Project-Maazno/index.php">
					<img src="/Scrum-Project-Maazno/image/maazno_logo_invis.png" alt="Logo" width="65" height="35" class="d-inline-block align-text-top">
					Maazno
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="/Scrum-Project-Maazno/index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/Scrum-Project-Maazno/article/article_view.php">Artikel&uuml;bersicht</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/Scrum-Project-Maazno/cart/cart.php">Warenkorb</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">K&auml;ufe</a>
						</li>
						<?php

						// admin privilegien überprüfen
						if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
							echo '
								<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="/Scrum-Project-Maazno/article/create_article_form.php">Artikel erstellen</a>
										<a class="dropdown-item" href="/Scrum-Project-Maazno/category/create_category_form.php">Kategorie erstellen</a>
									</div>
								</li>
							';
						}

						// Fallunterscheidung für wenn der Nutzer eingeloggt ist und wenn nicht.
						if (isset($_SESSION["username"])){ //Eingeloggt
							echo '<li class="nav-item"><a class="nav-link" href="/Scrum-Project-Maazno/profile/profile.php">Profil</a></li>';
							echo '<li class="nav-item"><a class="nav-link" href="/Scrum-Project-Maazno/auth/logout.php">Logout</a></li>';
						}
						else{ //nicht Eingeloggt
							echo '<li class="nav-item"><a class="nav-link" href="/Scrum-Project-Maazno/auth/register_form.php">Register</a></li>';
							echo '<li class="nav-item"><a class="nav-link" href="/Scrum-Project-Maazno/auth/login_form.php">Login</a></li>'; 
						}

						?>
					</ul>
				</div>
				 <div class="container-fluid">
            <form class="d-flex justify-content-end">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <ul id="cart-item" style="width: 400px" class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="navbarDropdownMenuLink">

                                <?php
                                $newSql = "SELECT artikel.bild as bild,artikel.name as name,cart.qty as qty,artikel.preis as preis  FROM cart INNER  JOIN artikel ON cart.product_id = artikel.artikel_id WHERE cart.user_id = '$userId' ORDER  BY  cart.created_at DESC";
                                $rs = mysqli_query($con, $newSql);
                                if (mysqli_num_rows($rs) > 0):
                                    while ($row = mysqli_fetch_assoc($rs)):
                                        ?>
                                        <li>
                                            <div class="media">
                                                <img style="max-width: 60px;float: left" class="align-self-center mr-3"
                                                     src="data:image/jpg/png/;charset=utf8;base64,<?=base64_encode($row['bild'])?>"
                                                     alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mt-0"><?= $row['name'] ?></h5>
                                                    <span class="d-block">Quantity: <?=$row['qty']?></span>
                                                    <span class="d-block">Price: <?=((int) $row['qty'] * (int)$row['preis'])?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                    <?php endwhile; ?>
                                    <li><a href="<?=$baseUrl.'checkout/checkout.php'?>">Checkout</a></li>
                                    <?php else: ?>
                                    <li>Your cart is empty</li>
                                    <?php endif; ?>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</nav>
<br><br><br><br>
<style>
    #cart-item {
        padding: 20px;
    }

    #cart-item .media {
        display: flex;
        justify-content: start;
    }

    #cart-item .media-body {
        float: left;
        overflow: hidden;
        margin-left: 20px;
    }

    #cart-item .media-body h5 {
        margin: 0;
        padding: 0;
    }
</style>

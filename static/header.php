<!-- HTML/PHP code, für die Navigationbar -->
<?php
	session_start();
?>

<!doctype html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Maazno</title>
	</head>

	<body>
		<!--Navbar-->
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="/Scrum-Project-Maazno/index.php">
					<img src="" alt="Logo" width="80" height="24" class="d-inline-block align-text-top">
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
						// Fallunterscheidung für wenn der Nutzer eingeloggt ist und wenn nicht.
						if (isset($_SESSION["username"])){ //Eingeloggt
							echo'<li class="nav-item"><a class="nav-link" href="/Scrum-Project-Maazno/profile/profile.php">Profil</a></li>';
							echo'<li class="nav-item"><a class="nav-link" href="/Scrum-Project-Maazno/auth/logout.php">Logout</a></li>';
						}
						else{ //nicht Eingeloggt
							echo'<li class="nav-item"><a class="nav-link" href="/Scrum-Project-Maazno/auth/register_form.php">Register</a></li>';
							echo'<li class="nav-item"><a class="nav-link" href="/Scrum-Project-Maazno/auth/login_form.php">Login</a></li>'; 
						}
						?>
					</ul>
				</div>
				<div class="container-fluid">
					<form class="d-flex justify-content-end" action="http://localhost/Scrum-Project-Maazno/search/search.php" method="post">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
							<button class="btn btn-outline-light" type="submit">Search</button>
					</form>
				</div>
			</div>
		</nav>
		<br><br>
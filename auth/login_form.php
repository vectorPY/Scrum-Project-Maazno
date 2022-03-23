<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta
      name="author"
      content="Mark Otto, Jacob Thornton, and Bootstrap contributors"
    />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>Anmeldung Maazno</title>

    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/5.1/examples/sign-in/"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <?php 
        include_once "../static/header.php";

        // redirect zu homepage, wenn ein Nutzer eingeloggt ist
        if (isset($_SESSION["nutzer_id"])) {
            header('Location: ../index.php');
        }
    ?>
  </head>

  <body class="text-center">
    <div class="row justify-content-center">
      <div class="col-md-4 col-md-offset-5 align-self-center">
        <form action="login.php" method="post">
          <h1 class="h3 mb-3 fw-normal">Bitte melden Sie sich an!</h1>

          <div class="form-group">
            <input
              type="text"
              class="form-control"
              name="username"
              placeholder="Username"
            />
          </div>
          <div class="form-group">
            <input
              type="password"
              class="form-control"
              name="passwort"
              placeholder="Passwort"
            />
          </div>
          <input
            class="w-100 btn btn-lg btn-primary"
            type="submit"
            name="submit"
            value="Einloggen"
          />

          <p class="mt-5 mb-3 text-muted">&copy; 2022</p>

          <br />
          <a href="register_form.php">Haben Sie noch keinen Account?</a>
          <br />
        </form>
      </div>
    </div>

  <?php 
      include_once "../static/footer.php";
  ?>
  </body>
</html>

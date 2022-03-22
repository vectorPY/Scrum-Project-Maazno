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
    <title>Registrierung Maazno</title>

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
        include_once("../static/header.php");

        session_start();

        // redirect zu homepage, wenn ein Nutzer eingeloggt ist
        if (isset($_SESSION["nutzer_id"])) {
            header('Location: ../index.php');
        }
    ?>

  </head>

  <body class="text-center">

    <center><h1>Account erstellen</h1></center>

    <div class="row justify-content-center">
      <div class="col-md-4 col-md-offset-5 align-self-center">
        <form action="register.php" method="post">
          <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" type="text" name="username" size="10" />
          </div>
          <div class="form-group">
            <label for="vorname">Vorname:</label>
            <input class="form-control" type="text" name="vorname" size="10" />
          </div>
          <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" size="10" />
          </div>
          <div class="form-group">
            <label for="telefon">Telefonnummer:</label>
            <input class="form-control" type="text" name="telefon" size="10" />
          </div>
          <div class="form-group">
            <label for="ort">Ort:</label>
            <input class="form-control" type="text" name="ort_id" size="10" />
          </div>
          <div class="form-group">
            <label for="starße">Straße:</label>
            <input class="form-control" type="text" name="straße" size="10" />
          </div>
          <div class="form-group">
            <label for="hausnummer">Hausnummer:</label>
            <input
              class="form-control"
              type="text"
              name="hausnummer"
              size="10"
            />
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" size="10" />
          </div>
          <div class="form-group">
            <label for="passwort">Passwort:</label>
            <input
              class="form-control"
              type="password"
              name="passwort"
              size="10"
            />
          </div>
          <div class="form-group">
            <label for="passwort_wiederholeb">Passwort Wiederholen:</label>
            <input
              class="form-control"
              type="password"
              name="passwort_wiederholen"
              size="10"
            />
          </div>
          <br />
          <input
            class="w-40 btn btn-lg btn-primary"
            type="submit"
            name="submit"
            value="Erstellen"
          />
        </form>
      </div>
    </div>
    <br />
    <a href="login_form.php">Hast du bereits einen Account?</a>

    <?php
        include_once("../static/footer.php");   
    ?>

  </body>

</html>

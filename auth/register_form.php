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

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>

  <body class="text-center">
    <h1>Account erstellen</h1>
    <form action="register.php" method="post">
      Username: <input type="text" name="username" size="10" />
      <br />
      <br />
      Vorname: <input type="text" name="vorname" size="10" />
      <br />
      <br />
      Name: <input type="text" name="name" size="10" />
      <br />
      <br />
      Telefonnummer: <input type="text" name="telefon" size="10" />
      <br />
      <br />
      Ort: <input type="text" name="ort_id" size="10" />
      <br />
      <br />
      Straße: <input type="text" name="straße" size="10" />
      <br />
      <br />
      Hausnummer: <input type="text" name="hausnummer" size="10" />
      <br />
      <br />
      Email: <input type="text" name="email" size="10" />
      <br />
      <br />
      Passwort: <input type="password" name="passwort" size="10" />
      <br />
      <br />
      Passwort_Wiederholen:
      <input type="password" name="passwort_wiederholen" size="10" />
      <br />
      <br />
      <input
        class="w-40 btn btn-lg btn-primary"
        type="submit"
        name="submit"
        value="Erstellen"
      />
    </form>
    <br />
    <a href="login_form.php">Hast du bereits einen Account?</a>
  </body>
</html>

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

    <link href="signin.css" rel="stylesheet" />
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form action="login.php" method="post">
        <img
          class="mb-4"
          src="../assets/brand/bootstrap-logo.svg"
          alt=""
          width="72"
          height="57"
        />
        <h1 class="h3 mb-3 fw-normal">Bitte melden Sie sich an!</h1>

        <div class="form-floating">
          <input
            type="text"
            class="form-control"
            name="username"
            placeholder="Username"
          />
        </div>
        <div class="form-floating">
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
    </main>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Kategorie hinzufügen</title>
</head>
<body>
    
    <?php
        include_once "../static/header.php";

        session_start();

        // nur Admins können Kategorien hinzufügen
        if (!(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1)) {
            header('Location: ../index.php');
        }
    ?>

    <center><h1>Fügen Sie hier eine Kategorie hinzu:</h1></center>

    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-5 align-self-center">
            <form action="create_category.php" method="post" >
                <div class="form-group">
                    <label for="name">Name der Kategorie</label>
                    <input class="form-control" type="text" name="kategorie" id="kategorie">
                </div>
                <br>

                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary">Erstellen</button>
                </div>
            </form>
        </div>
    </div>

    <?php include_once "../static/footer.php"; ?>
</body>
</html>


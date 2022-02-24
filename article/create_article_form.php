<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Artikel hinzufügen</title>
</head>
<body>
    
    <?php

        // TODO: Überprüfen, ob ein Admin eingeloggt ist

    ?>

    <center><h1>Fügen Sie hier einen Artikel hinzu:</h1></center>

    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-5 align-self-center">
            <form action="create_article.php" method="post">
                <div class="form-group">
                    <label for="name">Name des Artikels</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <br>
                <div class="form-group">
                    <label for="price">Preis</label>
                    <input class="form-control" type="text" name="price" id="price">
                </div>
                <br>
                <div class="form-group">
                    <label for="Pircture">Bild</label>
                    <input class="form-control" type="file" name="picture" id="picture">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Beschreibung</label>
                    <input class="form-control" type="text" name="description" id="description">
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="c_id">Kategorie (id)</label>
                    <input class="form-control" type="text" name="c_id" id="c_id">
                </div>
                <br>
                <br>

                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary">Erstellen</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Formulaire</title>
</head>

<body class="bg-light">

    <div class="container mt-5" >

        <div class="card shadow">

            <div class="card-body p-4">

                <h3 class="text-center mb-4">
                    Un formulaire simple
                </h3>

                <form action="" method="post" class="row">

                    <div class="col-md-6 mb-3">
                        <label for="nom" class="form-label">
                            Nom <span class="text-danger">*</span>
                        </label>

                        <input 
                            type="text" 
                            id="nom"
                            name="name" 
                            class="form-control"
                            placeholder="Entrez votre nom"
                            required
                        >
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="prenom" class="form-label">
                            Prénom <span class="text-danger">*</span>
                        </label>

                        <input 
                            type="text" 
                            id="prenom"
                            name="prenom" 
                            class="form-control"
                            placeholder="Entrez votre prénom"
                            required
                        >
                    </div>


                    <div class="d-flex ">

                        <button type="submit" class="btn btn-success w-50 me-3">
                            Enregistrer
                        </button>

                        <button type="reset" class="btn btn-danger w-50">
                            Annuler
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
```

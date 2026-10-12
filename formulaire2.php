<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Formulaire simple avec tableau</title>
</head>
<body class="bg-light">
    <div class="container mt-5" >
                <div class="card p-4 shadow mb-4" >
                    <h3 class="text-center">
                        Formulaire simple avec tableau
                    </h3>
                    <form action="formulaire2.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nom
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                            placeholder="entrez votre nom" 
                            id="nom" 
                            name="nom" 
                            class="form-control"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Prénom
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                            placeholder="entrez votre Prénom" 
                            id="prenom" 
                            name="prenom"
                            class="form-control"
                        >
                            
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Numéro
                            <span class="text-danger">*</span>
                        </label>
                        <input type="tel"
                            placeholder="entrez votre Numéro de téléphone" 
                            id="tel" 
                            name="tel"
                            class="form-control"
                        >
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-success w-50 me-3">soumettre</button>
                        <button type="reset" class="btn btn-danger w-50">Ennuler</button>
                    </div>
                </form>
                </div>
                
                    <h4 class="mb-3 mt-5">listes des informations</h4>
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th class="text-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-warning">
                            <tr>
                                <td>AKAKPOA</td>
                                <td>Jean</td>
                                <td>+2290162718280</td>
                                <td class="text-nowrap">
                                    <div class="d-flex gap-3">
                                        <button class="btn btn-success" >Modifier</button>
                                        <button class="btn btn-danger">Supprimer</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>AKAKPOA</td>
                                <td>Jean</td>
                                <td>+2290162718280</td>
                                <td class="text-nowrap">
                                    <div class="d-flex gap-3">
                                        <button class="btn btn-success" >Modifier</button>
                                        <button class="btn btn-danger">Supprimer</button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                        
                    </table>
                
         
    </div>
    
    
</body>
</html>
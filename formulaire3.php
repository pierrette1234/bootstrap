<?php

// We connect to the database get_soutenance with the user root and no password
//Connexion à la base get_soutenance avec l'utilisateur root, sans mot de passe

$db = new PDO("mysql:host=localhost;dbname=get_soutenance;charset=utf8", "root", "");

// Empty variables so the form is empty when we add a student.
//Variables vides pour que le formulaire soit vide en mode ajout.

$id = ""; $nom = ""; $prenom = ""; $mail= ""; $tel = "";

// Ce bloc s'exécute quand l'URL contient task=modif.
// This block runs when the URL contains task=modif.

if(isset($_GET['task']) && $_GET['task'] == "modif"){

    // On récupère l'id de l'étudiant dans l'URL.
    // We get the student's id from the URL.

    $id = $_GET['id'];

    // On cherche cet étudiant dans la table.
    // We look for this student in the table.

    $req = $db->query("SELECT * FROM etudiant WHERE id='$id'");

    // We check that the student exists.
    //On vérifie que l'étudiant existe.

    if($req->rowcount()>0){

        //On met la ligne de l'étudiant dans le tableau $tab.
        // We put the student's data in the array $tab.

        $tab = $req->fetch();

        //On copie chaque valeur dans une variable pour remplir le formulaire.
        // We copy each value into a variable to fill the form.

        $nom = $tab['nom'];
        $prenom = $tab['prenom'];
        $mail = $tab['mail'];
        $tel = $tab['telephone'];
    }
  
}

// This block runs when the URL contains task=suppr.
//On copie chaque valeur dans une variable pour remplir le formulaire.

if(isset($_GET['task']) && $_GET['task'] == "suppr"){

    // We get the id of the student to delete.
    //On récupère l'id de l'étudiant à supprimer.

    $id = $_GET['id'];

    //On supprime cet étudiant de la table.
    // We delete this student from the table.

    $db->query("DELETE FROM  etudiant WHERE  id='$id'");

    // We RELOAD the page to see the new list.
    // On recharge la page pour voir la nouvelle liste.

    header("Location: formulaire3.php");

    //On arrête le script ici.
    // We stop the script here.

    exit;
}

// This block runs when the user clicks on the submit button.
//Ce bloc s'exécute quand on clique sur le bouton du formulaire

if(isset($_POST['btn'])){

    // We get the values typed in the form.
    //On récupère les valeurs saisies dans le formulaire.

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $tel = $_POST['telephone'];

    //Si le bouton vaut Ajouter
    // If the button value is Ajouter

    if($_POST['btn']=="Ajouter"){

        // we add a new student.
        //on ajoute un nouvel étudiant.

        $db->query("INSERT INTO  etudiant(nom, prenom, mail, telephone) VALUES ('$nom', '$prenom', '$mail', '$tel')");

    //Si le bouton vaut Modifier, on met à jour l'étudiant existant.
    // If the button value is Modifier, we update the existing student.

    }elseif($_POST['btn']=="Modifier"){

        //On récupère l'id caché pour savoir quelle ligne modifier.
        // We get the hidden id to know which student to update

        $id = $_POST['id'];
        $db->query("UPDATE etudiant SET nom='$nom', prenom='$prenom', mail='$mail', telephone='$tel' WHERE id='$id'");
    }

    //Après l'enregistrement, on recharge la page avec un formulaire vide.
    // After saving, we reload the page with an empty form.

    header("Location: formulaire3.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <!-- Rend la page adaptée aux téléphones / Makes the page fit phone screens. -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>

    <!-- On charge Bootstrap pour le style./We load Bootstrap for the style. -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- bg-light : fond gris clair pour faire ressortir la carte / light grey background so the card stands out -->

<body class="bg-light">

<!-- container :centre le contenu et laisse des marges sur les côtés / centers the content with side margins -->
<!-- mt-5 :grande marge en haut /big margin on top -->

<div class="container mt-5">

    <!-- card :crée une boîte avec bordure / creates a box with a border -->
    <!-- p-4 :espace à l'intérieur de la boîte / space inside the box -->
    <!-- shadow :ombre autour de la boîte / shadow around the box -->
    <!-- mb-4 :espace sous la boîte / space under the box -->

    <div class="card p-4 shadow mb-4">
        
        <!-- text-center :titre centré / centered title -->
        <!-- mb-5 :espace sous le titre / space under the title -->
        
        <h4 class=" text-center mb-5"> Gestion des étudiants</h4>

        <form method="POST" action="formulaire3.php">

            <!-- Champ caché qui garde l'id de l'étudiant à modifier / Hidden field that keeps the id of the student we edit. -->
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">
             
            <!-- row :crée une ligne qui contient des colonnes / creates a line that contains columns -->
            
             <div class="row">
                
                <!-- col-12 :pleine largeur sur téléphone / full width on phones -->
                <!-- col-md-6 :moitié de la largeur sur écran moyen ou grand / half width on medium or large screens -->
                <!-- mb-3 :espace sous le champ / space under the field -->
                
                <div class="col-12 col-md-6 mb-3" >

                    <!-- form-label : style du texte au-dessus du champ / style of the text above the field -->
                    <!-- text-danger : étoile rouge = champ obligatoire / red star = required field -->
                    
                    <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                    
                    <!-- form-control :champ large avec bords arrondis / wide field with rounded borders -->
                    <!-- htmlspecialchars :protège contre les caractères dangereux / protects against dangerous characters -->
                    <!-- required : le champ ne peut pas rester vide / the field cannot stay empty -->
                    
                    <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars($nom); ?>" required>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label" >Prénom <span class="text-danger">*</span></label>
                    <input type="text" name="prenom" class="form-control" value="<?php echo htmlspecialchars($prenom); ?>" required>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="mail" class="form-control" value="<?php echo htmlspecialchars($mail); ?>" required>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label">Téléphone<span class="text-danger">*</span></label>
                    <input type="text" name="telephone" class="form-control" value="<?php echo htmlspecialchars($tel); ?>" required>
                </div>
            </div>
            
            <!-- d-flex : met les éléments côte à côte / puts the elements side by side -->
            <!-- justify-content-between : un à gauche, un à droite / one on the left, one on the right -->
            
            <div class="d-flex justify-content-between">
                
                <?php

                    //  En mode modification, on affiche le bouton Modifier / In edit mode, we show the Modifier button.

                    if(isset($_GET['task']) && $_GET['task'] == "modif"){
                ?>  
                
                <!-- btn : style de bouton / button style -->
                <!-- btn-success :couleur verte (action positive) / green color (positive action) -->
                <!-- w-50 : largeur de 50% /  width of 50% -->
                <!-- me-3 : espace à droite entre les deux boutons / space on the right between the two buttons -->
                
                <button type="submit" name="btn" class="btn btn-success w-50 me-3" value="Modifier">Modifier</button>  

                <?php  
                }else{

                // Sinon, on affiche le bouton pour ajouter / Otherwise, we show the button to add.
                ?>
                <button type="submit" name="btn" class="btn btn-success w-50 me-3" value="Ajouter">Soumettre</button>

                <?php
                }
                ?>
                
                <!-- btn-danger :couleur rouge (annuler) / red color (cancel) -->
                <!-- Annuler recharge la page et vide le formulaire / Annuler reloads the page and empties the form. -->
                
                <a href="formulaire3.php" class="btn btn-danger w-50">Annuler</a>
            </div>
           
        </form>
    </div>

    <!-- Titre de la liste / Title of the list. -->
    <!-- mt-y : espace au-dessus et en dessous / space above and below -->
    
    <h3 class="my-3">Liste des étudiants</h3>
    
    <!-- table-responsive : permet de faire défiler le tableau sur petit écran /  lets the table scroll on small screens -->
    
    <div class="table-responsive">
        
        <!-- table :  style de base /  basic style -->
        <!-- table-bordered :  bordures sur chaque case /  borders on every cell -->
        <!-- table-hover :  la ligne change de couleur sous la souris /  the row changes color under the mouse -->
        
        <table class="table table-bordered table-hover ">
            
            <!-- table-dark : en-tête noir / black header -->
           
            <thead class="table-dark">
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    
                    <!-- text-nowrap : empêche le texte de passer à la ligne / stops the text from going to the next line -->
                    
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>

            <!-- table-warning :fond jaune pour le corps du tableau / yellow background for the table body -->
            
            <tbody class="table-warning ">
                <?php
                
                //On commence le compteur à 1 pour la colonne N° / We start the counter at 1 for the N° column.
                
                $num = 1;
                
                //On prend tous les étudiants, le plus récent en premier / We get all the students, the newest first.
                
                $req = $db->query("SELECT * FROM etudiant ORDER BY id DESC");
                
                // Si la table n'est pas vide, on affiche les étudiants / If the table is not empty, we show the students.
                
                if($req->rowcount()!=0){
                
                //Cette boucle crée une ligne par étudiant / This loop creates one row for each student.
		        
                while($tab=$req->fetch()){
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($num); ?></td>
                        <td><?php echo  htmlspecialchars($tab['nom']); ?></td>
                        <td><?php echo  htmlspecialchars($tab['prenom']); ?></td>
                        <td><?php echo  htmlspecialchars($tab['mail']); ?></td>
                        <td><?php echo  htmlspecialchars($tab['telephone']); ?></td>
                        <td class="text-nowrap">

                            <!-- btn-primary : couleur bleue / blue color -->
                            <!-- btn-sm : petit bouton pour tenir dans le tableau / small button to fit in the table -->
                            <!-- Ce lien envoie l'id réel de l'étudiant à modifier / This link sends the real id of the student to edit. -->
                            
                            <a href="formulaire3.php?task=modif&id=<?php echo $tab['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                            
                            <!-- Ce lien supprime l'étudiant après confirmation / This link deletes the student after confirmation. -->
                          
                            <a href=
                                "formulaire3.php?task=suppr&id=<?php echo $tab['id']; ?>" class="btn btn-danger btn-sm" 
                                onclick="return confirm('voulez-vous vraiment suprimer cet étudianr?');
                                ">Supprimer
                            </a>
                        </td>
                    </tr>

                <?php  

                // On ajoute 1 au compteur pour la ligne suivante / We add 1 to the counter for the next row.

                $num++;
                } 
                }else{
                   
                    ?>
                    <!--  S'il n'y a aucun étudiant, on affiche un message / If there is no student, we show a message. -->
                    <!-- colspan="6" : la case prend la largeur des 6 colonnes / EN the cell takes the width of the 6 columns -->
                        <tr>
                            <td colspan="6" class="text-center">aucun étudiant enregistré. </td>
                        </tr>
                    <?php 
                }
                    ?>
                
                
            </tbody>
        </table>
    </div>

</div>
</body>
</html>



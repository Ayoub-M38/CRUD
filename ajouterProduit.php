<?php
// Call the title var
$title = "e-shop Ajouter un produit";

ob_start();

// database connection 
require("config/db.php")

?>

<!-- Create the form -->

<div class="container mt-5">
    <form action="enregistrerProduit.php" method="post">

        <!-- Product name -->
        <div class="form-group">
            <label for="nom_produit">Nom de produit</label>
            <input type="text" name="nom_produit" id="nom_produit" class="form-control" required>
        </div>
        <!-- Poduct description -->
        <div class="form-group">
            <label for="description_produit">Description du produit</label>
            <textarea rows="3" name="description_produit" id="description_produit" class="form-control" required></textarea>
        </div>
        <!-- Product image -->
        <div class="form-group">
            <label for="image_produit">Image du produit</label>
            <input type="text" name="image_produit" id="image_produit" class="form-control" required>
        </div>
        <!-- Product price -->
        <div class="form-group">
            <label for="prix_produit">Prix du produit</label>
            <input type="number" name="prix_produit" id="prix_produit" class="form-control" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Valider</button>
        </div>

    </form>
</div>


<?php
/*
// Save the inputs
$nom_produit = $_POST['nom_produit'];
$description_produit = $_POST['description_produit'];
$image_produit = $_POST['image_produit'];
$prix_produit = $_POST['prix_produit'];

// Display the Values 

var_dump($nom_produit);
var_dump($description_produit);
var_dump($image_produit);
var_dump($prix_produit);
*/

// Call the template var

$content = ob_get_clean();

require "template.php";

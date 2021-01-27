<?php
// Call the title var
$title = "e-shop Valider le produit";

ob_start();

// database connection 
require("config/db.php");


//Recupation de input name = nom du produit
if (isset($_POST['nom_produit']) && !empty($_POST['nom_produit'])) {
    $nom_produit = htmlspecialchars($_POST['nom_produit']);
    //var_dump($nom_produit);
} else {
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ nom du produit</p>";
}
//Recup de la description du produit
if (isset($_POST['description_produit']) && !empty($_POST['description_produit'])) {
    $description_produit = htmlspecialchars($_POST['description_produit']);
    //var_dump($description_produit);
} else {
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ description du produit</p>";
}
//Recupération de l'url de la photo
if (isset($_POST['image_produit']) && !empty($_POST['image_produit'])) {
    $image_produit = htmlspecialchars($_POST['image_produit']);
    //var_dump($image_produit);
} else {
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ image du produit</p>";
}


//Recuperation du prix
if (isset($_POST['prix_produit']) && !empty($_POST['prix_produit'])) {
    $prix_produit = $_POST['prix_produit'];
    //var_dump($prix_produit);
} else {
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ prix du produit</p>";
}


$sql = "INSERT INTO produits (nom_produit, description_produit, image_produit, prix_produit) VALUES (?,?,?,?)";
$requete_insertion = $db->prepare($sql);
$requete_insertion->bindParam(1, $nom_produit);
$requete_insertion->bindParam(2, $description_produit);
$requete_insertion->bindParam(3, $image_produit);
$requete_insertion->bindParam(4, $prix_produit);

if ($requete_insertion->execute(array($nom_produit, $description_produit, $image_produit, $prix_produit))) {

    echo "<p class='alert-success'>Votre produit à bien été ajouté !</p>";
    echo "<a href='listeProduits.php' class='btn btn-outline-success'>Retour à la liste des produit</a>";
} else {
    echo "<p class='alert-danger'>Erreur: Merci de remplir tous les champs</p>";
}








/*
$description_produit = $_POST['description_produit'];
$image_produit = $_POST['image_produit'];
$prix_produit = $_POST['prix_produit'];


/*
var_dump($description_produit);
var_dump($image_produit);
var_dump($prix_produit);
*/

// Call the template var

$content = ob_get_clean();

require "template.php";

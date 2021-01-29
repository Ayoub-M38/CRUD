<?php
$title = "e-shop liste produits";

ob_start();

// database connection 
require("config/db.php");

$sql = "DELETE FROM produits WHERE id_produit = ?";
$id = $_GET['id'];


$delete = $db->prepare($sql);
$delete->bindParam(1, $id);
$delete->execute();
?>
<div class="container text-center">
    <?php
    if ($delete) {
        echo "<p class='alert alert-dismissible alert-success m-5 display-4'>Le produit à bien été supprimé !</p>";
        echo "<a class='btn btn-primary btn-lg' href='listeProduit.php'>Retour a la liste des produits</a>";
    } else {
        echo "<p class='alert-danger'>Erreur lors de la supression du produit</p>";
    }
   



 
$content = ob_get_clean();
require "template.php";
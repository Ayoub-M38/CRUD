<?php
$title = "e-shop liste produits";

ob_start();


// database connection 
require("config/db.php");
?>
<div class="container">
<div class="display-3 text-center mt-5 text-primary font-weight-bold">suppression de produits</div>
    <div class="alert alert-dismissible alert-danger mt-5 p-5">
        <strong>ATTENTION</strong> <a href="listeProduits.php" class="alert-link">Retour a la liste des produits</a> le produit concerner va etre supprimé.
        <?php
        $sql = "SELECT * FROM produits WHERE id_produit = ?";

        $query = $db->prepare($sql);
        $id = $_GET['id'];

        $query->bindParam(1, $id);
        $query->execute();
        $result = $query->fetch();

        ?>
        <ul class="list-group">
            <li class="list-group-item">ID : <?= $result['id_produit'] ?></li>
            <li class="list-group-item">NOM : <?= $result['nom_produit'] ?></li>
            <li class="list-group-item">DESCRIPTION : <?= $result['description_produit'] ?></li>
            <li class="list-group-item">IMAGE : <img src="<?= $result['image_produit'] ?>" width="200" alt="<?= $result['nom_produit'] ?>" title="<?= $result['nom_produit'] ?>"></li>
            <li class="list-group-item">PRIX : <?= $result['prix_produit'] ?> €</li>
        </ul>
    </div>
    <div class="text-center">
        <a href="suppconfirm.php?id=<?=$result['id_produit'] ?>" class="btn btn-danger btn-lg m-5">CONFIRMER LA SUPRESSION DU PRODUIT = <?= $result['nom_produit'] ?></a>
    </div>
    <div class="text-center">
        <a href="listeProduits.php" class="btn btn-success btn-lg m-5">ANNULER</a>
    </div>

</div>
<?php

$content = ob_get_clean();
require "template.php";

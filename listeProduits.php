<?php

$title = "e-shop liste produits";

ob_start();


// database connection 
require("config/db.php");
?>

<div class="display-3 text-center mt-5 text-primary font-weight-bold">Liste des produits</div>

<div class="text-center mt-5">
    <a href="ajouterProduit.php" <button type="submit" class="btn btn-lg btn-primary">Ajouter un produit</button></a>
</div>

<?php

$sql = "SELECT * FROM produits";

$result = $db->query($sql);
?>

<div class="container text-center mt-5">
    <div class="row">
        <?php
        foreach ($result->fetchAll() as $row) { ?>


            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card mt-3">
                    <img class="img-fluid" src="<?php echo $row['image_produit'] ?>" alt="<?php echo $row['nom_produit'] ?>" title="<?php echo $row1['nom_produit'] ?>">
                    <h5 class="font-weight-bold mt-3"><?php echo $row['nom_produit'] ?></h5>
                    <p class="mt-3 lead"><?php echo $row['description_produit'] ?></p>
                    <h5 class="font-weight-bold mt-3"><?php echo $row['prix_produit'] ?> EUR</h5>
                    <a href="detailsProduit.php?id_produit=<?= $row['id_produit'] ?>" class="btn btn-primary p-3 m-2 font-weight-bold">Détails</a>
                    <a href="" class="btn btn-success p-3 m-2 font-weight-bold">Mettre à jour</a>
                    <a href="suprProduit.php?id=<?= $row['id_produit'] ?>" class="btn btn-danger p-3 m-2 font-weight-bold">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php

$content = ob_get_clean();

require "template.php";

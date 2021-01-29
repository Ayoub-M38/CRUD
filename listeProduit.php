<?php

$title = "e-shop liste produits";

ob_start();


// database connection 
require("config/db.php");
?>

<div class="display-3 text-center mt-5 text-primary font-weight-bold">Liste de produits</div>

<div class="text-center mt-5">
    <a class="btn btn-primary btn-lg p-3 m-2 font-weight-bold" data-toggle="modal" data-target="#addproduct">Ajouter un produit</a>
</div>

<?php

$sql = "SELECT * FROM produits";

$result = $db->query($sql);
?>

<!--------------------------------------------------------- Ajouter un produit Modal pop up  --------------------------------------------------------------------->

<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="enregistrerProduit.php" method="POST">
                <div class="modal-body">

                    <!-- Product name -->
                    <div class="form-group">
                        <label>Nom de produit</label>
                        <input type="text" name="nom_produit" class="form-control">
                    </div>
                    <!-- Poduct description -->
                    <div class="form-group">
                        <label>Description du produit</label>
                        <textarea rows="3" name="description_produit" class="form-control"></textarea>
                    </div>
                    <!-- Product image -->
                    <div class="form-group">
                        <label>Image du produit</label>
                        <input type="text" name="image_produit" class="form-control">
                    </div>
                    <!-- Product price -->
                    <div class="form-group">
                        <label>Prix du produit</label>
                        <input type="number" name="prix_produit" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" name="insertdata" class="btn btn-primary">Ajouter le produit</button>
                </div>
            </form>
        </div>
    </div>
</div>


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
                    <a href="majProduit.php?id_maj=<?= $row['id_produit'] ?>" class="btn btn-warning btn-lg p-3 m-2 font-weight-bold">Mettre à jour</a>
                    <a href="suprProduit.php?id=<?= $row['id_produit'] ?>" class="btn btn-danger p-3 m-2 font-weight-bold">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php

$content = ob_get_clean();

require "template.php";

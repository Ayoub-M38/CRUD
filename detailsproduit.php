<?php
ob_start();
$title = "Détails du produit";

// database connection 
require("config/db.php");

?>
<div class="container">
    <div class="display-3 text-center m-5 text-primary font-weight-bold">DETAILS du produit</div>


    <?php
    $sql = "SELECT * FROM produits WHERE id_produit = ?";
    $query = $db->prepare($sql);
    $id = $_GET['id_produit'];
    $query->bindParam(1, $id);
    $query->execute();
    $result = $query->fetch();


    if ($result) {

    ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom du produit</th>
                    <th>Description du produit</th>
                    <th>Image du produit</th>
                    <th>Prix du produit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $result['id_produit'] ?></td>
                    <td><?= $result['nom_produit'] ?></td>
                    <td><?= $result['description_produit'] ?></td>
                    <td><?= $result['prix_produit'] ?> €</td>
                    <td><img src="<?= $result['image_produit'] ?>" width="200" alt="<?= $result['nom_produit'] ?>" title="<?= $result['nom_produit'] ?>"></td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <a href="listeProduit.php" class="btn btn-primary m-5 btn-lg">Retour à la liste des produits</a>
        </div>
</div>

<?php
    } else {
        echo "<p class='alert-danger p-5'>Erreur : cet ID (produit) n'existe pas</p>";
    }




    $content = ob_get_clean();
    require "template.php";

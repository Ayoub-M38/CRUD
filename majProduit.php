<?php
require('config/db.php');
$title = "Metter a jour";

ob_start();

//the sql query
$sql = "SELECT * FROM produits WHERE id_produit = ?";
// launch the query
$query = $db->prepare($sql);

$update_id = $_GET['id_maj'];
//echo "ID du produit à mettre a jour = " . $update_id;
//Passage du ? à la valeur de $_GET['id_produi']
$query->bindParam(1, $update_id);
//Execute la requète
$query->execute();
//pour afficher les vaeurs de la tables produits on doit utilisé la fonction fectch = rechercher
$result = $query->fetch();

if ($result) {
?>
    <div class="container mt-5">
        <h1 class="display-3 text-center text-primary">METTRE UN PRODUIT</h1>
        <!-- Appel de la page du traitement du formulaire-->
        <form action="new_updatedProduit.php?id_maj=<?= $result['id_produit'] ?>" method="post">

            <!--NOM DU PRODUIT-->
            <div class="form-group">
                <!--ICI on recup l'attibut name et sa valeur avec $_POST['nom_produit']-->
                <label for="nom_produit">Nom du produit</label>
                <input type="text" value="<?= $result['nom_produit'] ?>" class="form-control" id="nom_produit" name="nom_produit" required>
            </div>

            <!--DESCRIPTION DU PRODUIT-->
            <div class="form-group">
                <!--ICI on recup l'attibut name et sa valeur avec $_POST['description_produit']-->
                <label for="description_produit">Description du produit</label>
                <textarea rows="5" class="form-control" id="description_produit" name="description_produit" required><?= $result['description_produit'] ?></textarea>
            </div>

            <!--IMAGE DU PRODUIT-->
            <div class="form-group">
                <label for="image_produit">Image du produit</label>
                <!--ICI on recup l'attibut name et sa valeur avec $_POST['image_produit']-->
                <input type="text" value="<?= $result['image_produit'] ?>" class="form-control" id="image_produit" name="image_produit" required>
            </div>

            <!--PRIX DU PRODUIT-->
            <div class="form-group">
                <label for="prix_produit">Prix du produit</label>
                <!--ICI on recup l'attibut name et sa valeur avec $_POST['prix_produit']-->
                <input type="text" value="<?= $result['prix_produit'] ?>" step="4" class="form-control" id="prix_produit" name="prix_produit" required>
            </div>


            <div class="form-group mt-5">
                <!--ICI  le type submit appel le l'atribut action= du formulaire-->
                <button type="submit" class="btn btn-success btn-lg">Mettre à jour le produit</button>
                <a href="listeProduit.php" class="btn btn-danger btn-lg">Retour a la liste des produits</a>
            </div>

        </form>

    </div>

<?php
}



$content = ob_get_clean();
require "template.php";

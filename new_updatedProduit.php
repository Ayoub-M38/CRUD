<?php
require('config/db.php');
$title = "Metter a jour";

ob_start();

//Recupation de input name = nom du produit
if (isset($_POST['nom_produit']) && !empty($_POST['nom_produit'])) {
    $nom_produit = htmlspecialchars($_POST['nom_produit']);
} else {
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ nom du produit</p>";
}
//Recup de la description du produit
if (isset($_POST['description_produit']) && !empty($_POST['description_produit'])) {
    $description_produit = htmlspecialchars($_POST['description_produit']);
} else {
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ description du produit</p>";
}
//Recupération de l'url de la photo
if (isset($_POST['image_produit']) && !empty($_POST['image_produit'])) {
    $image_produit = htmlspecialchars($_POST['image_produit']);
} else {
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ image du produit</p>";
}


//Recuperation du prix
if (isset($_POST['prix_produit']) && !empty($_POST['prix_produit'])) {
    $prix_produit = $_POST['prix_produit'];;
} else {
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ prix du produit</p>";
}


// the sql query
$sql = "UPDATE produits SET nom_produit = ?, description_produit = ?, image_produit = ?, prix_produit = ? WHERE id_produit = ?";
$update = $db->prepare($sql);

$update->bindParam(1, $nom_produit);
$update->bindParam(2, $description_produit);
$update->bindParam(3, $image_produit);
$update->bindParam(4, $prix_produit);

$valide_maj_id = $_GET['id_maj'];
//echo "recupération de id produite depuis un formulaire de lisea jour : " . $valide_maj_id;

$resultUpdate = $update->execute(array($nom_produit, $description_produit, $image_produit, $prix_produit, $valide_maj_id));

if ($resultUpdate) {
    //Requètes SQL
    $sql = "SELECT * FROM produits WHERE id_produit = ?";
    //Stock de la requète dans une vaiable ($requète) et appel de la connexion puis de la fonction requètée preparée
    $query = $db->prepare($sql);
    //Objet qui retourne PDO statement etat de la table produits à l'instant
    //var_dump($query);

    $update_id = $_GET['id_maj'];
    //echo "ID du produit à mettre a jour = " . $update_id;
    //Passage du ? à la valeur de $_GET['id_produi']
    $query->bindParam(1, $update_id);
    //Execute la requète
    $query->execute();
    //pour afficher les vaeurs de la tables produits on doit utilisé la fonction fectch = rechercher
    $result = $query->fetch();
?>
    <div class="container p-5">
        <h1 class="text-center text-warning">Votre produit à bien été modifié !</h1>
        <ul class="list-group">
            <li class="list-group-item">ID du produit : <?= $result['id_produit'] ?></li>
            <li class="list-group-item">Nom du produit<?= $result['nom_produit'] ?></li>
            <li class="list-group-item">Description du produit<?= $result['description_produit'] ?></li>
            <li class="list-group-item">Image du produit<img src="<?= $result['image_produit'] ?>" width="320" alt="<?= $result['nom_produit'] ?>" title="<?= $result['nom_produit'] ?>"> </li>
            <li class="list-group-item">Prix du produit<?= $result['prix_produit'] ?> €</li>
        </ul>
        <a href="listeProduit.php" class="btn btn-success btn-lg mt-5">Retour à la liste des produits</a>
    </div>
<?php
} else {
    echo "<p class='alert-danger p-5'>Une erreur est survenue lors de la mise à jour du produit</p>";
}


//$content de template.php definis ce qui ce trouve dans le body
//Retourne le contenu du tampon de sortie et termine la session de temporisation.
//Si la temporisation n'est pas activée, alors false sera retourné.
$content = ob_get_clean();
//Rappel du template sur chaque page
require "template.php";

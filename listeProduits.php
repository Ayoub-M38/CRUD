<?php

$title = "e-shop bestsellers";

ob_start();
$user = "root";
$pass = "";

// DEBUG
try {
    $db = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Erreur de connexion a PDO MySQL :" . $exception->getMessage());
}

?>


<?php
$sql = "SELECT * FROM produits";

$req = $db->query($sql);

foreach ($db->query("SELECT * FROM produits WHERE id_produit=1") as $row1);
foreach ($db->query("SELECT * FROM produits WHERE id_produit=2") as $row2);
foreach ($db->query("SELECT * FROM produits WHERE id_produit=3") as $row3); {

?>
    <div class="container text-center mt-5">
        <div class="row">

            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card mt-3">
                    <img src="<?php echo $row1['image_produit'] ?>" alt="<?php echo $row1['nom_produit'] ?>" title="<?php echo $row1['nom_produit'] ?>" width="320">
                    <h5 class="font-weight-bold mt-3"><?php echo $row1['nom_produit'] ?></h5>
                    <p class="mt-3 lead"><?php echo $row1['description_produit'] ?></p>
                    <h5 class="font-weight-bold mt-3"><?php echo $row1['prix_produit'] ?> EUR</h5>
                    <a href="" class="btn btn-warning p-3 m-2 font-weight-bold">En savoir plus</a>
                    <a href="" class="btn btn-success p-3 m-2 font-weight-bold">Acheter maintenant</a>
                    <a href="" class="btn btn-primary p-3 m-2 font-weight-bold">Ajouter au panier</a>
                    <a href="" class="btn btn-danger p-3 m-2 font-weight-bold">Nous contacter</a>
                </div>
            </div>

            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card mt-3">
                    <img src="<?php echo $row2['image_produit'] ?>" alt="<?php echo $row2['nom_produit'] ?>" title="<?php echo $row3['nom_produit'] ?>" width="320">
                    <h5 class="font-weight-bold mt-3"><?php echo $row2['nom_produit'] ?></h5>
                    <p class="mt-3 lead"><?php echo $row2['description_produit'] ?></p>
                    <h5 class="font-weight-bold mt-3"><?php echo $row2['prix_produit'] ?> EUR</h5>
                    <a href="" class="btn btn-warning p-3 m-2 font-weight-bold">En savoir plus</a>
                    <a href="" class="btn btn-success p-3 m-2 font-weight-bold">Acheter maintenant</a>
                    <a href="" class="btn btn-primary p-3 m-2 font-weight-bold">Ajouter au panier</a>
                    <a href="" class="btn btn-danger p-3 m-2 font-weight-bold">Nous contacter</a>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card mt-3">
                    <img src="<?php echo $row3['image_produit'] ?>" alt="<?php echo $row3['nom_produit'] ?>" title="<?php echo $row3['nom_produit'] ?>" width="360">
                    <h5 class="font-weight-bold mt-3"><?php echo $row3['nom_produit'] ?></h5>
                    <p class="mt-3 lead"><?php echo $row3['description_produit'] ?></p>
                    <h5 class="font-weight-bold mt-3"><?php echo $row3['prix_produit'] ?> EUR</h5>
                    <a href="" class="btn btn-warning p-3 m-2 font-weight-bold">En savoir plus</a>
                    <a href="" class="btn btn-success p-3 m-2 font-weight-bold">Acheter maintenant</a>
                    <a href="" class="btn btn-primary p-3 m-2 font-weight-bold">Ajouter au panier</a>
                    <a href="" class="btn btn-danger p-3 m-2 font-weight-bold">Nous contacter</a>
                </div>
            </div>

        </div>

    </div>
<?php

}

?>




<?php
$sql = "SELECT * FROM produits";
$req = $db->query($sql);

?>



















<?php

$content = ob_get_clean();

require "template.php";

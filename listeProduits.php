<?php

$title = "e-shop bestsellers";

ob_start();
$user = "root";
$pass = "";

// DEBUG
try {
    $db = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<p class='alert-success'>Connected</p>";
} catch (PDOException $exception) {
    die("Erreur de connexion a PDO MySQL :" . $exception->getMessage());
}

?>


<?php
$sql = "SELECT * FROM produits";

$req = $db->query($sql);

foreach ($db->query("SELECT * FROM produits WHERE nom_produit = 'mx ergo'") as $title1);
foreach ($db->query("SELECT * FROM produits WHERE nom_produit = 'MX MASTER 3'") as $title2);
foreach ($db->query("SELECT * FROM produits WHERE nom_produit = 'G903'") as $title3);
foreach ($db->query("SELECT * FROM produits") as $row); {

?>
    <div class="container text-center mt-5">
        <div class="row">

            <div class="col-lg-4">
                <div class="card mt-3">
                    <img src="./img/m705-refresh-pdp.png" alt="" width="320">
                    <h5 class="font-weight-bold mt-3"><?php echo $title1['nom_produit'] ?></h5>
                    <p class="mt-3 lead"><?php echo $row['description_produit'] ?></p>
                    <a href="" class="btn btn-warning p-3 m-2 font-weight-bold">En savoir plus</a>
                    <a href="" class="btn btn-success p-3 m-2 font-weight-bold">Acheter maintenant</a>
                    <a href="" class="btn btn-primary p-3 m-2 font-weight-bold">Ajouter au panier</a>
                    <a href="" class="btn btn-danger p-3 m-2 font-weight-bold">Nous contacter</a>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mt-3">
                    <img src="./img/mx-master-2s.png" alt="" width="320">
                    <h5 class="font-weight-bold mt-3"><?php echo $title2['nom_produit'] ?></h5>
                    <p class="mt-3 lead"><?php echo $row['description_produit'] ?></p>
                    <a href="" class="btn btn-warning p-3 m-2 font-weight-bold">En savoir plus</a>
                    <a href="" class="btn btn-success p-3 m-2 font-weight-bold">Acheter maintenant</a>
                    <a href="" class="btn btn-primary p-3 m-2 font-weight-bold">Ajouter au panier</a>
                    <a href="" class="btn btn-danger p-3 m-2 font-weight-bold">Nous contacter</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mt-3">
                    <img src="./img/g502-lightspeed-gallery-1.png" alt="" width="360">
                    <h5 class="font-weight-bold mt-3"><?php echo $title3['nom_produit'] ?></h5>
                    <p class="mt-3 lead"><?php echo $row['description_produit'] ?></p>
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

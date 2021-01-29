<?php
$title = "Mouse e-SHOP";
ob_start();
?>


<div class="jumbotron">
    <h1 class="display-3">Mouse, world</h1>
    <p class="lead"></p>
    <hr class="my-4">
    <p></p>
    <p class="lead">
        <a class="btn btn-outline-primary btn-lg" href="listeProduit.php" role="button">liste de produits</a>
    </p>
</div>



<?php

$content = ob_get_clean();
require "template.php";
?>
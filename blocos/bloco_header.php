<?php
require_once "class/Site.php";
require_once "class/ping.php";
$site = new Site();
?>
<div class="container2">
    <div class="black width_96">
        <div class="col-md-4 black_internos">
            <?php require_once("blocos/form_cadastra_site.php") ?>
        </div>
        <div class="col-md-4 black_internos">
            <h2>SITES ONLINE</h2>
            <h2 class="text-success">
                <?php
                    $resultado = $site->sitesOnline($site);
                ?>
            </h2>
        </div>
        <div class="col-md-4 black_internos">
            <h2>LISTA DE SITES OFFLINE</h2>
            <h2 class="text-danger">   
                <?php
                    $resultado = $site->sitesOff($site);
                ?>
            </h2>
        </div>
    </div>
</div>

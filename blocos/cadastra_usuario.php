<?php
require_once "class/Site.php";
require_once "class/ping.php";
$site = new Site();
$resultado = $site->sitesCadastrados($site);
//print_r($resultado)


cadastraUsuario();

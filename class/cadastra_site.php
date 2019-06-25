<?php

require_once "root.php";
require_once "Site.php";
$site = new Site();


if( empty($_POST['url']) )
{ // FAZ A VERIFICAÇAO DO PREENCHIMENTO
?>
	<script type="text/javascript">
		alert("Preenca os campos para continuar");
	</script><?php
	header("refresh: 0.1; url="."$root"."");
	die();
}
else
{
    $site->url = $_POST["url"];
    $site->cadastraSite($site); ?>

        <script type="text/javascript">
            alert("Url cadastrada com sucesso!");
        </script>

    <?php
    header("refresh: 0.1; url="."$root"."");
    die();
}

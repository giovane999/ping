<?php
require_once "class/Site.php";
require_once "class/ping.php";
$site = new Site();
$resultado = $site->sitesCadastrados($site);
//print_r($resultado)
?>

 <!-- <h2 class="mb-3">Ranking</h2> -->
 <table class="table">
   <thead>
     <tr>
         <th scope="col">Url</th>
         <th scope="col">Status</th>
     </tr>
   </thead>
   <tbody>

    <?php foreach($resultado as $site) : ?>
    	<tr>
            <td><?= htmlspecialchars($site['url']) ?></td>
            <td><?= Ping($site['url']); ?></td>
    	</tr>
    <?php endforeach ?>

   </tbody>
 </table>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    h1:{
        text-align: center;
    }
</style>

<h1>Résultat de la recherche par nom</h1>

    <?php foreach ($medicament as $key) { ?>
        <p><?php echo $key->med_depotlegal;?></p>
        <p><?php echo $key->med_nomcommercial;?></p>
    <?php } ?>

<form method="post">
    <p align="center">
        <input type="button" value="Fermer la fenêtre" onClick="window.close()">
    </p>
</form>	
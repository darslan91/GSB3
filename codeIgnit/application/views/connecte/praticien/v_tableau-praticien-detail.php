<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- /* --------------------------------------------------- */
//Affichage de tout les praticiens
/* --------------------------------------------------- */ -->
	<!-- Affichage du tableau -->
<h3>Détail Praticien</h3>
<div style="overflow-x:auto; margin-bottom: 1%;" class="compte-rendu">
    <table class="table">
        <tr class="table">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Remplaçant</th>
            <th>Type Code</th>
        </tr>
        <?php
        foreach ($praticien as $key){
        ?>
        <tr>
        	<td><?php echo $key->pra_nom?></td>
        	<td><?php echo $key->pra_prenom?></td>
        	<td><?php if($key->rplc == 1){echo "Oui";}else{echo "Non";}?></td>
        	<td><?php echo $key->typ_code?></td>
        </tr>
        <?php } ?>
    </table>
</div>
<div style="overflow-x:auto; margin-bottom: 1%;" class="compte-rendu">
    <table class="table">
        <tr class="table">
            <th>Nom</th>
            <th>Prenom</th>
            <th>CP</th>
            <th>Type Code</th>
        </tr>
        <?php
        foreach ($praticien as $key){
        ?>
        <tr>
            <td><?php echo $key->pra_nom?></td>
            <td><?php echo $key->pra_prenom?></td>
            <td><?php echo $key->pra_cp?></td>
            <td><?php echo $key->typ_code?></td>
        </tr>
        <?php } ?>
    </table>
</div>
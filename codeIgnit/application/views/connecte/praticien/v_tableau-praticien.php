<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- /* --------------------------------------------------- */
//Affichage de tout les praticiens
/* --------------------------------------------------- */ -->
	<!-- Affichage du tableau -->
<h3>Tous les Praticiens</h3>
<div style="overflow-x:auto; margin-bottom: 5%;" class="compte-rendu">
    <table class="table">
        <tr class="table">
            <th>Nom</th>
            <th>Prenom</th>
            <th>CP</th>
            <th>Type Code</th>
            <th>Detail</th>
        </tr>
        <?php
        foreach ($praticien as $key){
        ?>
        <tr>
        	<td><?php echo $key->pra_nom?></td>
        	<td><?php echo $key->pra_prenom?></td>
        	<td><?php echo $key->pra_cp?></td>
        	<td><?php echo $key->typ_code?></td>
        	<td><?php echo anchor('c_praticien/detail/'.$key->pra_num.'','X'); ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!-- Affichage du tableau -->
<h3>Detail</h3>
<div style="overflow-x:auto;" class="compte-rendu">
    <table class="table">
        <tr class="table">
            <th>Date</th>
            <th>Motif</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Notoriete Praticien</th>
            <th>Type Praticien</th>
        </tr>
        
        <?php foreach ($detail as $key){?>
        <tr>
        	<td><?php echo $key->rap_date?></td>
        	<td><?php echo $key->rap_motif?></td>
        	<td><?php echo $key->pra_nom?></td>
        	<td><?php echo $key->pra_prenom?></td>
        	<td><?php echo $key->pra_adresse." ".$key->pra_cp." ".$key->pra_ville?></td>
        	<td><?php echo $key->pra_coefnotoriete?></td>
        	<td><?php echo $key->typ_libelle?></td>
        </tr>
        <?php }?>
    </table>
    <?php echo anchor('c_compte/index','Retour')?>
</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- /* --------------------------------------------------- */
//Affichage des cadeau
/* --------------------------------------------------- */ -->
	<!-- Affichage du tableau -->
	<div style="overflow-x:auto;" class="compte-rendu">
	    <table class="table">
	        <tr class="table">
	            <th>Nom Medicament</th>
	            <th>QTE</th>
	        </tr>
	        <?php
	        foreach ($cadeau as $key){
	        ?>
	        <tr>
	        	<td><?php echo $key->med_nomcommercial?></td>
	        	<td><?php echo $key->off_qte?></td>
	        </tr>
	        <?php } ?>
	    </table>
	</div>
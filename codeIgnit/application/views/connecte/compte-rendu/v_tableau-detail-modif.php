<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
/* --------------------------------------------------- */
//Affichage de la demande de modification du compte rendu
/* --------------------------------------------------- */
	<!-- Affichage du tableau -->
<h3>Modification</h3>
<div style="overflow-x:auto;" class="compte-rendu">
    <table class="table">
        <tr class="table">
            <th>Date</th>
            <th>Motif</th>
            <th>Valider</th>
        </tr>
        
        <?php foreach ($detail as $key){?>
        <tr>
        	<td><?php echo substr($key->rap_date, 0, 10)?></td>
        	<td><?php echo $key->rap_motif?></td>
        	<td></td>
        </tr>
        <?php echo form_open('c_compte/validation_modif', $_POST);?>
        <tr>
        	<td><input type="date" name="date" size="7"></td>
        	<td>
        		<select name="motif">
        			<option>Rapport Annuel</option>
        			<option>Nouveaute / Actualisation</option>
                    <option>Baisse activite</option>
                    <option>Solicitation</option>
        			<option>Autre</option>
        		</select>
        	</td>
        	<td><?php echo form_submit('envoie', 'Valider') ?></td>
        </tr>
        <?php }?>
    </table>
    <?php echo form_close();?>
    <?php echo anchor('c_compte/index','Retour')?>
</div>
/* --------------------------------------------------- */
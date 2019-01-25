<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <h3>Nouveau</h3>
 <div style="overflow-x:auto;" class="compte-rendu">
    <table class="table">
        <tr class="table">
        	<th>Rapport de Visite N°</th>
        	<th>Motif</th>
        	<th>Nom Praticien</th>
            <th>Date</th>
            <th>Valider</th>
        </tr>
        
        <?php echo form_open('c_compte/nouveau_validation', $_POST);?>
        <tr>
        	<td><input type="text" readonly value="<?php foreach($nbRap as $key){echo $key->max+1;} ?>" name="numRap"></td>
        	<td>
        		<select name="motifRap">
        			<option>Rapport Annuel</option>
        			<option>Nouveaute / Actualisation</option>
                    <option>Baisse activite</option>
                    <option>Solicitation</option>
        			<option>Autre</option>
        		</select>
        	</td>
        	<td>
        		<select name="nomPrenomPra">
        			<?php foreach ($praticien as $key) { ?>
        				<option><?php echo $key->pra_nom ." - ".$key->pra_prenom; ?></option>
        			<?php } ?>
        		</select>
        	</td>
        	<td><input type="text" readonly name="dateNv" value="<?php echo date("Y-m-j"); ?>"></td>
        	<td><?php echo form_submit('envoie', 'Valider') ?></td>
        </tr>
    </table>
    <textarea name="textArea" style="width: 100%; height: 100px; margin-top: 1%;" required="required"></textarea>
    <?php echo form_close();?>
    <?php echo anchor('c_compte/index','Retour')?>
</div>


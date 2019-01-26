<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- /* --------------------------------------------------- */
//Saisie d'un nouveau compte rendu
/* --------------------------------------------------- */ -->
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
        				<option value="<?php echo $key->pra_num ?>"><?php echo $key->pra_nom ." - ".$key->pra_prenom; ?></option>
        			<?php } ?>
        		</select>
        	</td>
        	<td><input type="text" readonly name="dateNv" value="<?php echo date("Y-m-j"); ?>"></td>
        	<td><?php echo form_submit('envoie', 'Valider') ?></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" name="autreMotif" placeholder="Autre Motif"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
<!-- Fin première table -->

<!-- début du détail -->
    <textarea name="textArea" placeholder="Description Rapport" style="width: 100%; height: 100px; margin-top: 1%;" required="required"></textarea>
<!-- fin détail -->

<!-- remplacant -->
    <table class="table" style="margin-top: 1%;">
        <tr class="table">
            <th>Remplaçant</th>
            <th>Existe</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Specialité</th>
        </tr>
        <tr>
            <td><input type="checkBox" name="mdcRemplace"></td>
            <td>
                <select name="existeRplc">
                    <option>Non</option>
                    <?php foreach ($rplc as $key){ ?>
                        <option value="<?php echo $key->pra_num ?>">
                            <?php echo $key->pra_nom." ".$key->pra_prenom ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
            <td><input type="text" name="nomNouveauPra"></td>
            <td><input type="text" name="prenomNouveauPra"></td>
            <td>
                <select name= "speCode">
                    <?php foreach ($spe as $key) { ?>
                        <option value="<?php echo $key->typ_code ?>">
                            <?php echo $key->typ_libelle ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
    </table>
<!-- fin médoc -->

<!-- medicament -->
    <table class="table" style="margin-top: 1%;">
        <tr class="table">
            <th>Cadeau</th>
            <th>Cocher si cadeau</th>
            <th></th>
        </tr>
        <tr>
            <td>
                <input type="checkBox" name="check1">
                <select name="cadeau1">
                    <?php foreach ($medoc as $key) { ?>
                        <option value="<?php echo $key->med_depotlegal ?>"><?php echo $key->nom ?></option>
                    <?php } ?>
                </select>
                <!-- <input type="number" name="nb1"> -->
            </td>
            <td>
                <input type="checkBox" name="check2">
                <select name="cadeau2">
                    <?php foreach ($medoc as $key) { ?>
                        <option value="<?php echo $key->med_depotlegal ?>"><?php echo $key->nom ?></option>
                    <?php } ?>
                </select>
                <!-- <input type="number" name="nb2"> -->
            </td>
            <td>
                <input type="checkBox" name="check3">
                <select name="cadeau3">
                    <?php foreach ($medoc as $key) { ?>
                        <option value="<?php echo $key->med_depotlegal ?>"><?php echo $key->nom ?></option>
                    <?php } ?>
                </select>
                <!-- <input type="number" name="nb3"> -->
            </td>
        </tr>
    </table>

    <code>
        <?php
        if(isset($erreurCode[1])){
            foreach ($erreurCode as $key) {
                echo $key;
                echo "<br/>";
            }
        }
        ?>
    </code>
    <?php echo form_close();?>
    <?php echo anchor('c_compte/index','Retour')?>
</div>
<!-- /* --------------------------------------------------- */ -->


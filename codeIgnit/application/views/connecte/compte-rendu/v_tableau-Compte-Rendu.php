<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!-- Affichage du tableau -->
<h3>Tous les Comptes-Rendus</h3>
<div style="overflow-x:auto;" class="compte-rendu">
    <table class="table">
        <tr class="table">
            <th>Rapport de visite</th>
            <th>Motif Visite</th>
            <th>Nom Practicien</th>
            <th>Date Visite</th>
            <th>Voir le Detail</th>
        </tr>
        <?php
        foreach ($rapport as $key){
        ?>
        <tr>
        	<td><?php echo $key->rap_num?></td>
        	<td><?php echo $key->rap_motif?></td>
        	<td><?php echo $key->pra_nom?></td>
        	<td><?php echo substr($key->rap_date, 0, 10)?></td>
        	<td><?php echo anchor('c_compte/detail/'.$key->rap_num.'','X'); ?></td>
        </tr>
        <?php } ?>
    </table>
    
    	<!-- Champs de recherche -->
   	<div>
        <?php
          echo validation_errors();
            echo br();
            echo form_open('c_compte/rechercheImpressise', $_POST);
            
          //    echo form_dropdown('personne', array('tous','1','2'), set_value('Tous', 'un', 'deux'));
            ?>  
            <table style="border: 1px solid grey;">
                <tr>
                    <td style="border: 1px solid grey;">Anne</td>
                    <td style="border: 1px solid grey;">Nom</td>
                    <td style="border: 1px solid grey;">Limite</td> 
                    <td style="border: 1px solid grey;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid grey;">
                        <select name="anne">
                            <option value="Tous">Indefinie</option>
                            <?php
                            foreach ($rapport as $key){
                            ?>
                            <option><?php echo substr($key->rap_date, 0, 4) ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td style="border: 1px solid grey;">
                        <select name="personne">
                            <option value="Tous">Indefinie</option>
                            <?php
                            foreach ($rapport as $key){
                            ?>
                            <option><?php echo $key->pra_nom ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td style="border: 1px solid grey;">
                        <select name="limit">
                            <?php
                            $i = 1;
                            foreach ($rapport as $key){
                            ?>
                            <?php $i ;$i++?>
                            <?php } ?>
                            <?php foreach ($rapport as $key){
                            ?>
                            <option><?php echo $i-1 ;$i--?></option>
                            <?php } ?>
                        </select> 
                    </td>
                    <td style="border: 1px solid grey;">
                        <?php
                            echo form_submit('envoie', 'Envoyer');
                            echo form_close();
                        ?>
                    </td>
                </tr>
                
            </table>
            	
            
    </div>
</div>
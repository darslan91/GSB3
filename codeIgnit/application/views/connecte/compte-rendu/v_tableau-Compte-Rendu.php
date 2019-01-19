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
        	<td><?php echo $key->rap_date?></td>
        	<td><?php echo anchor('c_compte/detail','X'); ?></td>
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
                <select name="anne">
                	<option value="Tous">Indefinie</option>
                	<option value="2018">2018</option>
                	<option value="2017">2017</option>
                </select>
                
            	<select name="personne">
                	<option value="Tous">Indefinie</option>
                	<option value="un">1</option>
                	<option value="deux">2</option>
                </select>   	
            	
            <?php
                echo form_submit('envoie', 'Envoyer');
            echo form_close();
        ?>
    </div>
</div>
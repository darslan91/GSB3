<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!-- Affichage du tableau -->
<div style="overflow-x:auto;" class="compte-rendu">
    <table class="table">
        <tr class="table">
            <th>First Name</th>
            <th>Visionner</th>
        </tr>
        <tr>
            <td>Jill</td>
            <td><?php echo anchor('c_compte/detail','X'); ?></td>
        </tr>
        <tr>
       		<td>Eve</td>
       		<td><?php echo anchor('','X'); ?></td>
        </tr>
        <tr>
            <td>Adam</td>
            <td><?php echo anchor('','X'); ?></td>
        </tr>
    </table>
    
    	<!-- Champs de recherche -->
   	<div>
        <?php
          echo validation_errors();
            echo br();
            echo form_open('c_compte/recherche', $_POST);
            
          //    echo form_dropdown('personne', array('tous','1','2'), set_value('Tous', 'un', 'deux'));
            ?>
                <select name="anne">
                	<option value="">2018</option>
                	<option value="">2017</option>
                	<option value="">2016</option>
                </select>
                
            	<select name="personne">
                	<option value="Tous">Tous</option>
                	<option value="un">1</option>
                	<option value="deux">2</option>
                </select>   	
            	
            <?php
                echo form_submit('envoie', 'Envoyer');
            echo form_close();
        ?>
    </div>
</div>
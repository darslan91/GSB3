<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- TABLEAUX MEDICAMENTS -->
<table class="table" style="max-height: 400px; overflow: scroll;">
    <tr class="table">
        <th>Dépôt Légal</th>
        <th>Nom Commercial</th>
        <th>Code Famille Médicament</th>
        <th>Médicament Composition</th>
        <!-- <th>Médicament Effets</th> -->
        <!-- <th>Médicament Contre-indications</th> -->
        <!-- <th>Prix Echantillon</th> -->
    </tr>
    
    <!-- Début tableau -->
    <?php 
    foreach ($medicament as $key){
    ?>

    <tr class="table">
        <td><?php echo $key->med_depotlegal?></td>
        <td><?php echo $key->med_nomcommercial?></td>
        <td><?php echo $key->fam_code?></td>
        <td><?php echo $key->med_composition?></td>
        <!-- <td><?php echo $key->med_effets?></td> -->
        <!-- <td><?php echo $key->med_contreindic?></td> -->
        <!-- <td><?php echo $key->prix?></td> -->
    </tr>
    <?php
    }
    ?>

</table>
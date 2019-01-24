<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- TABLEAUX MEDICAMENTS -->
<table>
    <tr>
        <th>Dépôt Légal</th>
        <th>Nom Commercial</th>
        <th>Code Famille Médicament</th>
        <th>Country</th>
        <th>Médicament Composition</th>
        <th>Médicament Effets</th>
        <th>Médicament Contre-indications</th>
    </tr>
    
    <!-- Début tableau -->
    <?php 
    foreach ($rapport as $key){
    ?>

    <tr>
        <td><?php echo $key->num_medoc?></td>
        <td>Dépôt Légal</td>
        <td>Dépôt Légal</td>
        <td>Dépôt Légal</td>
        <td>Dépôt Légal</td>
        <td>Dépôt Légal</td>
        <td>Dépôt Légal</td>
    </tr>
    <?php}?>

</table>
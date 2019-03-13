<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div style="overflow-x:auto;">
    <table class="table">
        <tr class="table">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>CP</th>
            <th>Ville</th>
            <th>Date Embauche</th>
        </tr>
        <tr>
            <td><?php echo $information['vis_nom']; ?></td>
            <td><?php echo $information['vis_prenom']; ?></td>
            <td><?php echo $information['vis_adresse']; ?></td>
            <td><?php echo $information['vis_cp']; ?></td>
            <td><?php echo $information['vis_ville']; ?></td>
            <td><?php echo $information['vis_dateembauche']; ?></td>
        </tr>
    </table>
</div>
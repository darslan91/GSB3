<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
    #table-scroll{
        display: inline-block;
        overflow: auto;
        height: 40px;
    }
</style>

<!-- TABLEAUX MEDICAMENTS -->

<table class="table">
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
        <td colspan="4">
            <div style="overflow: auto;">    
                <table>
                    <tr>
                        <td><?php echo $key->med_depotlegal?></td>
                        <td><?php echo $key->med_nomcommercial?></td>
                        <td><?php echo $key->fam_code?></td>
                        <td><?php echo $key->med_composition?></td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>

    <?php
    }
    ?>
</table>

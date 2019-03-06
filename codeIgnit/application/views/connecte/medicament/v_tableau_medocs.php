<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
    table{
        border-collapse: collapse;
    }

    thead, tfoot{
        background-color: plum;
    }

    tbody{
        background-color: pink;
    }

    #tableau-neutre{
        border: 1px solid black;
        margin: auto;
    }

    #tableau-scroll{
        display: inline-block;
        overflow: auto;
        height: 150px;
    }
</style>

<table id="tableau-neutre">
    <thead>
        <tr>
            <th>Dépôt Légal</th>
            <th>Nom Commercial</th>
            <th>Code Famille Médicament</th>
            <th>Détails</th>
            <th> </th><!-- Caractère invisible avec alt+255 -->
            <th> </th><!-- Caractère invisible avec alt+255 -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="6"><!-- Adapter le nombre en fonction du nombre de <th> au dessus -->
                <table id="tableau-scroll">
                    <?php 
                    foreach ($medicament as $key){
                    ?>
                    <tr>
                        <td><?php echo $key->med_depotlegal;?></td>
                        <td><?php echo $key->med_nomcommercial;?></td>
                        <td><?php echo $key->fam_code;?></td>
                        <td><a href="#">Plus</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
    table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid grey;
    }

    .table th, td{
        text-align: left;
        padding: 8px;
    }

    .table th{
    background-color: #D8D8D8;
    }

    .table tr:nth-child(even){background-color: white}

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


<h2> Tableau des médicaments </h2>

<table class="table">
    <tr class="table">
        <th>Dépôt Légal</th>
        <th>Nom Commercial</th>
        <th>Code Famille Médicament</th>
        <th>Détail</th>
    </tr>

    <tr class="table">
        <td colspan="4">
            <table id="tableau-scroll">
                <?php
                foreach($medicament as $key){ 
                ?>
                <tr>
                    <td><?php echo $key->med_depotlegal;?></td>
                    <td><?php echo $key->med_nomcommercial;?></td>
                    <td><?php echo $key->fam_code;?></td>
                    <td><a href="detail/<?php echo $key->med_depotlegal;?>" target="wclose" onclick="window.open('detail/<?php echo $key->med_depotlegal;?>','wclose', 'width=500,height=700,toolbar=no,status=no,left=60,top=110')">Plus</a></td>
                </tr>
                <?php
                } 
                ?>
            </table>
        </td>
    </tr>
</table>
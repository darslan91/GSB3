<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    h1{
        text-align: center;
    }
    .table {
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

</style>

<h1>Résultat</h1>

    <?php
        /*foreach ($medicament as $value) { 
            foreach($value as $med){
                echo $med.br(1);
            }
        }*/
    ?>

    <?php 
        $depot_legal = $medicament['med_depotlegal'];
        $taille = sizeof($depot_legal);

        $nom_commercial = $medicament['med_nomcommercial'];

        $i = 0;

    ?>

    <table class="table">
        <tr class="table">
            <th >Dépôt Légal</th>
            <th>Nom commercial</th>
            <!--<th>Détail</th>-->
        </tr>

        <?php
            while($i< $taille){
                // Generation de la ligne
                echo "<tr>";
                    echo "<td>".$depot_legal[$i]."</td>";
                    $num_dep = $depot_legal[$i];
                    echo "<td>".$nom_commercial[$i]."</td>";
                    //echo "<td><a href=\"detail/$depot_legal[$i]\" target=\"wclose\" onclick=\"window.open('detail/$depot_legal[$i]','wclose', 'width=500,height=825,toolbar=no,status=no,left=60,top=110')\">Plus</a></td>";
                echo "</tr>";

                $i = $i+1;
            }
        ?>
    </table>
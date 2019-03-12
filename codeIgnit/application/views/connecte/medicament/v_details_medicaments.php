<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    h1{
        text-align: center;
        font-family: normal Helvetica, Arial, sans-serif;
    }
    .font{
        font-family: normal Helvetica, Arial, sans-serif;
        font-size : 20px;
        text-decoration: underline #003399;
    }

    .font_result{
        font-family: normal Helvetica, Arial, sans-serif;
        font-size : 15px;
        color: #4F5155;
    } 
</style>



<h1>Informations sur le médicament</h1>

<p>
    <h3 class="font">Dépôt Légal : </h3>
    <?php echo "<h3 class=\"font_result\">".$medicament[0]->med_depotlegal."</h3>";?>
</p>

<p>
    <h3 class="font">Nom Commercial : </h3>
    <?php echo "<h3 class=\"font_result\">".$medicament[0]->med_nomcommercial."</h3>";?>
</p>

<p>
    <h3 class="font">Code Famille Medicament : </h3>
    <?php echo "<h3 class=\"font_result\">".$medicament[0]->fam_code."</h3>";?>
    <h3 class="font">Libellé Famille Médicament : </h3>
    <?php echo "<h3 class=\"font_result\">".$medicament[0]->fam_libelle."</h3>";?>
</p>

<p>
    <h3 class="font">Composition du Médicament : </h3>
    <?php echo "<h3 class=\"font_result\">".$medicament[0]->med_composition."</h3>";?>
</p>

<p>
    <h3 class="font">Effet du Médicament : </h3>
    <?php echo "<h3 class=\"font_result\">".$medicament[0]->med_effets."</h3>";?>
</p>

<p>
    <h3 class="font">Contre-indications du Médicament : </h3>
    <?php echo "<h3 class=\"font_result\">".$medicament[0]->med_contreindic."</h3>";?>
</p>

<form method="post">
    <p align="center">
        <input type="button" value="Fermer la fenêtre" onClick="window.close()">
        <!--<input type="button" value="Format PDF" href="connecte/pdf/pdf_detail_medicament.php"/>-->
    </p>
</form>	
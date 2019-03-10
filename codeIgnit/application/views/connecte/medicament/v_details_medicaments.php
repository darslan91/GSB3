<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    h1{
        text-align: center;
    }
</style>



<h1>Information sur le médicament</h1>

<p>
    <h3>Dépôt Légal : </h3>
    <?php echo $medicament[0]->med_depotlegal;?>
</p>

<p>
    <h3>Nom Commercial : </h3>
    <?php echo $medicament[0]->med_nomcommercial;?>
</p>

<p>
    <h3>Code Famille Medicament : </h3>
    <?php echo $medicament[0]->fam_code;?>
    <h3>Libellé Famille Médicament : </h3>
    <?php echo $medicament[0]->fam_libelle;?>
</p>

<p>
    <h3>Composition du Médicament : </h3>
    <?php echo $medicament[0]->med_composition;?>
</p>

<p>
    <h3>Effet du Médicament : </h3>
    <?php echo $medicament[0]->med_effets;?>
</p>

<p>
    <h3>Contre-indications du Médicament : </h3>
    <?php echo $medicament[0]->med_contreindic;?>
</p>

<form method="post">
    <p align="center">
        <input type="button" value="Fermer la fenêtre" onClick="window.close()">
        <input type="button" value="Format PDF"/>
    </p>
</form>	
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
    <br/>
    <h3>Libellé Famille Médicament : </h3>
    <!-- Ligne pour afficher le contenue -->
</p>

<p>
    <h3>Composition du Médicament : </h3>
    <br/>
    <?php echo $medicament[0]->med_composition;?>
</p>

<p>
    <h3>Effet du Médicament : </h3>
    <?php echo $medicament[0]->med_effet;?>
</p>

<p>
    <h3>Contre-indications du Médicament : </h3>
    <?php echo $medicament[0]->med_contreindic;?>
</p>

<p>
    <h3>Prix de l'échantillon : </h3>
    <?php echo $medicament[0]->prix;?>
</p>

<form method="post">
    <p align="center">
        <input type="button" value="Fermer la fenêtre" onClick="window.close()">
    </p>
</form>	
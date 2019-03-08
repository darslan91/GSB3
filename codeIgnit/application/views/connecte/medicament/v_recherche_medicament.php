<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h2>Recherches</h2>

<h3>Rechercher par le nom du médiacament :</h3>

<?php 
    //Erreur dans le formulaire
    echo validation_errors();

    //Début du formulaire
    $attribut = array('target'=> '_blank');
    echo form_open('c_medicament/rechercheNom', $attribut);
    echo br(2);

    //Saisie du nom du médicament recherché
    echo form_label('Nom Recherché : ', 'nom');
    echo form_input('nom');

    echo form_submit('valid','Rechercher');
    /*if(isset($_POST['valid'])){
        echo "<test onload=\"window.open('rechercheNom','wclose', 'width=500,height=700,toolbar=no,status=no,left=60,top=110')\"/>";
    }*/

    /*$fenetre="window.open('rechercheNom','wclose', 'width=500,height=700,toolbar=no,status=no,left=60,top=110')";
    $extra = array('onclick'=> $fenetre); 
    echo form_submit('valid','Rechercher', $extra);*/

    echo form_close();
?>


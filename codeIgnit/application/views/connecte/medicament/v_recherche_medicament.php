<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h2>Recherches</h2>

<h3>Rechercher par le nom du médiacament :</h3>

<?php 
    //Erreur dans le formulaire
    echo validation_errors();

    //Début du formulaire
    echo form_open('c_medicament/rechercheNom', $_POST);
    echo br(2);

    //Saisie du nom du médicament recherché
    echo form_label('Nom recherché : ', 'nom');
    echo form_input('nom', set_value('nom'));
?>
<a href="rechercheNom" target="wclose" onclick="window.open('rechercheNom','wclose', 'width=500,height=700,toolbar=no,status=no,left=60,top=110')"><?php echo form_submit('valid','Rechercher');?></a>
<?php echo form_close();?>
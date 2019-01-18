<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="center">
  <h2>Connexion</h2>

  <?php
      echo validation_errors();
      echo form_open('c_accueil/connexion', $_POST);
    
      echo "Login";
      echo br();
      echo form_input('login');
      echo br();
    
      echo "Mot de passe";
      echo br();
      echo form_password('mdp');
      echo br();
      echo br();
    
      echo form_submit('envoie', 'Envoyer');
      echo form_reset('reset', 'Annuler');
  ?>

</div>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="center">
  <center>
  <?php
  echo validation_errors();
  echo form_open('c_accueil/connexion', $_POST);

  echo "email";
  echo br();
  echo form_input('email');
  echo br();

  echo "Mot de passe";
  echo br();
  echo form_password('mdp');
  echo br();

  echo form_submit('envoie', 'Envoyer');
  echo form_reset('reset', 'Annuler');
  ?>
  </center>
</div>

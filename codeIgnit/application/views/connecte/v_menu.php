<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>

<h2>Vous etes Connecte</h2>
<p>Bienvenue a vous : </p>

<div class="row">
  <div class="left" style="background-color:#D8D8D8;">
    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Recherche.." title="Type in a category">
    <ul id="myMenu">
		<li><?php echo anchor('c_connecte/index','Accueil', 'style="background-color: #5858FA; color: white;"'); ?></li>
		<li><?php echo anchor('c_connecte/tableau','Tableau'); ?></li>
      	<li><?php echo anchor('','Lien1'); ?></li>
  		<li><?php echo anchor('','Lien2'); ?></li>
  		<li><?php echo anchor('','Lien3'); ?></li>
  		<li><?php echo anchor('','Lien3'); ?></li>
  		<li><?php echo anchor('c_accueil/deconnexion','Deconnexion'); ?></li>
    </ul>
  </div>

  <div class="right" style="background-color:#F2F2F2;">

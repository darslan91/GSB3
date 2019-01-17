<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>

<div class="vertical-menu">
	<?php echo anchor('controleur_accueil','Accueil', 'style="background-color: #4CAF50; color: white;"'); ?>
	<?php echo anchor('','Lien 1'); ?>
	<?php echo anchor('','Lien 2'); ?>
	<?php echo anchor('','Lien 3'); ?>
	<?php echo anchor('','Lien 4'); ?>
</div>
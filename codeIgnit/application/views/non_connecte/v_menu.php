<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>

<div class="vertical-menu">
	<a href="" class="active">Accueil</a>
	<a href="">lien 1</a>
	<a href="">Lien 2</a>
	<a href="">Lien 3</a>
	<a href="">Lien 4</a>
	
	<?php echo anchor('controleur_accueil','Accueill'); ?>
	<?php echo anchor('','Lien 1'); ?>
	<?php echo anchor('','Lien 2'); ?>
	<?php echo anchor('','Lien 3'); ?>
</div>
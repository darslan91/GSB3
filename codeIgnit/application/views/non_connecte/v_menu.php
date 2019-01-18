<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>

<h2>Search Menu</h2>
<p>Start to type for a specific category inside the search bar to "filter" the search options.</p>

<div class="row">
  <div class="left" style="background-color:#bbb;">
    <h2>Menu</h2>
    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
    <ul id="myMenu">
		<li><?php echo anchor('controleur_accueil','Accueil', 'style="background-color: #4CAF50; color: white;"'); ?></li>
     	<li><?php echo anchor('','Lien1'); ?></li>
		<li><?php echo anchor('','Lien2'); ?></li>
		<li><?php echo anchor('','Lien3'); ?></li>
		<li><?php echo anchor('','Lien45'); ?></li>
    </ul>
  </div>

  <div class="right" style="background-color:#ddd;">

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
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
      <li><a href="#">PHP</a></li>
      <li><a href="#">Python</a></li>
      <li><a href="#">jQuery</a></li>
      <li><a href="#">SQL</a></li>
      <li><a href="#">Bootstrap</a></li>
      <li><a href="#">Node.js</a></li>
    </ul>
  </div>

  <div class="right" style="background-color:#ddd;">
    <h2>Page Content</h2>
    <p>Start to type for a specific category inside the search bar to "filter" the search options.</p>
    <p>Some text..Some text..Some text..Some text..Some text..Some text..Some text..Some text..</p>
    <p>Some other text..Some text..Some text..Some text..Some text..Some text..Some text..Some text..</p>
    <p>Some text..</p>

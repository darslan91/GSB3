<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo form_open('c_compte/rechercheImpressise', $_POST);
?>
	<select name="nom">
		<option value="indef">Indefinie</option>
		<?php foreach ($praticien as $key): ?>
			<option value="<?php ?>"></option>
		<?php endforeach ?>
	</select>
	<select name="cp">
		<?php foreach ($praticien as $key): ?>
			<option value="<?php ?>"></option>
		<?php endforeach ?>
	</select>

<?php foreach ($nb as $key){
	echo br();
	echo "Page numero: ".$num;
	echo br();
	echo "Valeur pra_num haut: ".$btnHaut;
	echo br();
	echo "Valeur pra_num bas: ".$btnBas;
	echo br();
?>
	<center>
	<?php
	for ($i=1; $i <= ceil($key->nb/$limit); $i++) {
		if($num == $i){
			echo anchor('c_praticien/index/'.$i.'/'.$limit,''.$i, 'class="pagination2"');
		}
		else{
			echo anchor('c_praticien/index/'.$i.'/'.$limit,''.$i, 'class="pagination"');
		}
	}
	?>
	</center>
	<?php
} ?>
<footer>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo form_open('c_praticien/index/1/15', $_POST);
?>
<table style="border: 1px solid grey; margin-bottom: 2px;">
	<tr>
		<th style="border: 1px solid grey;">Nom</th>
		<th style="border: 1px solid grey;">Localisation</th>
		<th style="border: 1px solid grey;">Limite</th>
		<th style="border: 1px solid grey;">Valider</th>
	</tr>
	<tr>
		<td style="border: 1px solid grey;">
			<select name="nom">
				<option value="indef">Indefinie</option>
				<?php foreach ($praticien as $key): ?>
					<option value="<?php echo $key->pra_num?>"><?php echo $key->pra_nom?></option>
				<?php endforeach ?>
			</select>
		</td>
		<td style="border: 1px solid grey;">
			<select name="cp">
				<option value="indef">Indefinie</option>
				<?php foreach ($praticien as $key): ?>
					<?php if($key->pra_cp != ""){ ?>
					<option value="<?php echo $key->pra_cp?>"><?php echo $key->pra_cp ?></option>
					<?php } ?>
				<?php endforeach ?>
			</select>
		</td>
		<td style="border: 1px solid grey;">
			<select name="limite">
				<option value="10">10</option>
				<option value="15">15</option>
				<option value="20">20</option>
				<option value="25">25</option>
				<option value="30">30</option>
				<option value="35">35</option>
				<option value="40">40</option>
				<option value="45">45</option>
				<option value="50">50</option>
			</select>
		</td>
		<td style="border: 1px solid grey;">
			<?php
			    echo form_submit('envoie', 'Envoyer');
			    echo form_close();
			?>
		</td>
	</tr>
</table>
	
<?php foreach ($nb as $key){ ?>
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
</footer>
<?php foreach ($nb as $key){
	echo br();
	echo br();
	echo "Page numero: ".$num;
	// echo br();
	// echo "Valeur pra_num haut: ".$btnHaut;
	// echo br();
	// echo "Valeur pra_num bas: ".$btnBas;
	// echo br();
}
?>
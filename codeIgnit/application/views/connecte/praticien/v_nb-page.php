<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
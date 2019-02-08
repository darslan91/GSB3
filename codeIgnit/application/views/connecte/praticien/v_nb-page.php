<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php foreach ($nb as $key){
	echo $key->nb;
	echo br();
	echo $key->nb/10;
	echo br();
	echo ceil($key->nb/10);
	echo br();
?>
	<center>
	<?php
	for ($i=1; $i <= ceil($key->nb/10); $i++) {
		echo anchor('c_praticien/index/'.$i.'/','Page '.$i, 'class="pagination"');
	}
	?>
	</center>
	<?php
} ?>
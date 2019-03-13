<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>

<h2>Vous etes Connecte pour la premiere fois.<br> Merci de changer le mdp</h2>

<?php echo form_open('c_accueil/changeMdp', $_POST);?>
<div style="overflow-x:auto;" class="compte-rendu">
    <table class="table">
        <tr>
        	<td>Entrer le mdp</td>
        	<td><input type="password" required="required" name="mdp1"/></td>
        </tr>
        <tr>
        	<td>Resaisir</td>
        	<td><input type="password" required="required" name="mdp2"/></td>
        </tr>
        <tr>
        	<td>Valider</td>
        	<td><button type="submite">Valider</button></td>
        </tr>
        <tr>
        	<td>Annuler</td>
        	<td><button type="reset">Annuler</button></td>
        </tr>
    </table>
</div>
<?php echo form_close();?>
<code>
	<?php echo validation_errors();

	if(isset($mdp)){
		echo $mdp;
	}

	?>
</code>

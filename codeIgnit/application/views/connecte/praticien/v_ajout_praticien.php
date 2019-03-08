<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- /* --------------------------------------------------- */
//Formulaire pour ajouté un nouveau praticien
/* --------------------------------------------------- */ -->

<h3>Nouveau particien</h3>
<div style="overflow-x:auto;" class="compte-rendu">
    <!-- Début des civilités (1er tableau)-->
    <table class="table">
        <tr class="table">
            <th>Nom</th>
            <th>Prénom</th>
        </tr>

        <?php echo form_open('c_praticien/nouveau_validation');?>
        
        <tr>
            <td><?php echo form_input('nom');?></td>
            <td><?php echo form_input('prenom');?></td>
        </tr>
    </table>
    <!-- Fin des civilités (1er tableau)-->

    <!-- Début Adresse (2ème tableau) -->
    <table class="table">
        <tr class="table">
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
        </tr>

        <tr>
            <td><?php echo form_input('adresse');?></td>
            <td><?php echo form_input('cp');?></td>
            <td><?php echo form_input('ville');?></td>
        </tr>
    </table>
    <!-- Fin Adresse (2ème tableau) -->

    <!-- Début Autres informations (3ème tableau) -->
    <table class="table">
        <tr class="table">
            <th>Spécialité</th>
            <th>Coefficient de notorité</th>
            <th>Remplacent</th>
        </tr>

        <tr>
            <!-- Afficher les spécialitées possibles -->
            <td>
                <select name= "speCode">
                    <?php foreach ($spe as $key) { ?>
                        <option value="<?php echo $key->typ_code ?>">
                            <?php echo $key->typ_libelle ?>
                        </option>
                    <?php } ?>
                </select>
            </td>

            <!-- Champ pour sasir la notorité -->
            <td><?php echo form_input('notorite');?></td>

            <!-- Remplacent ou pas -->
            <td>
                <select name ="remplCode">
                    <option value="0">OUI</option>
                    <option value="0">NON</option>
                </select>
            </td>
        </tr>
    </table>
    <!-- Fin Autres informations (3ème tableau) -->

    <!-- Bouton Ajouté -->
    <p style="text-align: center;">
        <?php echo form_submit('valid','Ajouter');?>
    </p>

    <!-- Affichage de l'erreur -->
    <code>
        <?php
        if(isset($erreurCode[1])){
            foreach ($erreurCode as $key) {
                echo $key;
                echo "<br/>";
            }
        }
        ?>
    </code>

    <?php echo form_close();?>
    <?php echo anchor('c_compte/index','Retour');?>
</div>
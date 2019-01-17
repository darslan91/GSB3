<html>
<head>
	<title>formulaire PRATICIEN</title>
	<style type="text/css">
		<!-- body {background-color: white; color:5599EE; } 
			label.titre { width : 180 ;  clear:left; float:left; } 
			.zone { width : 300 ; float : left; color:white } -->
	</style>
</head>
<body>	
<div name="haut" style="margin: 2 2 2 2 ;height:6%;"><h1><img src="logo.jpg" width="100" height="60"/>Gestion des visites</h1></div>
<div name="gauche" style="float:left;width:18%; background-color:white; height:100%;">
	<h2>Outils</h2>
	<ul><li>Comptes-Rendus</li>
		<ul>
			<li><a href="formRAPPORT_VISITE.php" >Nouveaux</a></li>
			<li>Consulter</li>
		</ul>
		<li>Consulter</li>
		<ul><li><a href="formMEDICAMENT.php" >Médicaments</a></li>
			<li><a href="formPRATICIEN.php" >Praticiens</a></li>
			<li><a href="formVISITEUR.php" >Autres visiteurs</a></li>
		</ul>
	</ul>
</div>
<div name="droite" style="float:left;width:80%;">
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
		<h1> Praticiens </h1>
		<form name="formListeRecherche" method="post" action="formPRATICIEN.php">
			<select name="lstPrat" class="titre" >
				<option>Choisissez un praticien</option>
				<option value="1">Notini</option>
				<option value="2">Gosselin</option>
				<option value="3">Delahaye</option>
			</select>
			<input type="submit" value="chercher" />
		</form>
		<form id="formPraticien">
			<label class="titre">NUMERO :</label><label size="5" name="PRA_NUM" class="zone" ></label>
			<label class="titre">NOM :</label><label size="25" name="PRA_NOM" class="zone" ></label>
			<label class="titre">PRENOM :</label><label size="30" name="PRA_PRENOM" class="zone" ></label>
			<label class="titre">ADRESSE :</label><label size="50" name="PRA_ADRESSE" class="zone" ></label>
			<label class="titre">CP :</label><label size="5" name="PRA_CP" class="zone" ></label>
			<label class="titre">COEFF. NOTORIETE :</label><label size="7" name="PRA_COEFNOTORIETE" class="zone" ></label>
			<label class="titre">TYPE :</label><label size="3" name="TYP_CODE" class="zone" ></label>
			<label class="titre">&nbsp;</label><div class="zone">
		</form>		
		<form name="formPrecedent" action="afficher" method="POST">
			<input type="hidden" name="lstPrat" value="'.$precedent.'" />
			<input type="submit" value="&lt;" />
		</form>
		<form name="formSuivant" action="afficher" method="POST">
			<input type="hidden" name="lstPrat" value="'.$suivant.'" />
			<input type="submit" value="&gt;" />
		</form>
		
	</div>
</div>
</body>
</html>
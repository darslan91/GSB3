<?php
/*-------------------------- Déclaration de la classe -----------------------------*/
class clstBDD {
/*----------------Propriétés de la classe  -----------------------------------*/
var $connexion ; 
var $dsn ="" ;
/*---------------------- Accès aux propriétés --------------------------------------*/
	function getConnexion() {return $this->connexion;}
/* --------------   Connexion à une base par un ODBC-------------- ------------------- */
	function connecte($pNomDSN, $pUtil, $pPasse) {
		//tente d'établir une connexion à une base de données 
		$this->connexion = odbc_connect( $pNomDSN , $pUtil, $pPasse );	
		return $this->connexion; 		
	}
/* --------------   Requetes sur la base -------------- ------------------- */
	function requeteAction($req) {
		//exécute une requête action (insert, update, delete), ne retourne pas de résultat
		odbc_do($this->connexion,$req);
	}
	function requeteSelect($req) {
		//interroge la base (select) et retourne le curseur correspondant
		$retour = odbc_do($this->connexion,$req);
		return $retour;
	}
	
	function close() {
		odbc_close($this->connexion);
	}
}
?>
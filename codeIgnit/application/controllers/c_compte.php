<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_compte extends CI_Controller{

/* --------------------------------------------------- */
//Index
/* --------------------------------------------------- */
    /**
    *Fonction index
    *Permet l'affichage de base du tableau
    */
/* --------------------------------------------------- */
    public function index(){
        /* CHARGEMENT */
            //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('modele_thibault');
        
            //R�cup�ration id
        $this->load->library('session');
        $idVisArray = $this->session->idVis;
        foreach ($idVisArray as $key){
            $idVis = $key->vis_matricule;
        }

            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_menu_compte-rendu');
        
            //Corps
        $data['rapport'] = $this->modele_thibault->getLesVisites($idVis);
        $data['anne'] = $this->modele_thibault->getLesAnneDeRapport($idVis);
        $this->load->view('connecte/compte-rendu/v_tableau-Compte-Rendu', $data);
             
            //Bas
        $this->load->view('connecte/v_bas');
    }
/* --------------------------------------------------- */


/* --------------------------------------------------- */
//Recheche impressise
/* --------------------------------------------------- */
    /*
    *Fonction de recherche dynamique
    *Permet d'afficher le resultat de la recherche du
    *compte rendu de tableau
    */
/* --------------------------------------------------- */  
    function rechercheImpressise(){
        /* CHARGEMENT */
            //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('modele_thibault');
        
            //R�cup�ration id
        $this->load->library('session');
        $idVisArray = $this->session->idVis;
        foreach ($idVisArray as $key){
            $idVis = $key->vis_matricule;
        }
        
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_menu_compte-rendu');
        
            //Coprs
        $personne = $this->input->post('personne');
        $anne = $this->input->post('anne');
        $limit = $this->input->post('limit');
        
        if($personne == 'Tous' && $anne == 'Tous'){
            $data['rapport'] = $this->modele_thibault->getLesVisitesL($idVis, $limit);
            $this->load->view('connecte/compte-rendu/v_tableau-Compte-Rendu', $data);
        }
        if($personne == 'Tous' && $anne != 'Tous'){
            $data['rapport'] = $this->modele_thibault->getLesVisitesAnne($idVis, $anne, $limit);
            $this->load->view('connecte/compte-rendu/v_tableau-Compte-Rendu', $data);
        }
        if($personne != 'Tous' && $anne == 'Tous'){
            $data['rapport'] = $this->modele_thibault->getLesVisitesNom($idVis, $personne, $limit);
            $this->load->view('connecte/compte-rendu/v_tableau-Compte-Rendu', $data);
        }
        if($personne != 'Tous' && $anne != 'Tous'){
            $data['rapport'] = $this->modele_thibault->getLesVisitesAnneNom($idVis, $personne, $anne, $limit);
            $this->load->view('connecte/compte-rendu/v_tableau-Compte-Rendu', $data);
        }
        
        //Bas
        $this->load->view('connecte/v_bas');
    }   
/* --------------------------------------------------- */


/* --------------------------------------------------- */
//Saisie d'un nouveau compte rendu
/* --------------------------------------------------- */
    /*
    *Fonction permettant la saisie d'un nv
    *Rapport
    */
/* --------------------------------------------------- */
    function nouveau(){
        /* CHARGEMENT */
            //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('modele_thibault');
        
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_menu_compte-rendu');
        
            //Coprs
        $data['praticien'] = $this->modele_thibault->getLesPraticiens();
        $data['nbRap'] = $this->modele_thibault->getLeNumRapport();
        $data['spe'] = $this->modele_thibault->getSpe();
        $data['rplc'] = $this->modele_thibault->getLesRplc();
        $data['medoc'] = $this->modele_thibault->getLesMedoc();

        $this->load->view('connecte/compte-rendu/v_nouveau', $data);
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
/* --------------------------------------------------- */


/* --------------------------------------------------- */
//Validation du nouveau Rapport
/* --------------------------------------------------- */
    /*
    *Fonction permettant la vérification
    *l'ajout et l'insertion d'un nouveau
    *rapport
    */
/* --------------------------------------------------- */   
    function nouveau_validation(){
         /* CHARGEMENT */
            //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('modele_thibault');
        
            //R�cup�ration id
        $this->load->library('session');
        $idVisArray = $this->session->idVis;
        foreach ($idVisArray as $key){
            $idVis = $key->vis_matricule;
        }
        $erreur = false;
        $erreurCode = array("Erreur :");

			//Eviter les erreur de type ' ou <?php
		foreach ($_POST as $key => $value) {
			if (is_string($value)) {
				$_POST[$key] = htmlspecialchars(str_replace("'","\'",$value));
			}else{
				foreach ($value as $clef => $value2) {
					$_POST[$key][$clef] = htmlspecialchars($value2);
				}
			}
		}
		
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_menu_compte-rendu');

        /* --------------------------------------------------- */  
        //donné de base
        /* --------------------------------------------------- */  
            //traitement
        $numRap = $this->input->post('numRap');
        $dateRap = $this->input->post('dateNv');
        $bilanRap = $this->input->post('textArea');
        /* --------------------------------------------------- */

        /* --------------------------------------------------- */  
        //Motif dela visite
        /* --------------------------------------------------- */
        if($_POST['motifRap'] == "Autre"){
            if($_POST['autreMotif'] == ""){
                $erreur = true;
                $erreurCode[] = "Erreur num 1 : Veuillez préciser le autre";
            }
            else{
                $motifRap = $_POST['autreMotif'];
            }
        }
        else{
            $motifRap = $_POST['motifRap'];
        }
        /* --------------------------------------------------- */

        /* --------------------------------------------------- */
        //remplacé ou non remplacé
        /* --------------------------------------------------- */
        if(isset($_POST['mdcRemplace'])){
            if($_POST['existeRplc'] != "Non"){
                $idPra = $this->input->post('existeRplc');
                $idPraRplc = $this->input->post('nomPrenomPra');
            }
            else{
                $nomNouveauPra = $this->input->post('nomNouveauPra');
                $prenomNouveauPra = $this->input->post('prenomNouveauPra');
                $spe = $this->input->post('speCode');
                if($nomNouveauPra == ""){
                    $erreur = true;
                    $erreurCode[] = "Erreur num 2 : oublie du nom praticien remplacant";
                }
                if($prenomNouveauPra == ""){
                    $erreur = true;
                    $erreurCode[] = "Erreur num 3 : oublie du prenom praticien remplacant";
                }
                if($nomNouveauPra != "" && $prenomNouveauPra != ""){
                    $idPraRplc = $this->input->post('nomPrenomPra');
                    // $infoRemplace = $this->modele_thibault->getInfoRemplace($idPraRplc);
                    // foreach ($infoRemplace as $key) {
                    //     $adresse
                    //     $corps
                    //     $ville
                    // }
                    $this->modele_thibault->insertRplc($nomNouveauPra, $prenomNouveauPra, $spe);
                    $idG = $this->modele_thibault->getIdPra($nomNouveauPra, $prenomNouveauPra);
                    foreach ($idG as $key) {
                        $idPra = $key->pra_num;
                    }
                }                
            }
        }
        else{
            $idPra = $this->input->post('nomPrenomPra');
            $idPraRplc = null;
        }
        /* --------------------------------------------------- */

        /* --------------------------------------------------- */
        //cadeau effectuer par le visiteur
        /* --------------------------------------------------- */
        $check1 = $this->input->post('check1');
        $check2 = $this->input->post('check2');
        $check3 = $this->input->post('check3');
        if($check1 == "on") {
            $this->modele_thibault->insertCadeau($idVis, $numRap, $this->input->post('cadeau1'));
        }
        if($check2 == "on") {
            $this->modele_thibault->insertCadeau($idVis, $numRap, $this->input->post('cadeau2'));
        }
        if($check3 == "on") {
            $this->modele_thibault->insertCadeau($idVis, $numRap, $this->input->post('cadeau3'));
        }
        /* --------------------------------------------------- */        

        if($erreur == false){
            $this->modele_thibault->insertNouveauRapport($idVis, $numRap, $idPra, $dateRap, $bilanRap, $motifRap, $idPraRplc);
                //corps
            $data['rapport'] = $this->modele_thibault->getLesVisites($idVis);
            $data['anne'] = $this->modele_thibault->getLesAnneDeRapport($idVis);
            $this->load->view('connecte/compte-rendu/v_tableau-Compte-Rendu', $data);
        }
        else{
                //Coprs
            $data['praticien'] = $this->modele_thibault->getLesPraticiens();
            $data['nbRap'] = $this->modele_thibault->getLeNumRapport();
            $data['spe'] = $this->modele_thibault->getSpe();
            $data['rplc'] = $this->modele_thibault->getLesRplc();
            $data['medoc'] = $this->modele_thibault->getLesMedoc();
            $data['erreurCode'] = $erreurCode;

            $this->load->view('connecte/compte-rendu/v_nouveau', $data);
        }

            //Bas
        $this->load->view('connecte/v_bas');
    }
/* --------------------------------------------------- */


/* --------------------------------------------------- */
//Fonction recherche
/* --------------------------------------------------- */
    /*
    *Fonction permettant d'afficher le resultat
    *de la recherche dans le formulaire de l'index
    */
/* --------------------------------------------------- */
    function recherche(){
        /* CHARGEMENT */
            //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_menu_compte-rendu');
        
            //Coprs
        $this->load->view('connecte/compte-rendu/v_recherche');
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
/* --------------------------------------------------- */


/* --------------------------------------------------- */
//Fonction de détail
/* --------------------------------------------------- */
    /*
    *Permet d'afficher le détail d'un rapport
    */
/* --------------------------------------------------- */   
    function detail($id){
        /* CHARGEMENT */
            //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('modele_thibault');
        
            //id r�cup�ration
        $this->load->library('session');
        $idVisArray = $this->session->idVis;
        foreach ($idVisArray as $key){
            $idVis = $key->vis_matricule;
        }
        
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_menu_compte-rendu');
        
            //Corps
        $data['detail'] = $this->modele_thibault->getLaVisite($id, $idVis);
        $detail = $data['detail'];
        foreach ($detail as $key) {
            $rplc = $key->num_rplc;
        }
        if($rplc == 0 || $rplc == null){
            $this->load->view('connecte/compte-rendu/v_tableau-detail', $data);
        }
        else{
            $data['getInfoRemplace'] = $this->modele_thibault->getInfoRemplace($rplc);
            $this->load->view('connecte/compte-rendu/v_tableau-detail-remplace', $data);
        }
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
/* --------------------------------------------------- */

/* --------------------------------------------------- */
//Fonction modifier
/* --------------------------------------------------- */
    /*
    *Modification du rapport
    */
/* --------------------------------------------------- */  
    function modifier($id){
        /* CHARGEMENT */
        //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('modele_thibault');
        
        //id r�cup�ration
        $this->load->library('session');
        $idVisArray = $this->session->idVis;
        foreach ($idVisArray as $key){
            $idVis = $key->vis_matricule;
        }
        
        //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_menu_compte-rendu');
        
        //Corps
        $data['detail'] = $this->modele_thibault->getLaVisite($id, $idVis);
        $this->load->view('connecte/compte-rendu/v_tableau-detail-modif', $data);
        //Bas
        $this->load->view('connecte/v_bas');
    }
/* --------------------------------------------------- */
// AM246B1N
}
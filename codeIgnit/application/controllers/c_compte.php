<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_compte extends CI_Controller{
    
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
        $this->load->view('connecte/compte-rendu/v_nouveau', $data);
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
    
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

            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_menu_compte-rendu');

            //traitement
        $numRap = $this->input->post('numRap');
        $motifRap = $_POST['motifRap'];
        $nomPrenomPraRap = $this->input->post('nomPrenomPra');
        $chaine = explode(" - ", $nomPrenomPraRap);
        $dateRap = $this->input->post('dateNv');
        $bilanRap = $this->input->post('textArea');
        $nom_pra = $chaine[0];
        $prenomPra = $chaine[1];
        $pra = $this->modele_thibault->getIdPra($nom_pra, $prenomPra);
        foreach ($pra as $key) {
            $idPra = $key->pra_num;
        }
        $this->modele_thibault->insertNouveauRapport($idVis, $numRap, $idPra, $dateRap, $bilanRap, $motifRap);

        // echo $pra;
        // echo "<br/>";
        // echo $nom_pra;
        // echo "<br/>";
        // echo $prenomPra;
        // echo "<br/>";
        // echo $numRap;
        // echo "<br/>";
         echo $motifRap;
        // echo "<br/>";
        // echo $dateRap;
        // echo "<br/>";
        // echo $bilanRap;

            //corps
        $data['rapport'] = $this->modele_thibault->getLesVisites($idVis);
        $data['anne'] = $this->modele_thibault->getLesAnneDeRapport($idVis);
        $this->load->view('connecte/compte-rendu/v_tableau-Compte-Rendu', $data);

            //Bas
        $this->load->view('connecte/v_bas');
    }

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
        $this->load->view('connecte/compte-rendu/v_tableau-detail', $data);
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
    
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
    
}
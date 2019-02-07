<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_praticien extends CI_Controller{

/* --------------------------------------------------- */
//Index
/* --------------------------------------------------- */
    /**
    *Fonction index
    *Permet l'affichage de base du tableau
    */
/* --------------------------------------------------- */
    public function index($num){
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

            //Variable
        $data['nb'] = $this->modele_thibault->getNbPraticien();

            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/praticien/v_titre');
        $this->load->view('connecte/praticien/v_menu_praticien');
             
            //Bas
        $this->load->view('connecte/praticien/v_nb-page',$data);
        $this->load->view('connecte/v_bas');
    }
/* --------------------------------------------------- */


/* --------------------------------------------------- */
//Recheche
/* --------------------------------------------------- */
    /*
    *Fonction de recherche dynamique
    *Permet d'afficher le resultat de la recherche du
    *compte rendu de tableau
    */
/* --------------------------------------------------- */  
    function recherche(){
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
       
        //Bas
        $this->load->view('connecte/v_bas');
    }   
/* --------------------------------------------------- */


/* --------------------------------------------------- */
//Saisie d'un nouveau praticien
/* --------------------------------------------------- */
    /*
    *
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
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
/* --------------------------------------------------- */


/* --------------------------------------------------- */
//Validation du nouveau Praticien
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

            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
       
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
       
        //Bas
        $this->load->view('connecte/v_bas');
    }
/* --------------------------------------------------- */

}
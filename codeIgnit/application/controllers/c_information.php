<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_information extends CI_Controller{

    /**
     * function index()
     * --------------------------
     * Cette fonction permet d'appeler les vues dont j'ai besoin
     */
    public function index(){
        /* CHARGEMENT DES ELEMENTS BESOINS */
            //Helpers
            $this->load->helper('html');
            $this->load->helper('form');
            
            //Library
            $this->load->library('form_validation');

        /* AFFICHER DES VUES DE BASE */
            //Haut
            $this->load->view('connecte/v_haut');
            //Menu
            $this->load->view('connecte/v_menu');
            //Bas
            $this->load->view('connecte/v_bas');
    }


    /**
     * function afficherInfos($id)
     * -----------------------------------
     * $id = L'id de l'utilisateur connecté
     * 
     * Cette fonction permet d'afficher les informations du visiteur connecté
     */
    public function afficherInfos(){
        /* RECUPERATION DE L'ID */
        $this->load->library('session');
        $idVisArray = $this->session->idVis;
        foreach($idVisArray as $key){
            $idVis = $key->vis_matricule;
        }

        /* CHARGEMENT DES ELEMENTS BESOINS */
            //Helpers
            $this->load->helper('html');
            $this->load->helper('form');
            
            //Librarys
            $this->load->library('form_validation');
            //$this->load->library('session');

            //Model
            $this->load->model('modele_deniz');

        /* EXECUTION DE LA REQUETE DU MODELE */
        $data['information'] = $this->modele_deniz->getInfosVisiteur($idVis);
        //Test
        

        /* APPEL DES VUES */
            //Haut
            $this->load->view('connecte/v_haut');
            //Menu
            $this->load->view('connecte/v_menu');
            //Affichage Info
            $this->load->view('connecte/information/v_affichage_infos', $data);
            //Bas
            $this->load->view('connecte/v_bas');

    }








}





?>
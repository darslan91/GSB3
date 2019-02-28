<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_medicament extends CI_Controller{

//Liste des services à insérer dans la liste déroulante du menu de navigation


    /**
     * Fonction index()
     * --------------------
     * Cette fonction permet de cherger les helpers, le modèle, les vues
     */
    public function index(){
        //Helper
        $this->load->helper('html');

        //Model
        $this->load->model('modele_deniz');

        //Gestion tableau médicaments
        $data['medicament']= $this->modele_deniz->getLesMedicaments();
        if (empty($data)) {
	        $data[0]["med_depotlegal"] = "Aucun Numéro";
        }

        //VIEWS
        //Hauts
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        //Medicament
        $this->load->view('connecte/medicament/v_tableau_medocs', $data);
        //Footer
        $this->load->view('connecte/v_bas');
        //Recherche
//        $this->load->view('');
        
    

    }

    public function detail($id){
        /* HELPERS */
        $this->load->helper('html');
        $this->load->helper('form');
        /* MODELE */
        $this->load->model('modele_deniz');
    }



}












?>
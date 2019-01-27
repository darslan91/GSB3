<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_medicament extends CI_Controller{

//Liste des services à insérer dans la liste déroulante du menu de navigation
$tab = $pdo->getLesMedicament($secteur);
if (empty($tab)) {
	$tab[0]["med_depotlegal"] = "Aucun Numéro";
}

    /**
     * Fonction index()
     * --------------------
     * Cette fonction permet de cherger les helpers, le modèle, 
     */
    public function index(){
        //Helper
        $this->load->helper('html');

        //Model
        $this->load->model('modele_deniz');

        //Views
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/medicament/v_tableau_medocs');
        $this->load->view('connecte/v_bas');
//        $this->load->view('');
        
    }


}












?>
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
        //Recherche
        $this->load->view('connecte/medicament/v_recherche_medicament');
        //Footer
        $this->load->view('connecte/v_bas');
    

    }
    /**
     * Fonction detail($id)
     * ---------------------
     * @id = l'id du médicament
     * 
     * Cette fonction permet d'afficher dans une fenêtre le détail d'un medicament
     */
    public function detail($id){
        /* HELPERS */
        $this->load->helper('html');
        $this->load->helper('form');
        /* MODELE */
        $this->load->model('modele_deniz');

        /* EXECUTION DE LA REQUETE */
        $data['medicament'] = $this->modele_deniz->getDetailsMedicament($id);

        /* VIEW */
        $this->load->view('connecte/medicament/v_details_medicaments', $data);
    }


    /**
     * Fonction rechercheNom($str)
     * ---------------------------------
     * @str = chaîne de caractères qui contient ce que le visiteur à taper dans la recherche
     * 
     * Cette fonction permet d'afficher le résultat de la recherche d'une autre fenêtre
     */
    public function rechercheNom(){
        /* HELPERS */
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');

        /* MODELE */
        $this->load->model('modele_deniz');

        /* MISE  EN PLACE D'UNE REGLE */
        $this->form_validation->set_rules('nom', 'Nom recherché :', 'required');

        /* APPLICATION DE CETTE REGLE */
        if($this->form_validation->run() == TRUE){
            $str = $this->input->post('nom');
        }        

        /* EXECUTION DE LA REQUETE */ 
        $data['medicament'] = $this->modele_deniz->getSearchNom($str);

        /* VIEW */
        $this->load->views('connecte/medicament/v_result_research_name', $data);
    }

}

?>
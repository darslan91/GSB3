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
     * Fonction afficherPDF($id)
     * --------------------------------
     * $id = l'id du médicament
     * 
     * Cette foncrion permet d'afficher le PDF
     */
    public function afficherPDF($id){
        /* MODELE */
        $this->load->model('modele_deniz');

        /* RECUPERATION */
        $data['medicament'] = $id;

        /* EXECUTION D'UNE REQUETE POUR RECUP LES DETAILS MED */
        $data_det['medicament'] = $this->modele_deniz->getDetailsMedicament($id);
        
        /* VIEW */
        $this->load->view('connecte/pdf/pdf_detail_medicament', $data, $data_det);
    }


    /**
     * Fonction rechercheNom()
     * ---------------------------------
     * Cette fonction permet d'afficher le résultat de la recherche d'une autre fenêtre
     */
    public function rechercheNom(){
        /* DATABASE */
        $this->load->database();

        /* HELPERS */
        $this->load->helper('html');
        $this->load->helper('form');

        /* LIBRARY */
        $this->load->library('form_validation');

        /* MODELE */
        $this->load->model('modele_deniz');

        /* MISE  EN PLACE D'UNE REGLE */
        $this->form_validation->set_rules('nom', 'Erreur sur le nom', 'required');

        /* APPLICATION DE LA REGLE */
        if($this->form_validation->run() == TRUE){
            $nomSearch = $this->input->post('nom');

            //TESTTTTTT
            /*echo $data['medicament']['med_depotlegal'][0];
            echo $data['medicament']['med_nomcommercial'][0];
            echo $data['medicament']['med_nomcommercial'][1];*/

            //Gestion tableau médicaments
            $data['medicament']= $this->modele_deniz->getLesMedicaments();
                if (empty($data)) {
	                $data[0]["med_depotlegal"] = "Aucun Numéro";
                }

            // Appel de la méthode dans le modèle 
            $data_result['medicament'] = $this->modele_deniz->getSearchMedNom($nomSearch);
            //var_dump($data_result['medicament']);


            // Appel des vue pour afficher 
            $this->load->view('connecte/v_haut');
            $this->load->view('connecte/v_menu');
            $this->load->view('connecte/medicament/v_tableau_medocs', $data);
            $this->load->view('connecte/medicament/v_recherche_medicament'); 

            if(empty($data_result['medicament']['med_depotlegal']) && empty($data_result['medicament']['med_nomcommercial'])){
                //echo "if";
                //$this->load->view('connecte/medicament/v_result_research_name', $data_result);
                $this->load->view('connecte/medicament/v_result_vide', $data_result);
            }else{
                //echo "else";
                //$this->load->view('connecte/medicament/v_result_vide', $data_result);
                $this->load->view('connecte/medicament/v_result_research_name', $data_result);
            }

            $this->load->view('connecte/v_bas');
        }

    }

}

?>
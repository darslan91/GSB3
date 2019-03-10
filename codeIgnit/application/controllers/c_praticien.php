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
    public function index($num, $limit){
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
        if(isset($_POST['limite'])){
            $data['limit'] = $_POST['limite'];
        }
        else{
            $data['limit'] = $limit;
        }
        $data['num'] = $num;

        if($num == 1){
            foreach ($this->modele_thibault->getNbPraticien() as $key) {
                $data['btnHaut'] = $key->nb;
                $btnHaut = $key->nb;
                $data['btnBas'] = ($key->nb-$limit*$num)+1;
                $btnBas = ($key->nb-$limit*$num)+1;
            }
        }
        else{
           foreach ($this->modele_thibault->getNbPraticien() as $key) {
                if($num == 2){
                    $data['btnHaut'] = ($key->nb-$limit);
                    $btnHaut = ($key->nb-$limit);
                    $data['btnBas'] = ($key->nb-$limit*$num)+1;
                    $btnBas = ($key->nb-$limit*$num)+1;
                }
                else{
                    $data['btnHaut'] = ($key->nb-$limit*($num-1));
                    $btnHaut = ($key->nb-$limit*($num-1)); 
                    $data['btnBas'] = ($key->nb-$limit*$num)+1;
                    $btnBas = ($key->nb-$limit*$num)+1;
                }
            } 
        }

        $data['praticien'] = $this->modele_thibault->getPraticien($btnHaut, $btnBas);

        if(isset($_POST['nom']) && isset($_POST['cp'])){
            if($_POST['nom'] == "indef" && $_POST['cp'] == "indef"){
                $data['praticien'] = $this->modele_thibault->getPraticien($btnHaut, $btnBas);
            }
            if($_POST['nom'] == "indef" && $_POST['cp'] != "indef"){
                $data['praticien'] = $this->modele_thibault->getPraticienCp($btnHaut, $btnBas, $_POST['cp']);
            }
            if($_POST['nom'] != "indef" && $_POST['cp'] == "indef"){
                $data['praticien'] = $this->modele_thibault->getPraticienNom($btnHaut, $btnBas, $_POST['nom']);
            }
            if($_POST['nom'] != "indef" && $_POST['cp'] != "indef"){
                $data['praticien'] = $this->modele_thibault->getPraticienCpNom($btnHaut, $btnBas, $_POST['cp'], $_POST['nom']);
            }
        }        

            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/praticien/v_titre');
        $this->load->view('connecte/praticien/v_menu-praticien');

            //Corps
        $this->load->view('connecte/praticien/v_tableau-praticien',$data);
             
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
        $this->load->model('modele_deniz');

            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/praticien/v_titre');
        $this->load->view('connecte/praticien/v_menu-praticien');

            // Méthode afficher les spécialitées
        $data['spe']= $this->modele_deniz->getTypePraticien();

            //Formulaire
        $this->load->view('connecte/praticien/v_ajout_praticien_v2', $data);
        
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
            //Helpers
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('modele_deniz');
        
        /*    //R�cup�ration id
        $this->load->library('session');
        $idVisArray = $this->session->idVis;
        foreach ($idVisArray as $key){
            $idVis = $key->vis_matricule;
        }*/
        /*$erreur = false;
        $erreurCode = array("Erreur :");*/

        /* CREATION DES REGLES */
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('cp', 'CP', 'required');
        $this->form_validation->set_rules('ville', 'Ville', 'required');
        $this->form_validation->set_rules('speCode', 'Spécialité', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('notoriete', 'COEF_NOTORIETE', 'required');
        $this->form_validation->set_rules('remplCode', 'Remplacant', 'required');
        
        /* APPLICATIONS DES REGLES */
        if($this->form_validation->run() == TRUE){
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $adresse = $this->input->post('adresse');
            $cp = $this->input->post('cp');
            $ville = $this->input->post('ville');
            $notoriete = $this->input->post('notoriete');
            $speCode = $this->input->post('speCode');
            $remplCode = $this->input->post('remplCode');

            $this->modele_deniz->addNewPrat($nom, $prenom, $adresse, $cp, $ville, $notoriete, $speCode, $remplCode);

            echo "Ajout Réussi !!";

        }else{
            echo "Erreur, un des champs est mal remplis";
        }

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
        
        $data['praticien'] = $this->modele_thibault->getPraticienDetail($id); 

            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/praticien/v_titre');
        $this->load->view('connecte/praticien/v_menu-praticien');
        
            //Corps
        $this->load->view('connecte/praticien/v_tableau-praticien-detail', $data);

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
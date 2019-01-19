<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_accueil extends CI_Controller{


	public function index(){
		/* CHARGEMENT */
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('form_validation');

		/* AFFICHAGE */
			//Haut
		$this->load->view('non_connecte/v_haut');
			//Contents
		$this->load->view('non_connecte/v_formulaire-connexion');
			//Bas
		$this->load->view('non_connecte/v_bas');


	}
    
	   //Fonction de connexion
	function connexion(){
		/* CHARGMENT */
		$this->load->model('modele_connexion');
		$this->load->library('form_validation');

		/* REGLES  FORMULAIRE */
		$this->form_validation->set_rules('login','Login', 'required');
		$this->form_validation->set_rules('mdp','Mot de passe', 'required');

		if($this->form_validation->run() == TRUE){
		    if(isset($login, $mdp)){
		        if($login == null || $mdp == null){
		          $this->deconnexion();
		        }
		    }
			$login = $this->input->post('login');
			$mdp = $this->input->post('mdp');
			$data['query'] = $this->modele_connexion->userExist($login, $mdp);
			$nb = count($data['query']);
			if($nb != 0){
			     $this->load->library('session');
			     $_SESSION['connecte']=true;
			     $_SESSION['idVis'] = $this->modele_connexion->getUserId($login, $mdp);
			     $this->connecter();
		    }
		    else{
		        $this->deconnexion();
		    }
		}
		else{
			$this->deconnexion();
		}
	}
    
	   //Fonction de déconnexion
	function deconnexion(){
		if(isset($_SESSION)){
			foreach ($_SESSION as $key => $value) {
				$_SESSION[$key] = null;
			}
			session_destroy();
		}
		$this->index();
	}
    
	   //Fonction connecté
	function connecter(){
	    $this->load->view('connecte/v_haut');
	    $this->load->view('connecte/v_menu');
	    $this->load->view('connecte/v_bas');
	}

}

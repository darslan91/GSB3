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
			//Menu
//		$this->load->view('non_connecte/v_menu');
			//Contents
		$this->load->view('non_connecte/v_formulaire-connexion');
			//Bas
		$this->load->view('non_connecte/v_bas');


	}

	function connexion(){
		/* CHARGMENT */
	//	$this->load->model('modele_connexion');
		$this->load->library('form_validation');

		/* REGLES  FORMULAIRE */
		$this->form_validation->set_rules('login','Login', 'required');
		$this->form_validation->set_rules('mdp','Mot de passe', 'required');

		if($this->form_validation->run() == TRUE){
			session_start();
			$login = $this->input->post('login');
			$mdp = $this->input->post('mdp');
			echo $login." ".$mdp;
		}
		else{
			$this->deconnexion();
		}
	}

	function deconnexion(){
		if(isset($_SESSION)){
			foreach ($_SESSION as $key => $value) {
				$_SESSION[$key] = null;
			}
			session_destroy();
		}
		$this->index();
	}


}

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

			$data['exist'] = $this->modele_connexion->userExist($login);
			$nb2 = count($data['exist']);

			if($nb2 != 0){
				$change = $this->modele_connexion->userChange($login);
				foreach ($change as $key) {
					$change = $key->mdpChange;
				}
				if($change == 0){
					if(strlen($mdp) != 10){
						$this->deconnexion();
					}
					else{
						$data['prem'] = $this->modele_connexion->userConPremiereFois($login, $mdp);
						$nb = count($data['prem']);
						if($nb != 0){
						     $this->load->library('session');
						     $_SESSION['connecte']=true;
						     $_SESSION['idVis'] = $this->modele_connexion->getUserId($login, $mdp);
						     $this->connecterPremiere();
					    }
					    else{
					        $this->deconnexion();
					    }
					}
				}
				else{
					$data['con'] = $this->modele_connexion->userConNormal($login, $mdp);
					$nb = count($data['con']);
					if($nb != 0){
					     $this->load->library('session');
					     $_SESSION['connecte']=true;
					     $_SESSION['idVis'] = $this->modele_connexion->getUserId($login);
					     $this->connecter();
				    }
				    else{
				        $this->deconnexion();
				    }
				}
			}
		}
		else{
			$this->deconnexion();
		}
	}
    
	   //Fonction de déconnexion
	function deconnexion(){
		if(isset($this->session)){
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

	function connecterPremiere(){
		$this->load->view('connecte/v_haut');
	    $this->load->view('connecte/v_changementMdp');
	    $this->load->view('connecte/v_bas');
	}

	function changeMdp(){

		$this->load->library('session');
        $idVisArray = $this->session->idVis;
        foreach ($idVisArray as $key){
            $idVis = $key->vis_matricule;
        }

		/* CHARGMENT */
		$this->load->model('modele_connexion');
		$this->load->library('form_validation');

		/* REGLES  FORMULAIRE */
		$this->form_validation->set_rules('mdp1','Mot de passe', 'required');
		$this->form_validation->set_rules('mdp2','Mot de passe', 'required');

		$mdp1 = $this->input->post('mdp1');
		$mdp2 = $this->input->post('mdp2');

		/* Test Regex */
		if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $mdp1)) {
			if($mdp1 != $mdp2){
				$data['mdp'] = "Mots de passe different";
				$this->load->view('connecte/v_haut');
		    	$this->load->view('connecte/v_changementMdp', $data);
		    	$this->load->view('connecte/v_bas');
			}
			else{
				$this->modele_connexion->changeMdp($mdp1, $idVis);
				$this->connecter();
			}
		}
		else{
			$data['mdp'] = "Le mdp doit contenir 1 minuscule, 1 majuscule, 1 chiffre, 1 caractere special";
			$this->load->view('connecte/v_haut');
		    $this->load->view('connecte/v_changementMdp', $data);
		    $this->load->view('connecte/v_bas');
		}
	}

}

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
		$this->load->view('non_connecte/v_menu');
			//Contents
		$this->load->view('non_connecte/v_formulaire-connexion');
			//Bas
		$this->load->view('non_connecte/v_bas');


	}



}

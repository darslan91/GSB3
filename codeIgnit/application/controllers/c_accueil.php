<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_accueil extends CI_Controller{
	
	
	public function index(){

		$this->load->helper('html');
		
		/* CHARGEMENT */
			//Haut
		$this->load->view('non_connecte/v_haut');
			//Menu
		$this->load->view('non_connecte/v_menu');
			//Contents
		
			//Bas
		$this->load->view('non_connecte/v_bas');
		
		
	}
	
	
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_medicament extends CI_Controller{

    /**
     * Fonction index()
     * --------------------
     * Cette fonction permet de cherger les helpers, le modèle, 
     */
    public function index(){
        //Helper
        $this->load->helper('html');

        //Model
        $this->load->model('modele_thibault');

        //Views
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        $this->load->view('connecte/medicament/v_tableau_medocs');
        $this->load->view('connecte/v_bas');
//        $this->load->view('');
        
    }


}












?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_connecte extends CI_Controller{
    
    public function index(){

        $this->load->helper('url');
        $this->load->library('session');
        if(!isset($this->session->connecte)){
            if($this->session->connecte != true){
                redirect('c_accueil/deconnexion');
            }
        }
        

        /* CHARGEMENT */
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        
            //Coprs
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
    
        //Affichage d'un tableau
    public function tableau(){

        /*Bien connecté*/
        $this->load->helper('url');
        $this->load->library('session');
        if(!isset($this->session->connecte)){
            if($this->session->connecte != true){
                redirect('c_accueil/deconnexion');
            }
        }

        /* CHARGEMENT */
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        
            //Coprs
        $this->load->view('connecte/tableau');
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
    
}
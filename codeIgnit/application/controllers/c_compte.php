<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_compte extends CI_Controller{
    
    public function index(){
        /* CHARGEMENT */
            //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        
            //Coprs
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_tableau-Compte-Rendu');
        $this->load->view('connecte/compte-rendu/v_nouveau');
            //Bas
            
        $this->load->view('connecte/v_bas');
    }
    
    function recherche(){
        /*CHARGEMENT*/
        $this->load->library('form_validation');
        
            //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        
            //Coprs
        $this->load->view('connecte/compte-rendu/v_titre');
            
        var_dump($this->input->post('personne'));
        var_dump($this->input->post('anne'));
            
            //méthode d'affichage avec toutes les personnes dans le tableau - Sinon on affiche juste la personne selectionné
        if($this->input->post('personne') == 'Tous'){
           $this->load->view('connecte/compte-rendu/v_tableau-Compte-Rendu');
        }
        else{
           $this->load->view('connecte/tableau');
        }
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
    
    function detail(){
        /* CHARGEMENT */
        $this->load->library('form_validation');
        
            //Helper
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
            //Haut + menu
        $this->load->view('connecte/v_haut');
        $this->load->view('connecte/v_menu');
        
            //Corps
        $this->load->view('connecte/compte-rendu/v_titre');
        $this->load->view('connecte/compte-rendu/v_tableau-detail');
        
            //Bas
        $this->load->view('connecte/v_bas');
    }
    
    function nouveau(){
        
    }
    
}
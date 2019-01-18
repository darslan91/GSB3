<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_connecte extends CI_Controller{
    
    public function index(){
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
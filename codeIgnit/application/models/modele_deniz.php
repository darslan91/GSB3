<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class modele_deniz extends CI_Model{

    public function __construct(){
        $this->load->database();
    }
    /**
     * getLesMedicaments()
     * -------------------------------
     * Cette fonction permet de récuperer tout les médicaments contenue dans la tables médicament
     */
    public function getLesMedicaments(){
        $req="SELECT * FROM medicament";
        $query=$this->db->query($req)->result();
        
        return $query;
    }





}










?>
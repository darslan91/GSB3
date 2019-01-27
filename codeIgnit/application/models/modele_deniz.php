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
        $req="SELECT med_depotlegal,med_nomcommercial,fam_code,med_composition,med_effets,med_contreindic,med_prixechantillon AS prix FROM medicament ORDER BY med_depotlegal LIMIT 5";
        $query=$this->db->query($req)->result();
        
        return $query;
    }





}

?>
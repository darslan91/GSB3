<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modele_thibault extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }
    
    public function getLesVisites(){
        $req = "SELECT rap_num, rap_date, rap_motif, pra_nom FROM rapport_visite, praticien WHERE rapport_visite.pra_num = praticien.pra_num AND vis_matricule = 'a131'";
        $query = $this->db->query($req)->result();
        return $query;
    }
    
}

?>
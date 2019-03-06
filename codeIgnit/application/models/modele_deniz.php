<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class modele_deniz extends CI_Model{

    public function __construct(){
        $this->load->database();
    }
    
    
    /**
     * getLesMedicaments()
     * -------------------------------
     * Cette fonction permet de récuperer tout les médicaments contenue dans la table médicament
     */
    public function getLesMedicaments(){
        $req="SELECT med_depotlegal,med_nomcommercial,fam_code,med_composition,med_effets,med_contreindic,med_prixechantillon AS prix FROM medicament ORDER BY med_depotlegal";
        $query=$this->db->query($req)->result();
        // CETTE PERMET DE RECUPERER TOUT LES ELEMENTS DE CETTE TABLE " MEDICAMENT "
        //$queryTest = $this->db->get('medicament');

        return $query;
    }


    /**
     * getDetailsMedicament($id)
     * -------------------------------
     * Cette fonction permet de retourner les détails  du médicament grâce à l'id du médicament
     * 
     */
    public function getDetailsMedicament($id){
        //La rêquete
        $req="SELECT med_nomcommercial,fam_code,med_composition,med_effets,med_contreindic,med_prixechantillon AS prix FROM medicament WHERE med_depotlegal = '$id'";
        //Faire passer et executer la requête
        $result = $this->db->query($req, $id);
        
        return $result;
    }


}

?>
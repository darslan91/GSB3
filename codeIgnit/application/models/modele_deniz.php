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
        $req="SELECT med_depotlegal,med_nomcommercial,M.fam_code,med_composition,med_effets,med_contreindic,med_prixechantillon AS prix FROM medicament M, famille F WHERE F.fam_code = M.fam_code ORDER BY med_depotlegal";
        $query=$this->db->query($req)->result();
        // CETTE PERMET DE RECUPERER TOUT LES ELEMENTS DE CETTE TABLE " MEDICAMENT "
        //$queryTest = $this->db->get('medicament');

        return $query;
    }


    /**
     * getDetailsMedicament($id)
     * -------------------------------
     * Cette fonction permet de retourner les détails  du médicament grâce à l'id du médicament
     */
    public function getDetailsMedicament($id){
        //La rêquete
        $req="SELECT med_depotlegal,med_nomcommercial,M.fam_code,med_composition,med_effets,med_contreindic,med_prixechantillon AS prix, fam_libelle FROM medicament M, famille F WHERE F.fam_code = M.fam_code AND med_depotlegal = '$id'";
        //Faire passer et executer la requête
        $result = $this->db->query($req)->result();
        
        return $result;
    }


    /**
     * getSearchMedNom($str)
     * --------------------------
     * Cette fonction permet de trouver le nom des médicament qui pourrait coller à la chaîne de caractères passer en paramètre.
     */
    public function getSearchMedNom($str){
        $req="SELECT med_depotlegal, med_nomcommercial FROM medicament WHERE med_nomcommercial LIKE('.$str.%')";
        $result = $this->db->query($req)->result();

        return $result;
    }


    /**
     * getTypePraticien()
     * -------------------------
     * Cette fonction permet de récupérer le type des praticiens (code, libelle)
     */
    public function getTypePraticien(){
        $req="SELECT typ_code, typ_libelle FROM engine_praticien;";
        $result=$this->db->query($req)->result();

        return $result;
    }
    

    /**
     * addNewPrat()
     * ---------------------------
     * Cette fonction permet d'ajouté un nouveau praticien dans la base de donnée
     */
    public function addNewPrat(){
        $req="";
        $result=$this->db->query($req)->result();

        return $result;
    }



}

?>
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


    public function getDetailsMedicamentPDF($id){
        //La rêquete
        $req="SELECT med_depotlegal,med_nomcommercial,M.fam_code AS fam_code,fam_libelle,med_composition,med_effets,med_contreindic,med_prixechantillon AS prix FROM medicament M, famille F WHERE F.fam_code = M.fam_code AND med_depotlegal = '$id'";
        //Faire passer et executer la requête
        $result = $this->db->query($req)->result();

        $tab = array();

        foreach ($result as $row) {

          $tab['med_depotlegal'] = $row->med_depotlegal;
          $tab['med_nomcommercial'] = $row->med_nomcommercial;
          $tab['fam_code'] = $row->fam_code;
          $tab['fam_libelle'] = $row->fam_libelle;
          $tab['med_composition'] = $row->med_composition;
          $tab['med_effets'] = $row->med_effets;
          $tab['med_contreindic'] = $row->med_contreindic;
        }



        return $tab;
    }














    /**
     * getSearchMedNom($str)
     * --------------------------
     * Cette fonction permet de trouver le nom des médicament qui pourrait coller à la chaîne de caractères passer en paramètre.
     */
    public function getSearchMedNom($str){
        $req="SELECT med_depotlegal, med_nomcommercial FROM medicament WHERE med_nomcommercial LIKE('$str%')";
        $query = $this->db->query($req);


            $med_depotlegal = array();
            $med_nomcommercial= array();

            foreach ($query->result() as $row) {
                $med_depotlegal[] = $row->med_depotlegal;
                $med_nomcommercial[] = $row->med_nomcommercial;

            }

            $liste = array('med_depotlegal' => $med_depotlegal, 'med_nomcommercial' => $med_nomcommercial);


        return $liste ;
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
    public function addNewPrat($nom, $prenom, $adresse, $cp, $ville, $coef, $spe, $rplc){
        /*$req="INSERT INTO praticien (pra_nom, pra_prenom, pra_adresse, pra_cp, pra_ville, typ_code, pra_coefnotoriete, rplc) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";*/
        $this->load->database();

        $data  = array(
            'pra_nom' => $nom,
            'pra_prenom' => $prenom,
            'pra_adresse' => $adresse,
            'pra_cp' => $cp,
            'pra_ville' => $ville,
            'pra_coefnotoriete' => $coef,
            'typ_code' => $spe,
            'rplc' => $rplc
        );

        $this->db->insert('praticien', $data);
    }



}

?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modele_thibault extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }
    
    public function getLesVisites($idVis){
        $req = "SELECT DISTINCT rap_num, rap_date, rap_motif, pra_nom FROM rapport_visite, praticien ".
               "WHERE rapport_visite.pra_num = praticien.pra_num ".
               "AND vis_matricule = '$idVis' ".
               "ORDER BY rap_num DESC";
        $query = $this->db->query($req)->result();
        return $query;
    }

    public function getLesAnneDeRapport($idVis){
        $req = "SELECT DISTINCT(rap_date) ".
               "FROM rapport_visite ".
               "WHERE vis_matricule = '$idVis'";
        $query = $this->db->query($req)->result();
        return $query;
    }

    public function getLesVisitesL($idVis, $limit){
        $req = "SELECT DISTINCT rap_num, rap_date, rap_motif, pra_nom FROM rapport_visite, praticien ".
               "WHERE rapport_visite.pra_num = praticien.pra_num ".
               "AND vis_matricule = '$idVis' ".
               "ORDER BY rap_num DESC ".
               "limit ".$limit;
        $query = $this->db->query($req)->result();
        return $query;
    }
    
    public function getLaVisite($id, $idVis){
        $req = "SELECT rap_num, rap_date, rap_motif, pra_nom, pra_prenom, pra_adresse, pra_cp, pra_ville, pra_coefnotoriete, typ_libelle ".
               "FROM rapport_visite,  praticien, engine_praticien ".
               "WHERE rapport_visite.pra_num = praticien.pra_num ".
               "AND praticien.typ_code = engine_praticien.typ_code ".
               "AND vis_matricule = '$idVis' ".
               "AND rap_num = ".$id." ".
               "ORDER BY rap_num DESC ";
        $query = $this->db->query($req)->result();
        return $query;
    }
    
    public function getLesVisitesAnne($idVis, $anne){
        $req = "SELECT DISTINCT rap_num, rap_date, rap_motif, pra_nom ".
               "FROM rapport_visite, praticien ".
               "WHERE rapport_visite.pra_num = praticien.pra_num ".
               "AND vis_matricule = '$idVis' ".
               "AND rap_date LIKE '$anne%' ".
               "ORDER BY rap_num DESC ";
        $query = $this->db->query($req)->result();
        return $query;
    }

    public function getLesVisitesNom($idVis, $nom){
      $req = "SELECT DISTINCT rap_num, rap_date, rap_motif, pra_nom FROM rapport_visite, praticien ".
               "WHERE rapport_visite.pra_num = praticien.pra_num ".
               "AND vis_matricule = '$idVis' ".
               "AND pra_nom = '$nom' ".
               "ORDER BY rap_num DESC ";
        $query = $this->db->query($req)->result();
        return $query;
    }

    public function getLesVisitesAnneNom($idVis, $nom, $anne){
      $req = "SELECT DISTINCT rap_num, rap_date, rap_motif, pra_nom FROM rapport_visite, praticien ".
               "WHERE rapport_visite.pra_num = praticien.pra_num ".
               "AND vis_matricule = '$idVis' ".
               "AND pra_nom LIKE '$nom%' ".
               "AND rap_date LIKE '$anne%' ".
               "ORDER BY rap_num DESC ";
        $query = $this->db->query($req)->result();
        return $query;
    }
    
    public function getPrenom($id){
        $req = "SELECT vis_nom FROM praticien ".
            "WHERE vis_matricule = '$idVis'";
        $query = $this->db->query($req)->result();
        return $query;
    }

    public function getLesPraticiens(){
      $req = "SELECT pra_nom, pra_prenom ".
             "FROM praticien ".
             "ORDER BY pra_nom";
      $query = $this->db->query($req)->result();
        return $query;
    }

    public function getLeNumRapport(){
      $req = "SELECT MAX(rap_num) as max ".
             "FROM rapport_visite";
      $query = $this->db->query($req)->result();
      return $query;
    }

    public function getIdPra($nom, $prenom){
      $req = "SELECT pra_num ".
             "FROM praticien ".
             "WHERE pra_nom = '$nom' ".
             "AND pra_prenom = '$prenom'";  
      $query = $this->db->query($req)->result();
      return $query;
    }

    public function insertNouveauRapport($vis_matricule, $rap_num, $pra_num, $rap_date, $rap_bilan, $rap_motif){
      $req = "INSERT INTO rapport_visite(VIS_MATRICULE, RAP_NUM, PRA_NUM, RAP_DATE, RAP_BILAN, RAP_MOTIF) VALUES('$vis_matricule', '$rap_num', '$pra_num','$rap_date', '$rap_bilan', '$rap_motif')";
      var_dump($req);
      $this->db->query($req);
    }

}

?>
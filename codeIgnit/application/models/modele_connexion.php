<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modele_connexion extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }
    
    public function getUserId($login){
        $req = "SELECT vis_matricule ".
               "FROM visiteur ". 
               "WHERE vis_nom = '$login'";
        $query = $this->db->query($req)->result();
        return $query;
    }
    
    public function userExist($login){
        $req = "SELECT vis_matricule ".
               "FROM visiteur ".
               "WHERE vis_nom = '$login' ";
        $query = $this->db->query($req)->result();
        return $query;
    }

    public function userChange($login){
        $req = "SELECT mdpChange ".
               "FROM visiteur ".
               "WHERE vis_nom = '$login' ";
        $query = $this->db->query($req)->result();
        return $query;
    }

    public function userConPremiereFois($login, $mdp){
        $req = "SELECT vis_matricule ".
               "FROM visiteur ".
               "WHERE vis_nom = '$login' ".
               "AND vis_dateembauche LIKE '$mdp%' ";
        $query = $this->db->query($req)->result();
        return $query;
    }

    public function userConNormal($login, $mdp){
        $req = "SELECT vis_matricule ".
               "FROM visiteur ".
               "WHERE vis_nom = '$login' ".
               "AND vis_code = '$mdp' ";
        $query = $this->db->query($req)->result();
        return $query;
    }

    public function changeMdp($mdp, $idVis){
        $req = "UPDATE visiteur ".
               "SET vis_code = '$mdp' ".
               "WHERE vis_matricule = '$idVis'";
        $this->db->query($req);

        $req2 = "UPDATE visiteur ".
                "SET mdpChange = 1 ".
                "WHERE vis_matricule = '$idVis'";
        $this->db->query($req2);
    }

}

?>

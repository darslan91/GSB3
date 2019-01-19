<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modele_connexion extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }
    
    public function getUserId($login, $mdp){
        $req = "SELECT vis_matricule ".
               "FROM visiteur ". 
               "WHERE vis_nom = '$login' ".
               "AND vis_code = '$mdp' ";
        $query = $this->db->query($req)->result();
        return $query;
    }
    
    public function userExist($login, $mdp){
        $req = "SELECT vis_matricule ".
               "FROM visiteur ".
               "WHERE vis_nom = '$login' ".
               "AND vis_code = '$mdp' ";
        $query = $this->db->query($req)->result();
        return $query;
    }
    
    

}

?>

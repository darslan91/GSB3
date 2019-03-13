<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Htmltopdf_model extends CI_Model{

 public function fetch_single_details($id, $idVis){

    $req = "SELECT rap_num, rap_date, pra_prenom, rap_motif, pra_nom, pra_prenom, pra_adresse, pra_cp, pra_ville, pra_coefnotoriete, typ_libelle, num_rplc ".
               "FROM rapport_visite,  praticien, engine_praticien ".
               "WHERE rapport_visite.pra_num = praticien.pra_num ".
               "AND praticien.typ_code = engine_praticien.typ_code ".
               "AND vis_matricule = '$idVis' ".
               "AND rap_num = ".$id." ".
               "ORDER BY rap_num DESC ";
    $query = $this->db->query($req)->result();

    $output = '<h3>Detail</h3>
                <div style="overflow-x:auto;" class="compte-rendu">
                  <table class="table">
                      <tr class="table">
                          <th>Date</th>
                          <th>Motif</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Adresse</th>
                          <th>Notoriete Praticien</th>
                          <th>Type Praticien</th>
                      </tr>';
                      
                  foreach ($query as $key){

                    $output .='    
                      <tr>
                        <td><?php echo substr($key->rap_date, 0, 10)?></td>
                        <td><?php echo $key->rap_motif?></td>
                        <td><?php echo $key->pra_nom?></td>
                        <td><?php echo $key->pra_prenom?></td>
                        <td><?php echo $key->pra_adresse." ".$key->pra_cp." ".$key->pra_ville?></td>
                        <td><?php echo $key->pra_coefnotoriete?></td>
                        <td><?php echo $key->typ_libelle?></td>
                      </tr>';
                      }
                  $output .='    
                  </table>
              </div>
            ';
    return $output;

 }
}

?>
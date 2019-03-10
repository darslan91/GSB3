<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('fpdf.php');

class PDF extends FPDF{
    //En tête
    function Header(){
        //Logo
        $this->Image('logo.jpg',10,6,30);
        //Police
        $this->SetFont('Arial','B',15);
        //Décalage à droite			
        $this->Cell(80);
		// Titre
		$this->Cell(30,10,'Fiche Détail du Médicament',0,0,'C');
		// Saut de ligne
		$this->Ln(20);

    }

    //Footer
    function Footer(){
        // Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		// Police Arial italique 8
		$this->SetFont('Arial','I',8);
		// Numéro de page
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

//Instanciation de la classe derivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


//Titre
$pdf->Cell(10,10,'Détail du médicament',0,0);
$pdf->Ln(10);


/* TABLEAUX DU MEDICAMENT */
$pdf->Cell(10,10,'Dépôt Légal',0,0);
$pdf->Cell(10,10,'Nom Commercial',0,0);
$pdf->Cell(10,10,'Code Famille Medicament',0,0);
$pdf->Cell(10,10,'Libelle Famille',0,0);
$pdf->Cell(10,10,'Composition du Médicament',0,0);
$pdf->Cell(10,10,'Effet du Médicament',0,0);
$pdf->Cell(10,10,'Contre-indications du Médicaments',0,0);


$pdf->Output('I', 'detail_medicament', $isUTF8 = true);
?>
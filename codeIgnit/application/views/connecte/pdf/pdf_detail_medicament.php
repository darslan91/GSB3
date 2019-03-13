<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('fpdf.php');

class PDF extends FPDF{
    //En tête
    function Header(){
        //Logo
        //$this->Image('logo.jpg', 10, 6, 30);
        //Police
        $this->SetFont('Arial','B',15);
        //Décalage à droite
        $this->Cell(80);
		// Titre
		$this->Cell(30,10,'Fiche Detail du Medicament',0,0,'C');
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
$pdf->SetFont('Arial','B',13);
$pdf->Cell(10,10,'Detail du medicament',0,0);
$pdf->Ln(15);


/* TABLEAUX DU MEDICAMENT */
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,10,'Le medicament',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Ln(10);
//Le med
$pdf->Cell(35,10,'Depot Legal',1,0,'C');
$pdf->Cell(35,10,'Nom Commercial',1,0,'C');
$pdf->Ln();
$pdf->Cell(35,10,utf8_decode($medicament['med_depotlegal']),1,0,'C');
$pdf->Cell(35,10,utf8_decode($medicament['med_nomcommercial']),1,0, 'C');
$pdf->Ln(15);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,10,'Sa famille',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Ln(10);

//Sa famille
$pdf->Cell(35,10,'Code Famille',1,0,'C');
$pdf->Cell(60,10,'Libelle Famille',1,0,'C');
$pdf->Ln();
$pdf->Cell(35,10,utf8_decode($medicament['fam_code']),1,0,'C');
$pdf->Cell(60,10,utf8_decode($medicament['fam_libelle']),1,0,'C');
$pdf->Ln(15);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,10,'Detail composition',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Ln(10);
//Detail composition
$pdf->Cell(35,10,'Composition : ',0,0);
$pdf->Cell(80,10,utf8_decode($medicament['med_composition']),0,0,'C');
$pdf->Ln();

$pdf->Cell(35,10,'Effet : ',0,0);
$pdf->Cell(150,10,utf8_decode($medicament['med_effets']),0,0,'C');
$pdf->Ln();
$pdf->Cell(50,10,"",0,0);

$pdf->Ln();
$pdf->Cell(37,10,'Contre-indications :',0,0);
$pdf->Ln();
$pdf->Cell(60,10,"",0,0);
$pdf->Cell(80,10,utf8_decode($medicament['med_contreindic']),0,0,'C');

//Ouverture du pdf normalement
$pdf->Output();
?>

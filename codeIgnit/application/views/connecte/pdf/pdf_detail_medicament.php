<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('fpdf.php');

class PDF extends FPDF{
    //En tête
    function Header(){
        //Logo
        //$this->Image('logo.jpg',null, null, 6,30,'JPG');
        //Police
        $this->SetFont('Arial','B',15);
        //Décalage à droite
        $this->Cell(80);
		// Titre
		$this->Cell(30,10,utf8_decode('Fiche Détail du Médicament'),0,0,'C');
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
$pdf->Cell(10,10,utf8_decode('Détail du médicament'),0,0);
$pdf->Ln(15);


/* TABLEAUX DU MEDICAMENT */
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,10,utf8_decode('Le médicament'),0,0);
$pdf->SetFont('Arial','',12);
$pdf->Ln(10);
//Le med
$pdf->Cell(35,10,utf8_decode('Dépôt Légal'),1,0,'C');
$pdf->Cell(50,10,'Nom Commercial',1,0,'C');
$pdf->Ln();
$pdf->Cell(35,10,utf8_decode($medicament['med_depotlegal']),1,0,'C');
$pdf->Cell(50,10,utf8_decode($medicament['med_nomcommercial']),1,0, 'C');
$pdf->Ln(15);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,10,'Sa famille',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Ln(10);

//Sa famille
$pdf->Cell(35,10,'Code Famille',1,0,'C');
$pdf->Cell(120,10,utf8_decode('Libellé Famille'),1,0,'C');
$pdf->Ln();
$pdf->Cell(35,10,utf8_decode($medicament['fam_code']),1,0,'C');
$pdf->Cell(120,10,utf8_decode($medicament['fam_libelle']),1,0,'C');
$pdf->Ln(15);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,10,utf8_decode('Détails compositions'),0,0);
$pdf->SetFont('Arial','',12);
$pdf->Ln(10);

//Detail composition
$pdf->SetFont('Arial','U',12);
$pdf->Cell(35,10,'Composition : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,10,utf8_decode($medicament['med_composition']),0,0,'C');

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','U',12);
$pdf->Cell(35,10,'Effets : ',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Ln();
$pdf->MultiCell(150, 10, utf8_decode($medicament['med_effets']),0,'J');

$pdf->Ln();
$pdf->SetFont('Arial','U',12);
$pdf->Cell(37,10,'Contre-indications :',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Ln();
$pdf->MultiCell(150, 10, utf8_decode($medicament['med_contreindic']),0,'J');

//Ouverture du pdf normalement
$pdf->Output();
?>

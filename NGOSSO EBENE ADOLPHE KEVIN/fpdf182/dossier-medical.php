<?php
require('fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('../views/assets/img/logo.png',90,30,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(70);
    // Titre
    $this->SetFont('Arial' ,'', 12);
    $this->text(10,20,'REPUBLIQUE DU CAMEROUN',1,0,'C');
    $this->text(150,20,'REPUBLIC OF CAMEROON',1,0,'C');

    $this->SetFont('Arial' ,'I', 9);
    $this->text(20,25,'Paix-Travail-Patrie',1,0,'C');
    $this->text(160,25,'Peace-Work-Fatherland',1,0,'C');
    $this->SetFont('Arial' ,'B', 10);

    $this->text(10,30,'MINISTERE DE LA SANTE PUBLIC ',1,0,'C');
    $this->text(150,30,'MINISTRY OF PUBLIC HEALTH ',1,0,'C');


    $this->text(93,65,'KEVHEALTH',1,0,'C');
   /* $this->Cell(50,10,'Dossier Medical',1,0,'C',0);
    $this->Cell(50,10,'Dossier Medical',1,0,'C',0);
    $this->Cell(50,10,'Dossier Medical',1,0,'C',0);
    $this->Cell(50,10,'Dossier Medical',1,'C',0);
    $this->Cell(50,10,'Dossier Medical',1,'C',0);
*/
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
   // $pdf->Cell(0,10,'Impression de la ligne numéro '.$i,0,1);
$pdf->Output();
?>
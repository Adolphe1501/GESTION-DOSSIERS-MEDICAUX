<?php

class DS extends FPDF
{

    function footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }


    /// function

    function parametre($db, $id)
    {
        $request = get_dateAdd_in_pHospitalisation($db, $id);
        while ($result = mysqli_fetch_assoc($request)) {

            $this->SetFont('Helvetica', 'B', 16);
            $this->Cell(182, 10, " " . date_format(date_create($result["dateAdd"]), "d M Y"), "B", 1, "C");

            $this->SetFont('Helvetica', 'B', 12);
            $this->Cell(36, 10, "Heure", 1, 0, "C");
            $this->Cell(31, 10, "Temp", 1, 0, "C");
            $this->Cell(31, 10, utf8_decode("Diurèse"), 1, 0, "C");
            $this->Cell(28, 10, "F.R", 1, 0, "C");
            $this->Cell(28, 10, "F_C", 1, 0, "C");
            $this->Cell(28, 10, "TA", 1, 1, "C");

            //$this->Cell(44, 10, "Traitement", 1, 0, "C");
            //$this->Cell(45, 10, "Observation", 1, 1, "C");

            $request1 = get_phospitalisation_by_data_an_patientId($db, $result["dateAdd"], $id);
            while ($result1 = mysqli_fetch_assoc($request1)) {

                $this->SetFont('Helvetica', '', 11);
                $this->Cell(36, 10, "" . $result1["timeadd"], 1, 0, "C");
                $this->Cell(31, 10, "" . $result1["temperature"], 1, 0, "C");
                $this->Cell(31, 10, utf8_decode("" . $result1["diurese"]), 1, 0, "C");
                $this->Cell(28, 10, "" . $result1["F_R"], 1, 0, "C");
                $this->Cell(28, 10, "" . $result1["F_C"], 1, 0, "C");
                $this->Cell(28, 10, utf8_decode("" . $result1["TA"]), 1, 1, "C");
                $this->MultiCell(182, 7, utf8_decode("Traitement:   " . $result1["traitement"]), 1, "L");
                $this->MultiCell(182, 7, utf8_decode("Observation:   " . $result1["pHObservation"]), 1, "L");
            }
            $request2 = get_conduite_for_pHospitalisation($db, $id, $result["dateAdd"]);
            $result2 = mysqli_fetch_assoc($request2);
            if (!empty($result2)) {
                $this->SetFont('Helvetica', '', 13);
                $this->MultiCell(182, 7, utf8_decode("Conduite à tenir  : Dr.  " . get_userName_by_id($db, $result2["addBy"])["userName"] . " " . $result2['contenu']), 1, "L");
            }
            $this->Ln(15);
        }
    }
    /// function
}

function d_s($out, $db, $id)
{

    $pdf = new DS('L', 'mm', array(200, 180));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetFont('Helvetica', '', 11);
    $pdf->SetTextColor(14, 44, 52);
    $pdf->Text(10, 15, utf8_decode("MINISTERE DE LA SANTE PUBLIQUE"));
    $pdf->Text(10, 22, utf8_decode("DELEGATION REGIONNALE DU CENTRE"));
    $pdf->Text(10, 29, utf8_decode("DISTRICT DE SANTE DE YAOUNDE 4"));
    $pdf->Text(118, 15, "REPUBLIQUE DU CAMEROUN");
    $pdf->Text(127, 22, "paix * travail * patrie");
    $pdf->Ln(37);


    $pdf->Cell(170, 0, "", 1, 1, '', 1);
    $pdf->SetFont("Times", 'B', 16);
    $pdf->Cell(170, 10, "CENTRE MEDICAL D'ARRONDISSEMENT DE YAOUNDE 4", 0, 1, 'C');
    $pdf->SetFont("Times", '', 13);
    $pdf->Cell(170, 15, "SUB-DIVISIONAL HEALTH CENTER", 0, 1, "C");
    $pdf->SetFont("Helvetica", '', 11);
    $pdf->Cell(170, 0, "", 1, 1, '', 1);
    $pdf->Image("publics/images/logo/img_3434.jpg", 85, 70, 25, 25);

    $pdf->Ln(30);
    $pdf->Cell(40, 0, "", 0, 0);
    $pdf->SetFont("Times", 'B', 16);
    $pdf->Cell(140, 0, "DOSSIER D'HOSPITALISATION", 0, 0);
    $pdf->Cell(15, 0, "", 0, 1);

    $pdf->Ln(7);
    $pdf->Cell(45, 0, "", 0, 0);
    $pdf->SetFont("Times", '', 16);
    $pdf->Cell(140, 0, "HOSPITALISATION RECORD", 0, 0);
    $pdf->Cell(15, 0, "", 0, 1);


    $request = get_dossier_information_by_patient_id($db, $id);
    $result = mysqli_fetch_assoc($request);

    $request2 = get_user_information_by_patient_id($db, $id);
    $result2 = mysqli_fetch_assoc($request2);

    $pdf->Ln(18);


    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(10, 0, "Nom:                                   ", 0, 0);
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(85, 5, "                                   " . $result2["userName"], "B", 0, "L");

    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(10, 0, "Prenom:                                   ", 0, 0);
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(60, 5, "                                   " . $result2["userSecondName"], "B", 1, "L");

    $pdf->Ln(6);
    $pdf->SetFont('Helvetica', 'B', 12);
    $birthday = date_create($result2["userBirthday"]);
    $age =  2020 - intval(date_format($birthday, "Y"));
    $pdf->Cell(10, 0, "Age:                                   ", 0, 0);
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(85, 5, "                                   " . $age, "B", 0, "L");

    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(10, 0, "Sexe:                                   ", 0, 0);
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(60, 5, "                                   " . $result2["userGender"], "B", 1, "L");

    $pdf->Ln(6);
    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(10, 0, "Residence:                                   ", 0, 0);
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(85, 5, "   " . $result2["userAdress"], "B", 0, "L");

    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(10, 0, "Numero de secour:                                   ", 0, 0);
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(60, 5, "                                   " . $result["NumeroSecour"], "B", 1, "L");

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    $pdf->AddPage();

    $pdf->Ln(20);
    //$pdf->Cell(0);

    $pdf->Cell(80, 0, "Date: " . date_format(date_create($result["healthSilverCreatedAt"]), "d M Y H:i:s"), 0, 1);
    $pdf->Ln(15);

    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->Cell(170, 0, "1 MOTIF D'HOSPITALISATION", 0, 1, "C");
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->Ln(5);
    $pdf->MultiCell(170, 5, "                                                                   " . $result["motifConsultation"], "B", "L");

    $pdf->Ln(12);
    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->Cell(170, 0, "2 ANTECEDENTS", 0, 1, "C");
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->Ln(5);
    $pdf->MultiCell(170, 5, "                                                                    " . $result["antecedents"], "B", "L");

    $pdf->Ln(12);
    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->Cell(170, 0, "3 ENQUETE SYSTEMIQUE", 0, 1, "C");
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->Ln(5);
    $pdf->MultiCell(170, 5, "                                                                    " . $result["enqueteSystemique"], "B", "L");

    $pdf->Ln(12);
    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->Cell(170, 0, "4 EXAMEN PHYSIQUE", 0, 1, "C");
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->Ln(5);
    $pdf->MultiCell(170, 5, "                                                                    " . $result["examenPhysique"], "B", "L");

    $pdf->Ln(12);
    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->Cell(170, 0, "5 DIAGNOSTIQUE POSITIF", 0, 1, "C");
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->Ln(5);
    $pdf->MultiCell(170, 5, "                                                                    " . $result["diagnostiquePositif"], "B", "L");

    $pdf->Ln(12);
    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->Cell(170, 0, "6 BILAN", 0, 1, "C");
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->Ln(5);
    $pdf->MultiCell(170, 5, "                                                                    " . $result["bilan"], "B", "");

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++
    $pdf->AddPage();

    $pdf->ln(20);

    $pdf->SetFont("Times", "IB", "13");
    $pdf->SetFillColor(116,186,186);
    $pdf->Cell(182, 10, "TRAITEMENT ET PARAMETRE D'HOSPITALISATION", "1", 0, "C",1);
    $pdf->Ln(20);
    $pdf->parametre($db, $id);

    $pdf->AddPage();
    $pdf->Ln(10);

    $pdf->SetFont("Times", "IB", "13");
    $pdf->Cell(182, 10, "BILAN GENERAL", "1", 1, "C",1);
    $pdf->Ln(10);
    $request3 = get_hospitalisation_by_patientId($db, $id);
    $result3 = mysqli_fetch_assoc($request3);
    $pdf->Write(5, " " . $result3["bilanGeneral"]);

    $pdf->Output("$out", $result2["userName"] . ".pdf");
}

if (isset($_GET["ds"]) && isset($_GET["pId"])) {
    d_s($_GET["out"], $db, $_GET["pId"]);
}

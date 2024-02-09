<?php
    require_once "conn.php";
    require_once "fpdf/fpdf186/fpdf.php";

    $result = "SELECT * FROM crudtable ORDER by id";
    $sql = $conn->query($result);

    $pdf = new FPDF();
    $pdf->Addpage();
    $pdf->Setfont('Arial','B',12);
    while($row = $sql->fetch_object()){
        $id = $row->id;
        $firstname = $row->firstname;
        $lastname = $row->lastname;
        $email = $row->email;
        $address =$row->address;

        $pdf->Cell(10,10,$id,1);
        $pdf->Cell(27,10,$firstname,1);
        $pdf->Cell(30,10,$lastname,1);
        $pdf->Cell(50,10,$email,1);
        $pdf->Cell(69,10,$address,1);
        $pdf->Ln();
    }
    $pdf->Output();
?>
<?php

  	session_start();
  	Include('connector_db.php');
	require('fpdf/fpdf.php');

  	$conection = establecerConexionDB();

	$pdf = new FPDF();
	$pdf->AddPage();

    $sentence = "SELECT fecha_hora FROM MENU_FORMS WHERE active = 1";
    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);
    $result = mysqli_fetch_array($query);
    
    $pdf->SetFont('Arial', 'BU', 30);
    $str = iconv('UTF-8', 'windows-1252', "Menú semanal");
    $pdf->Cell(95,20, $str);
    $pdf->SetFont('Arial', '', 2);

    $pdf->SetFont('Arial', '', 12);
    $str = iconv('UTF-8', 'windows-1252', "Fecha de creación del menú: ");
    $str = $str . $result['fecha_hora'];
    $pdf->Cell(400,20, $str);
    
    printDay("monday", "Lunes");
    printDay("tuesday", "Martes");
    printDay("wednesday", "Miércoles");
    printDay("thursday", "Jueves");
    printDay("friday", "Viernes");
	printDay("saturday", "Sábado");
    printDay("sunday", "Domingo");

	$pdf->Output();

	function printDay($day, $dia) {
		global $pdf, $conection;
		$pdf->SetFont('Arial', 'BU', 18);
        $str = iconv('UTF-8', 'windows-1252', "\n" . $dia . "\n");
        $pdf->Write(16, $str);

		$lunch = "" . $day . "_lunch";
		$dinner = "" . $day . "_dinner";
		
	    $sentence = "SELECT user, " . $lunch . ", " . $dinner . " FROM MENUS WHERE active = 1 AND user IS NOT NULL ORDER BY user ASC";

	    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

	    while($choice = mysqli_fetch_array($query)) {
	    	if(! ($choice[$dinner] == "" && $choice[$lunch] == "") ) {
			    $str1 = iconv('UTF-8', 'windows-1252', $choice[$lunch]);   		
			    $str2 = iconv('UTF-8', 'windows-1252', $choice[$dinner]);

                $pdf->SetFont('Arial','B', 13);
                $pdf->Cell(40,14, "" . $choice['user'] . ": \t\t");
                $pdf->SetFont('Arial','', 13);
	    		$pdf->Write(14, "" . $str1 . "\t\t-\t\t" . $str2 . "\n");    
	    	}
	    }

	}
?>
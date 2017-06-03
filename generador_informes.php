<?php

  	session_start();
  	Include('connector_db.php');
	require('fpdf/fpdf.php');

	global $query, $conection, $username;
  	$conection = establecerConexionDB();

	$pdf = new FPDF();
	$pdf->AddPage();


	/* Lunes */
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Write(16, "Lunes\n");
	$pdf->SetFont('Arial','', 16);

    $sentence = "SELECT user, monday_lunch, monday_dinner FROM MENUS WHERE active = 1 AND user IS NOT NULL";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    while($choice = mysqli_fetch_array($query)) {
    	if(! ($choice['monday_dinner'] == "" && $choice['monday_lunch'] == "") ) {
    		$pdf->Write(14, "" . $choice['user'] . ":\t\t" . $choice['monday_lunch'] . "\t\t-\t\t" . $choice['monday_dinner'] . "\n");    		
    	}
    }

    /* Martes */
    $pdf->SetFont('Arial', 'B', 16);
	$pdf->Write(16, "Martes\n");
	$pdf->SetFont('Arial','', 16);

    $sentence = "SELECT user, tuesday_lunch, tuesday_dinner FROM MENUS WHERE active = 1 AND user IS NOT NULL";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    while($choice = mysqli_fetch_array($query)) {
    	if(! ($choice['tuesday_dinner'] == "" && $choice['tuesday_lunch'] == "") ) {
    		$pdf->Write(14, "" . $choice['user'] . ":\t\t" . $choice['tuesday_lunch'] . "\t\t-\t\t" . $choice['tuesday_dinner'] . "\n");    		
    	}
    }

    /* Miércoles */
    $pdf->SetFont('Arial', 'B', 16);
	$pdf->Write(16, "Miércoles\n");
	$pdf->SetFont('Arial','', 16);
	
    $sentence = "SELECT user, wednesday_lunch, wednesday_dinner FROM MENUS WHERE active = 1 AND user IS NOT NULL";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    while($choice = mysqli_fetch_array($query)) {
    	if(! ($choice['wednesday_dinner'] == "" && $choice['wednesday_lunch'] == "") ) {
    		$pdf->Write(14, "" . $choice['user'] . ":\t\t" . $choice['wednesday_lunch'] . "\t\t-\t\t" . $choice['wednesday_dinner'] . "\n");    		
    	}
    }

    /* Jueves */
    $pdf->SetFont('Arial', 'B', 16);
	$pdf->Write(16, "Jueves\n");
	$pdf->SetFont('Arial','', 16);
	
    $sentence = "SELECT user, thursday_lunch, thursday_dinner FROM MENUS WHERE active = 1 AND user IS NOT NULL";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    while($choice = mysqli_fetch_array($query)) {
    	if(! ($choice['thursday_dinner'] == "" && $choice['thursday_lunch'] == "") ) {
    		$pdf->Write(14, "" . $choice['user'] . ":\t\t" . $choice['thursday_lunch'] . "\t\t-\t\t" . $choice['thursday_dinner'] . "\n");    		
    	}
    }

    /* Viernes */
    $pdf->SetFont('Arial', 'B', 16);
	$pdf->Write(16, "Viernes\n");
	$pdf->SetFont('Arial','', 16);
	
    $sentence = "SELECT user, friday_lunch, friday_dinner FROM MENUS WHERE active = 1 AND user IS NOT NULL";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    while($choice = mysqli_fetch_array($query)) {
    	if(! ($choice['friday_dinner'] == "" && $choice['friday_lunch'] == "") ) {
    		$pdf->Write(14, "" . $choice['user'] . ":\t\t" . $choice['friday_lunch'] . "\t\t-\t\t" . $choice['friday_dinner'] . "\n");    		
    	}
    }

    /* Sábado */
    $pdf->SetFont('Arial', 'B', 16);
	$pdf->Write(16, "Sábado\n");
	$pdf->SetFont('Arial','', 16);
	
    $sentence = "SELECT user, saturday_lunch, saturday_dinner FROM MENUS WHERE active = 1 AND user IS NOT NULL";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    while($choice = mysqli_fetch_array($query)) {
    	if(! ($choice['saturday_dinner'] == "" && $choice['saturday_lunch'] == "") ) {
    		$pdf->Write(14, "" . $choice['user'] . ":\t\t" . $choice['saturday_lunch'] . "\t\t-\t\t" . $choice['saturday_dinner'] . "\n");    		
    	}
    }

    /* Domingo */
    $pdf->SetFont('Arial', 'B', 16);
	$pdf->Write(16, "Domingo\n");
	$pdf->SetFont('Arial','', 16);
	
    $sentence = "SELECT user, sunday_lunch, sunday_dinner FROM MENUS WHERE active = 1 AND user IS NOT NULL";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    while($choice = mysqli_fetch_array($query)) {
    	if(! ($choice['sunday_dinner'] == "" && $choice['sunday_lunch'] == "") ) {
    		$pdf->Write(14, "" . $choice['user'] . ":\t\t" . $choice['sunday_lunch'] . "\t\t-\t\t" . $choice['sunday_dinner'] . "\n");    		
    	}
    }

	$pdf->Output();
?>
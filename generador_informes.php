<?php

  	session_start();
  	Include('connector_db.php');
	require('fpdf/fpdf.php');
    
  	$conection = establecerConexionDB();

	$pdf = new FPDF();
	$pdf->AddPage();

    
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
		$pdf->SetFont('Arial', 'B', 16);
        $str = iconv('UTF-8', 'windows-1252', "\n" . $dia . "\n");
        $pdf->Write(16, $str);
		$pdf->SetFont('Arial','', 16);

		$lunch = "" . $day . "_lunch";
		$dinner = "" . $day . "_dinner";
		
	    $sentence = "SELECT user, " . $lunch . ", " . $dinner . " FROM MENUS WHERE active = 1 AND user IS NOT NULL";

	    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

	    while($choice = mysqli_fetch_array($query)) {
	    	if(! ($choice[$dinner] == "" && $choice[$lunch] == "") ) {
			    $str1 = iconv('UTF-8', 'windows-1252', $choice[$lunch]);   		
			    $str2 = iconv('UTF-8', 'windows-1252', $choice[$dinner]);

	    		$pdf->Write(14, "" . $choice['user'] . ":\t\t" . $str1 . "\t\t-\t\t" . $str2 . "\n");    
	    	}
	    }

	}
?>
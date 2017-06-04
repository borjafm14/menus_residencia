<?php


  session_start();


  Include('connector_db.php');



	$comidalunes1 = $_POST['comidalunes1'];
  $comidalunes2 = $_POST['comidalunes2'];
  $cenalunes1 = $_POST['cenalunes1'];
  $cenalunes2 = $_POST['cenalunes2'];

  $comidamartes1 = $_POST['comidamartes1'];
  $comidamartes2 = $_POST['comidamartes2'];
  $cenamartes1 = $_POST['cenamartes1'];
  $cenamartes2 = $_POST['cenamartes2'];

  $comidamiercoles1 = $_POST['comidamiercoles1'];
  $comidamiercoles2 = $_POST['comidamiercoles2'];
  $cenamiercoles1 = $_POST['cenamiercoles1'];
  $cenamiercoles2 = $_POST['cenamiercoles2'];

  $comidajueves1 = $_POST['comidajueves1'];
  $comidajueves2 = $_POST['comidajueves2'];
  $cenajueves1 = $_POST['cenajueves1'];
  $cenajueves2 = $_POST['cenajueves2'];

  $comidaviernes1 = $_POST['comidaviernes1'];
  $comidaviernes2 = $_POST['comidaviernes2'];
  $cenaviernes1 = $_POST['cenaviernes1'];
  $cenaviernes2 = $_POST['cenaviernes2'];

  $comidasabado1 = $_POST['comidasabado1'];
  $comidasabado2 = $_POST['comidasabado2'];
  $cenasabado1 = $_POST['cenasabado1'];
  $cenasabado2 = $_POST['cenasabado2'];

  $comidadomingo1 = $_POST['comidadomingo1'];
  $comidadomingo2 = $_POST['comidadomingo2'];
  $cenadomingo1 = $_POST['cenadomingo1'];
  $cenadomingo2 = $_POST['cenadomingo2'];
	


  $conection = establecerConexionDB();

  $sentence = "CALL addMenu_form(
                '$comidalunes1',
                '$comidalunes2', 
                '$cenalunes1', 
                '$cenalunes2',
                '$comidamartes1',
                '$comidamartes2',
                '$cenamartes1', 
                '$cenamartes2',
                '$comidamiercoles1',
                '$comidamiercoles2',
                '$cenamiercoles1',
                '$cenamiercoles2',
                '$comidajueves1',
                '$comidajueves2',
                '$cenajueves1',
                '$cenajueves2',
                '$comidaviernes1',
                '$comidaviernes2',
                '$cenaviernes1',
                '$cenaviernes2',
                '$comidasabado1',
                '$comidasabado2',
                '$cenasabado1',
                '$cenasabado2',
                '$comidadomingo1',
                '$comidadomingo2',
                '$cenadomingo1',
                '$cenadomingo2')";

  $query = mysqli_query($conection, $sentence) or die(mysqli_errno() . "-> " . mysqli_error());

  mysqli_close($conection);

  header("Location: admin.php?type=menus");


?>
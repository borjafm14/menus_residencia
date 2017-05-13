<?php


  session_start();


  Include('connector_db.php');

  if(isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
  }
  else{
    $usuario = $_SESSION['user'];
  }



	$comidalunes = $_POST['comidalunes'];
  $cenalunes = $_POST['cenalunes'];

  $comidamartes = $_POST['comidamartes'];
  $cenamartes = $_POST['cenamartes'];

  $comidamiercoles = $_POST['comidamiercoles'];
  $cenamiercoles = $_POST['cenamiercoles'];

  $comidajueves = $_POST['comidajueves'];
  $cenajueves = $_POST['cenajueves'];

  $comidaviernes = $_POST['comidaviernes'];
  $cenaviernes = $_POST['cenaviernes'];

  if(isset($_POST['comidasabado'])){
     $comidasabado = $_POST['comidasabado'];
  }
  else{
    $comidasabado = "";
  }

  if(isset($_POST['cenasabado'])){
     $cenasabado = $_POST['cenasabado'];
  }
  else{
    $cenasabado = "";
  }

  if(isset($_POST['comidadomingo'])){
     $comidadomingo = $_POST['comidadomingo'];
  }
  else{
    $comidadomingo = "";
  }

 if(isset($_POST['cenadomingo'])){
     $cenadomingo = $_POST['cenadomingo'];
  }
  else{
    $cenadomingo = "";
  }
	


  $conection = establecerConexionDB();

  $sentence = "CALL addMenu(
                '$usuario',
                '$comidalunes', 
                '$cenalunes', 
                '$comidamartes',
                '$cenamartes', 
                '$comidamiercoles',
                '$cenamiercoles',
                '$comidajueves',
                '$cenajueves',
                '$comidaviernes',
                '$cenaviernes',
                '$comidasabado',
                '$cenasabado',
                '$comidadomingo',
                '$cenadomingo')";

  $query = mysqli_query($conection, $sentence) or die(mysqli_errno() . "-> " . mysqli_error());

  mysqli_close($conection);

  if(isset($_POST['usuario'])){
    $_SESSION['error'] = "Menú asignado con éxito";
    header("Location: employee.php?type=menus");
  }
  else{
    header("Location: user.php?type=menus");
  }



?>
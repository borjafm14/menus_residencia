<?php


  session_start();


  Include('connector_db.php');

  $ingrediente = $_POST['nombre_ingrediente'];
  $cantidad = $_POST['cantidad_inicial'];
  

  $conection = establecerConexionDB();

  $sentence = "CALL addIngredient (
                '$ingrediente',
                '$cantidad'
              )";

  $query = mysqli_query($conection, $sentence) or die(mysqli_errno() . "-> " . mysqli_error());

  mysqli_close($conection);

  header("Location: admin.php?type=store");


?>
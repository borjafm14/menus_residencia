<?php

  /* Comienzo de la sesion*/
  session_start();

  Include('connector_db.php');



   $ingredient = $_GET['ingredient'];


  /* Variable global para almacenar la query*/
  $query;

  $conection = establecerConexionDB();

  $sentence = "DELETE FROM STORE WHERE ingredient='$ingredient'";

  /* Ejecucion de la sentencia */
  $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

  header('Location: admin.php?type=store');

  /* Libera el resultado de la consulta SQL. */
  mysqli_free_result($query);


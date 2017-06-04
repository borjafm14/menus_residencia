<?php

  /* Comienzo de la sesion*/
  session_start();

  Include('connector_db.php');



   $suggestion = $_GET['id'];


  /* Variable global para almacenar la query*/
  $query;

  $conection = establecerConexionDB();

  $sentence = "DELETE FROM SUGGESTIONS WHERE id='$suggestion'";

  /* Ejecucion de la sentencia */
  $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

  header('Location: admin.php?type=suggestions');

  /* Libera el resultado de la consulta SQL. */
  mysqli_free_result($query);


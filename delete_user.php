<<<<<<< Updated upstream
<?php

  /* Comienzo de la sesion*/
  session_start();

  Include('connector_db.php');



   $usuario = $_GET['user'];


  /* Variable global para almacenar la query*/
  $query;

  $conection = establecerConexionDB();

  $sentence = "DELETE FROM USERS WHERE user='$usuario'";

  /* Ejecucion de la sentencia */
  $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

  header('Location: admin.php?type=users');

  /* Libera el resultado de la consulta SQL. */
  mysqli_free_result($query);

=======
<?php

  /* Comienzo de la sesion*/
  session_start();

  Include('connector_db.php');



   $usuario = $_GET['user'];


  /* Variable global para almacenar la query*/
  $query;

  $conection = establecerConexionDB();

  $sentence = "DELETE FROM USERS WHERE user='$usuario'";

  /* Ejecucion de la sentencia */
  $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

  header('Location: admin.php?type=users');

  /* Libera el resultado de la consulta SQL. */
  mysqli_free_result($query);

>>>>>>> Stashed changes

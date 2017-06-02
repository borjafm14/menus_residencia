<<<<<<< Updated upstream
<?php

  /* Comienzo de la sesion*/
  session_start();

  Include('connector_db.php');



   $ingredient = $_POST['ingredient'];
   $quantity = $_POST['quantity'];




  /* Variable global para almacenar la query*/
  $query;

  $conection = establecerConexionDB();

  $sentence = "UPDATE STORE SET quantity='$quantity' WHERE ingredient='$ingredient'";

  /* Ejecucion de la sentencia */
  $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

  header('Location: admin.php?type=store');

  /* Libera el resultado de la consulta SQL. */
=======
<?php

  /* Comienzo de la sesion*/
  session_start();

  Include('connector_db.php');



   $ingredient = $_POST['ingredient'];
   $quantity = $_POST['quantity'];




  /* Variable global para almacenar la query*/
  $query;

  $conection = establecerConexionDB();

  $sentence = "UPDATE STORE SET quantity='$quantity' WHERE ingredient='$ingredient'";

  /* Ejecucion de la sentencia */
  $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

  header('Location: admin.php?type=store');

  /* Libera el resultado de la consulta SQL. */
>>>>>>> Stashed changes
  mysqli_free_result($query);
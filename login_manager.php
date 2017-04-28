<?php

  /* Comienzo de la sesion*/
  session_start();

  Include('connector_db.php');



	$nombre_usuario = $_POST['user'];
	$pass = $_POST['pass'];


  /* Variable global para almacenar la query*/
  $query;

  $conection = establecerConexionDB();


  /*
   * Se obtiene el numero de usuarios con ese nombre y contraseña, por lo tanto
   * si no se obtiene ninguno, usuario o contraseña erroenos.
   */
  $usuarios_db = comprobarUsuario();


  if ($usuarios_db == 0) {

    /* Cierre de la conexion a la base de datos */
    mysqli_close($conection);

    /* Creo una variable de sesión que almacene el error producido */
    $_SESSION['error'] = "Usuario o contraseña incorrectos";

    /*
     * Redirijo al usuario a la misma pagina y ahora mostrara el ERROR
     * almacenado en la variable de sesion.
     */
    header("Location: index.php");

    /* ---- OJO --- En caso de que despues del header tenga
     * codigo que no queremos que se ejecute debemos hacer un
     * die() ya que si no cambia de pestaña pero el codigo
     * sigue su ejecucion
     */
     //die();

  } 
  else {

    accesoCuenta();

  }


mysqli_close($conection);






function accesoCuenta(){

  /* Llamada a las variables globales a utilizar */
  global $query, $nombre_usuario;

  /* Guardo en la variable sesion el nombre de usuario */
  $_SESSION['user'] = $nombre_usuario;

  /* Obtencion de los valores de la query en forma de array */
  $array_resultados = mysqli_fetch_array($query);

  /* Obtencion del valor pedido, en este caso es el tipo de usuario*/
  $tipo_usuario = $array_resultados[0];

  /* Guardo el tipo de usuario que inicia sesion */
  $_SESSION['type'] = $tipo_usuario;


  if ($tipo_usuario == 1) {


    header('Location: admin.php');


  } else if($tipo_usuario == 2){

    header('Location: employee.php');

  }else{

    header('Location: user.php');

  }


  /* Libera el resultado de la consulta SQL. */
  mysqli_free_result($query);

}





function comprobarUsuario(){

  /* Llamada a las variables globales a utilizar */
  global $query, $conection,$nombre_usuario, $pass;


  $sentence =
     "SELECT
        type
      FROM
        USERS
      WHERE
        user='$nombre_usuario'
        AND
        pass='$pass'";

  /* Ejecucion de la sentencia */
  $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

  $usuarios_db = mysqli_num_rows($query);

  return $usuarios_db;

}



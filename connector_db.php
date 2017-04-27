<?php


//cambiar cuando se ponga en la rasp
define ('NOMBRE_USUARIO_DB', 'borja'); 
define ('PASS_USUARIO_DB', '891995');
define ('NOMBRE_DB', 'menus_residencia');
define ('SERVIDOR_DB', 'localhost');
define ('ERROR_CONEXION_DB', 'No se ha podido establecer conexion.');
define ('ERROR_CONSULTA_DB', 'Error al ejecutar la consulta.');
define ('ERROR_LOGIN', 'Usuario o contraseña incorrectos.');


function establecerConexionDB()
{


  $conection = mysqli_connect(
    SERVIDOR_DB, NOMBRE_USUARIO_DB, PASS_USUARIO_DB, NOMBRE_DB
  ) or die (ERROR_CONEXION_DB);


  return $conection;

}

?>

<<<<<<< Updated upstream
<?php


  session_start();


  Include('connector_db.php');

  $user = $_POST['nombre_usuario'];
  $pass = $_POST['pass_usuario'];
  $first_name = $_POST['nombre'];
  $last_name = $_POST['apellido'];
  $email = $_POST['direccion_email'];
  $type = $_POST['tipo_usuario'];


  $conection = establecerConexionDB();

  $numeroUsuarios = numeroUsuariosExistentes();

  if($numeroUsuarios == 0){

    $sentence = "INSERT INTO USERS(
      user,
      pass,
      first_name,
      last_name,
      email,
      type
    )
    VALUES (
      '$user',
      '$pass',
      '$first_name',
      '$last_name',
      '$email',
      '$type'
    )";

    $query = mysqli_query($conection, $sentence) or die(mysqli_errno() . "-> " . mysqli_error());

    mysqli_free_result($query);
  }

  
  

  mysqli_close($conection);

  if($_SESSION['type'] == 1){
    header("Location: admin.php?type=users");

  }
  else{
    header("Location: employee.php?type=users");

  }





  function numeroUsuariosExistentes(){
    global $user, $conection;
    

    $sentence = "SELECT * FROM USERS WHERE user='$user'";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    /* Obtencion del numero de usuarios devueltos por la query ejecutada*/
    $numeroDatosDevueltos = mysqli_num_rows ( $query);

    return $numeroDatosDevueltos;
  }


=======
<?php


  session_start();


  Include('connector_db.php');

  $user = $_POST['nombre_usuario'];
  $pass = $_POST['pass_usuario'];
  $first_name = $_POST['nombre'];
  $last_name = $_POST['apellido'];
  $email = $_POST['direccion_email'];
  $type = $_POST['tipo_usuario'];


  $conection = establecerConexionDB();

  $numeroUsuarios = numeroUsuariosExistentes();

  if($numeroUsuarios == 0){

    $sentence = "INSERT INTO USERS(
      user,
      pass,
      first_name,
      last_name,
      email,
      type
    )
    VALUES (
      '$user',
      '$pass',
      '$first_name',
      '$last_name',
      '$email',
      '$type'
    )";

    $query = mysqli_query($conection, $sentence) or die(mysqli_errno() . "-> " . mysqli_error());

    mysqli_free_result($query);
  }

  
  

  mysqli_close($conection);

  if($_SESSION['type'] == 1){
    header("Location: admin.php?type=users");

  }
  else{
    header("Location: employee.php?type=users");

  }





  function numeroUsuariosExistentes(){
    global $user, $conection;
    

    $sentence = "SELECT * FROM USERS WHERE user='$user'";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    /* Obtencion del numero de usuarios devueltos por la query ejecutada*/
    $numeroDatosDevueltos = mysqli_num_rows ( $query);

    return $numeroDatosDevueltos;
  }


>>>>>>> Stashed changes
?>
<?php

session_start();    

/*
 * En caso de que un usuario este logueado, se le redirija a la pagina que le
 * corresponde dependiendo el rol que tenga
 */
if(isset($_SESSION['user'])){ /* Si un usuario ha iniciado sesion */

  if($_SESSION['type'] == '1'){

    header("Location: admin.php");

  } else if($_SESSION['type'] == '2'){

    header("Location: employee.php");

  }else{

    header("Location: user.php");

  }

  die();

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Catering manager</title>

  <script type="text/javascript" src="js/script.js"></script>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>

  <link rel="stylesheet" href="css/index.css">


  
</head>

<body class="grey">


  <div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">

      <form class="login-form" name="myForm" action="login_manager.php"
        onsubmit="return validatelogin()" accept-charset="utf-8" method="POST"
        enctype="multipart/form-data">

        <?php

          /*
           * Cuando un usuario se logea puede que usuario o contraseña
           * no sean correctos, y eso es algo que sabemos una vez
           * llamado el php.
           * Por lo tanto en caso de que el usuario introduzca mal usuario
           * o contraseña se muestra el error.
           */
          showerror();

         ?>

        <div class="row">
          <div class="input-field col s12 center">
            <img src="img/login-logo.png" alt="" class="responsive-img valign logo-small">
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="user" type="text" name="user">
            <label for="user" data-error="wrong" data-success="right" class="center-align">Usuario</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="pass">
            <label for="password">Contraseña</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12 light-green darken-1">Iniciar sesión</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <p class="margin medium-small center-align"><a class="black-text" href="#">Registrarse</a></p>
          </div>        
        </div>

      </form>
    </div>
  </div>



</body>

</html>

<?php


function showerror(){

  /* Si esta variable existe, es que se ha producido un error */
  if(isset($_SESSION['error'])){

     /* Muestro el error */
     echo "<p class = \"error\" >" . $_SESSION['error'] . "</p><br><br>";

     /* Elimino la variable para no volver a entrar a este error. */
     unset($_SESSION['error']);

   }
}

?>

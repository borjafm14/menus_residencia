<<<<<<< Updated upstream
<?php

session_start();


if (!isset($_SESSION['user'])){

    header('Location: index.php');
    die();

}else if ($_SESSION['type'] != 2){

    header('Location: index.php');
    die();

}

  Include('connector_db.php');



  /* Variable global para almacenar la query*/
  $query;

  $conection = establecerConexionDB();

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="img/logo-mini.png">
  <title>Catering manager</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

  <script src="js/admin.js"></script>
  <link rel="stylesheet" href="css/admin.css">

  
</head>

<body>

  <div class="navbar-fixed">
    <nav id="navbar" class="row" role="navigation">
      <div class="nav-wrapper">

        <ul class="left">
          <img class="responsive-img logo-mini" src="img/logo-mini-white.jpg">
        </ul>

        <?php
        echo "<span class=title-navbar>" . $_SESSION['user'] . "</span>";
        ?>

        <ul class="right">
          <li><a href="logout.php"><i class="material-icons">power_settings_new</i></a></li>
        </ul>
      </div>
    </nav>
  </div>

  <div id="menu">
    <ul>
      <li><a href="employee.php?type=menus">Asignar menú</a></li>
      <li><a href="employee.php?type=users">Administrar usuarios</a></li>
      <li><a href="employee.php?type=reports">Informes</a></li>
    </ul>
  </div>

  <div id="content" class="row">
    <?php
      showerror();
      getContent();
    ?>
  </div>



</body>

</html>



<?php
  function getContent(){

    if($_GET['type'] == 'menus'){

      menuContent();

    }

    elseif($_GET['type'] == 'users'){

      userView();

    }
    elseif($_GET['type'] == 'reports'){
      echo "<center><p>Administrar informes</p></center>";
    }
    else{
      echo "<center><p>WTF</p></center>";
    }


    

  }





  function menuContent(){
    global $query, $conection,$nombre_usuario, $pass;

    $sentence = "SELECT * FROM MENU_FORMS WHERE active = 1";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    if(mysqli_num_rows($query) == 0){
      echo '<h4 class="no_result center-align">Aún no se puede elegir ningún menú</h4>';

    }
    else{
      echo '<div class="row" id="container">';

      echo '<h4 class="col s12 center-align">Elegir menú</h4>';

      $menu = mysqli_fetch_array($query);

      echo '<form name="form_menu" action="save_menu.php" accept-charset="utf-8" method="POST" enctype="multipart/form-data">';


      echo '<div class="col s12">';
      echo 'Introduce el usuario al que asignar el menú: ';
      echo '<div class="input-field inline">';
      echo '<input id="usuario" type="text" name="usuario">';
      echo '<label for="usuario">Usuario</label>';
      echo '</div>';


      echo '<br><h5 id="table" class="col s12">Lunes</h5>';

      echo '<div class="col s6">';
      echo '<input name="comidalunes" type="radio" id="comidalunes1" value="'.$menu['monday_lunch1'].'"/>';
      echo '<label for="comidalunes1">Comida 1: '. $menu['monday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenalunes" type="radio" id="cenalunes1" value="'.$menu['monday_dinner1'].'"/>';
      echo '<label for="cenalunes1">Cena 1: '. $menu['monday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidalunes" type="radio" id="comidalunes2" value="'.$menu['monday_lunch2'].'"/>';
      echo '<label for="comidalunes2">Comida 2: '. $menu['monday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenalunes" type="radio" id="cenalunes2" value="'.$menu['monday_dinner2'].'"/>';
      echo '<label for="cenalunes2">Cena 2: '. $menu['monday_dinner2'] . '</label>';
      echo '</div>';
      


      echo '<br><h5 id="table" class="col s12">Martes</h5>';

       echo '<div class="col s6">';
      echo '<input name="comidamartes" type="radio" id="comidamartes1" value="'.$menu['tuesday_lunch1'].'"/>';
      echo '<label for="comidamartes1">Comida 1: '. $menu['tuesday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenamartes" type="radio" id="cenamartes1" value="'.$menu['tuesday_dinner1'].'"/>';
      echo '<label for="cenamartes1">Cena 1: '. $menu['tuesday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidamartes" type="radio" id="comidamartes2" value="'.$menu['tuesday_lunch2'].'"/>';
      echo '<label for="comidamartes2">Comida 2: '. $menu['tuesday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenamartes" type="radio" id="cenamartes2" value="'.$menu['tuesday_dinner2'].'"/>';
      echo '<label for="cenamartes2">Cena 2: '. $menu['tuesday_dinner2'] . '</label>';
      echo '</div>';



      echo '<br><h5 id="table" class="col s12">Miércoles</h5>';

       echo '<div class="col s6">';
      echo '<input name="comidamiercoles" type="radio" id="comidamiercoles1" value="'.$menu['wednesday_lunch1'].'"/>';
      echo '<label for="comidamiercoles1">Comida 1: '. $menu['wednesday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenamiercoles" type="radio" id="cenamiercoles1" value="'.$menu['wednesday_dinner1'].'"/>';
      echo '<label for="cenamiercoles1">Cena 1: '. $menu['wednesday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidamiercoles" type="radio" id="comidamiercoles2" value="'.$menu['wednesday_lunch2'].'"/>';
      echo '<label for="comidamiercoles2">Comida 2: '. $menu['wednesday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenamiercoles" type="radio" id="cenamiercoles2" value="'.$menu['wednesday_dinner2'].'"/>';
      echo '<label for="cenamiercoles2">Cena 2: '. $menu['wednesday_dinner2'] . '</label>';
      echo '</div>';


      echo '<br><h5 id="table" class="col s12">Jueves</h5>';

       echo '<div class="col s6">';
      echo '<input name="comidajueves" type="radio" id="comidajueves1" value="'.$menu['thursday_lunch1'].'"/>';
      echo '<label for="comidajueves1">Comida 1: '. $menu['thursday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenajueves" type="radio" id="cenajueves1" value="'.$menu['thursday_dinner1'].'"/>';
      echo '<label for="cenajueves1">Cena 1: '. $menu['thursday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidajueves" type="radio" id="comidajueves2" value="'.$menu['thursday_lunch2'].'"/>';
      echo '<label for="comidajueves2">Comida 2: '. $menu['thursday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenajueves" type="radio" id="cenajueves2" value="'.$menu['thursday_dinner2'].'"/>';
      echo '<label for="cenajueves2">Cena 2: '. $menu['thursday_dinner2'] . '</label>';
      echo '</div>';



      echo '<br><h5 id="table" class="col s12">Viernes</h5>';

       echo '<div class="col s6">';
      echo '<input name="comidaviernes" type="radio" id="comidaviernes1" value="'.$menu['friday_lunch1'].'"/>';
      echo '<label for="comidaviernes1">Comida 1: '. $menu['friday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenaviernes" type="radio" id="cenaviernes1" value="'.$menu['friday_dinner1'].'"/>';
      echo '<label for="cenaviernes1">Cena 1: '. $menu['friday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidaviernes" type="radio" id="comidaviernes2" value="'.$menu['friday_lunch2'].'"/>';
      echo '<label for="comidaviernes2">Comida 2: '. $menu['friday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenaviernes" type="radio" id="cenaviernes2" value="'.$menu['friday_dinner2'].'"/>';
      echo '<label for="cenaviernes2">Cena 2: '. $menu['friday_dinner2'] . '</label>';
      echo '</div>';



      echo '<br><h5 id="table" class="col s12">Sábado (Opcional)</h5>';

      echo '<div class="col s6">';
      echo '<input name="comidasabado" type="radio" id="comidasabado1" value="'.$menu['saturday_lunch1'].'"/>';
      echo '<label for="comidasabado1">Comida 1: '. $menu['saturday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenasabado" type="radio" id="cenasabado1" value="'.$menu['saturday_dinner1'].'"/>';
      echo '<label for="cenasabado1">Cena 1: '. $menu['saturday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidasabado" type="radio" id="comidasabado2" value="'.$menu['saturday_lunch2'].'"/>';
      echo '<label for="comidasabado2">Comida 2: '. $menu['saturday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenasabado" type="radio" id="cenasabado2" value="'.$menu['saturday_dinner2'].'"/>';
      echo '<label for="cenasabado2">Cena 2: '. $menu['saturday_dinner2'] . '</label>';
      echo '</div>';



      echo '<br><h5 id="table" class="col s12">Domingo (Opcional)</h5>';

      echo '<div class="col s6">';
      echo '<input name="comidadomingo" type="radio" id="comidadomingo1" value="'.$menu['sunday_lunch1'].'"/>';
      echo '<label for="comidadomingo1">Comida 1: '. $menu['sunday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenadomingo" type="radio" id="cenadomingo1" value="'.$menu['sunday_dinner1'].'"/>';
      echo '<label for="cenadomingo1">Cena 1: '. $menu['sunday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidadomingo" type="radio" id="comidadomingo2" value="'.$menu['sunday_lunch2'].'"/>';
      echo '<label for="comidadomingo2">Comida 2: '. $menu['sunday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenadomingo" type="radio" id="cenadomingo2" value="'.$menu['sunday_dinner2'].'"/>';
      echo '<label for="cenadomingo2">Cena 2: '. $menu['sunday_dinner2'] . '</label>';
      echo '</div>';


      echo '<button type="submit" class="btn waves-effect waves-light col s2 light-green darken-1 center-button">Asignar menú</button>';

      echo '</form>';

      echo "</div>";
    }


    mysqli_free_result($query);

    mysqli_close($conection);


  }




  function showerror(){

  /* Si esta variable existe, es que se ha producido un error */
  if(isset($_SESSION['error'])){

    echo "<script type=\"text/javascript\">";
    echo "Materialize.toast(\"Menú asignado con éxito\", 3000, \"light-green darken-1\");";
    echo "</script>";

    /* Elimino la variable para no volver a entrar a este error. */
    unset($_SESSION['error']);

   }
}


function userView(){
    global $query, $conection;

    echo '<div id="container" class="row">';
    echo '<h4 class="col s12 center-align">Administración de usuarios</h4>';
    echo '<button id="add_user" onclick="$(\'#modal_user\').modal(\'open\')" class="btn waves-effect waves-light light-green darken-1 center-button">Nuevo usuario</button>';
    echo '<br><br><hr></div>';

    $sentence = "SELECT * FROM USERS WHERE type > 2";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);
    
    if(mysqli_num_rows($query) == 0){
      echo '<h4 class="no_result center-align">No hay ningún usuario registrado</h4>';      
    }

    while($usuario = mysqli_fetch_array($query)) {
      echo '<div class="col s12 m7">';
      echo   '<div class="card horizontal">';
      echo     '<div class="card-stacked">';
      echo       '<div class="card-content">';
      
      
      echo       '<p> Usuario: '.$usuario['user'].'</p>';
      echo       '<p> Contraseña: '.$usuario['pass'].'</p>';
      echo       '<p> Nombre: '.$usuario['first_name'].'</p>';
      echo       '<p> Apellido: '.$usuario['last_name'].'</p>';
      echo       '<p> Email: '.$usuario['email'].'</p>';

      if($usuario['type'] == 2){
        echo       '<p> Tipo: Empleado</p>';
      }
      else{
        echo       '<p> Tipo: Usuario</p>';
      }
      
      
      echo       '</div>';
      echo       '<div class="card-action">';
      echo       '<a href="delete_user.php?user='.$usuario['user'].'" class="btn waves-effect waves-light light-green darken-1">Borrar</a>';
            
      echo '</div></div></div></div>';
    }
  }



?>


=======
<?php

session_start();


if (!isset($_SESSION['user'])){

    header('Location: index.php');
    die();

}else if ($_SESSION['type'] != 2){

    header('Location: index.php');
    die();

}

  Include('connector_db.php');



  /* Variable global para almacenar la query*/
  $query;

  $conection = establecerConexionDB();

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="img/logo-mini.png">
  <title>Catering manager</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

  <script src="js/admin.js"></script>
  <link rel="stylesheet" href="css/admin.css">

  
</head>

<body>

  <div class="navbar-fixed">
    <nav id="navbar" class="row" role="navigation">
      <div class="nav-wrapper">

        <ul class="left">
          <img class="responsive-img logo-mini" src="img/logo-mini-white.jpg">
        </ul>

        <?php
        echo "<span class=title-navbar>" . $_SESSION['user'] . "</span>";
        ?>

        <ul class="right">
          <li><a href="logout.php"><i class="material-icons">power_settings_new</i></a></li>
        </ul>
      </div>
    </nav>
  </div>

  <div id="menu">
    <ul>
      <li><a href="employee.php?type=menus">Asignar menú</a></li>
      <li><a href="employee.php?type=users">Administrar usuarios</a></li>
      <li><a href="employee.php?type=reports">Informes</a></li>
    </ul>
  </div>

  <div id="content" class="row">
    <?php
      showerror();
      getContent();
    ?>
  </div>



</body>

</html>



<?php
  function getContent(){

    if($_GET['type'] == 'menus'){

      menuContent();

    }

    elseif($_GET['type'] == 'users'){

      userView();

    }
    elseif($_GET['type'] == 'reports'){
      echo "<center><p>Administrar informes</p></center>";
    }
    else{
      echo "<center><p>WTF</p></center>";
    }


    

  }





  function menuContent(){
    global $query, $conection,$nombre_usuario, $pass;

    $sentence = "SELECT * FROM MENU_FORMS WHERE active = 1";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    if(mysqli_num_rows($query) == 0){
      echo '<h4 class="no_result center-align">Aún no se puede elegir ningún menú</h4>';

    }
    else{
      echo '<div class="row" id="container">';

      echo '<h4 class="col s12 center-align">Elegir menú</h4>';

      $menu = mysqli_fetch_array($query);

      echo '<form name="form_menu" action="save_menu.php" accept-charset="utf-8" method="POST" enctype="multipart/form-data">';


      echo '<div class="col s12">';
      echo 'Introduce el usuario al que asignar el menú: ';
      echo '<div class="input-field inline">';
      echo '<input id="usuario" type="text" name="usuario">';
      echo '<label for="usuario">Usuario</label>';
      echo '</div>';


      echo '<br><h5 id="table" class="col s12">Lunes</h5>';

      echo '<div class="col s6">';
      echo '<input name="comidalunes" type="radio" id="comidalunes1" value="'.$menu['monday_lunch1'].'"/>';
      echo '<label for="comidalunes1">Comida 1: '. $menu['monday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenalunes" type="radio" id="cenalunes1" value="'.$menu['monday_dinner1'].'"/>';
      echo '<label for="cenalunes1">Cena 1: '. $menu['monday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidalunes" type="radio" id="comidalunes2" value="'.$menu['monday_lunch2'].'"/>';
      echo '<label for="comidalunes2">Comida 2: '. $menu['monday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenalunes" type="radio" id="cenalunes2" value="'.$menu['monday_dinner2'].'"/>';
      echo '<label for="cenalunes2">Cena 2: '. $menu['monday_dinner2'] . '</label>';
      echo '</div>';
      


      echo '<br><h5 id="table" class="col s12">Martes</h5>';

       echo '<div class="col s6">';
      echo '<input name="comidamartes" type="radio" id="comidamartes1" value="'.$menu['tuesday_lunch1'].'"/>';
      echo '<label for="comidamartes1">Comida 1: '. $menu['tuesday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenamartes" type="radio" id="cenamartes1" value="'.$menu['tuesday_dinner1'].'"/>';
      echo '<label for="cenamartes1">Cena 1: '. $menu['tuesday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidamartes" type="radio" id="comidamartes2" value="'.$menu['tuesday_lunch2'].'"/>';
      echo '<label for="comidamartes2">Comida 2: '. $menu['tuesday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenamartes" type="radio" id="cenamartes2" value="'.$menu['tuesday_dinner2'].'"/>';
      echo '<label for="cenamartes2">Cena 2: '. $menu['tuesday_dinner2'] . '</label>';
      echo '</div>';



      echo '<br><h5 id="table" class="col s12">Miércoles</h5>';

       echo '<div class="col s6">';
      echo '<input name="comidamiercoles" type="radio" id="comidamiercoles1" value="'.$menu['wednesday_lunch1'].'"/>';
      echo '<label for="comidamiercoles1">Comida 1: '. $menu['wednesday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenamiercoles" type="radio" id="cenamiercoles1" value="'.$menu['wednesday_dinner1'].'"/>';
      echo '<label for="cenamiercoles1">Cena 1: '. $menu['wednesday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidamiercoles" type="radio" id="comidamiercoles2" value="'.$menu['wednesday_lunch2'].'"/>';
      echo '<label for="comidamiercoles2">Comida 2: '. $menu['wednesday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenamiercoles" type="radio" id="cenamiercoles2" value="'.$menu['wednesday_dinner2'].'"/>';
      echo '<label for="cenamiercoles2">Cena 2: '. $menu['wednesday_dinner2'] . '</label>';
      echo '</div>';


      echo '<br><h5 id="table" class="col s12">Jueves</h5>';

       echo '<div class="col s6">';
      echo '<input name="comidajueves" type="radio" id="comidajueves1" value="'.$menu['thursday_lunch1'].'"/>';
      echo '<label for="comidajueves1">Comida 1: '. $menu['thursday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenajueves" type="radio" id="cenajueves1" value="'.$menu['thursday_dinner1'].'"/>';
      echo '<label for="cenajueves1">Cena 1: '. $menu['thursday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidajueves" type="radio" id="comidajueves2" value="'.$menu['thursday_lunch2'].'"/>';
      echo '<label for="comidajueves2">Comida 2: '. $menu['thursday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenajueves" type="radio" id="cenajueves2" value="'.$menu['thursday_dinner2'].'"/>';
      echo '<label for="cenajueves2">Cena 2: '. $menu['thursday_dinner2'] . '</label>';
      echo '</div>';



      echo '<br><h5 id="table" class="col s12">Viernes</h5>';

       echo '<div class="col s6">';
      echo '<input name="comidaviernes" type="radio" id="comidaviernes1" value="'.$menu['friday_lunch1'].'"/>';
      echo '<label for="comidaviernes1">Comida 1: '. $menu['friday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenaviernes" type="radio" id="cenaviernes1" value="'.$menu['friday_dinner1'].'"/>';
      echo '<label for="cenaviernes1">Cena 1: '. $menu['friday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidaviernes" type="radio" id="comidaviernes2" value="'.$menu['friday_lunch2'].'"/>';
      echo '<label for="comidaviernes2">Comida 2: '. $menu['friday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenaviernes" type="radio" id="cenaviernes2" value="'.$menu['friday_dinner2'].'"/>';
      echo '<label for="cenaviernes2">Cena 2: '. $menu['friday_dinner2'] . '</label>';
      echo '</div>';



      echo '<br><h5 id="table" class="col s12">Sábado (Opcional)</h5>';

      echo '<div class="col s6">';
      echo '<input name="comidasabado" type="radio" id="comidasabado1" value="'.$menu['saturday_lunch1'].'"/>';
      echo '<label for="comidasabado1">Comida 1: '. $menu['saturday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenasabado" type="radio" id="cenasabado1" value="'.$menu['saturday_dinner1'].'"/>';
      echo '<label for="cenasabado1">Cena 1: '. $menu['saturday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidasabado" type="radio" id="comidasabado2" value="'.$menu['saturday_lunch2'].'"/>';
      echo '<label for="comidasabado2">Comida 2: '. $menu['saturday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenasabado" type="radio" id="cenasabado2" value="'.$menu['saturday_dinner2'].'"/>';
      echo '<label for="cenasabado2">Cena 2: '. $menu['saturday_dinner2'] . '</label>';
      echo '</div>';



      echo '<br><h5 id="table" class="col s12">Domingo (Opcional)</h5>';

      echo '<div class="col s6">';
      echo '<input name="comidadomingo" type="radio" id="comidadomingo1" value="'.$menu['sunday_lunch1'].'"/>';
      echo '<label for="comidadomingo1">Comida 1: '. $menu['sunday_lunch1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenadomingo" type="radio" id="cenadomingo1" value="'.$menu['sunday_dinner1'].'"/>';
      echo '<label for="cenadomingo1">Cena 1: '. $menu['sunday_dinner1'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="comidadomingo" type="radio" id="comidadomingo2" value="'.$menu['sunday_lunch2'].'"/>';
      echo '<label for="comidadomingo2">Comida 2: '. $menu['sunday_lunch2'] . '</label>';
      echo '</div>';

      echo '<div class="col s6">';
      echo '<input name="cenadomingo" type="radio" id="cenadomingo2" value="'.$menu['sunday_dinner2'].'"/>';
      echo '<label for="cenadomingo2">Cena 2: '. $menu['sunday_dinner2'] . '</label>';
      echo '</div>';


      echo '<button type="submit" class="btn waves-effect waves-light col s2 light-green darken-1 center-button">Asignar menú</button>';

      echo '</form>';

      echo "</div>";
    }


    mysqli_free_result($query);

    mysqli_close($conection);


  }




  function showerror(){

  /* Si esta variable existe, es que se ha producido un error */
  if(isset($_SESSION['error'])){

    echo "<script type=\"text/javascript\">";
    echo "Materialize.toast(\"Menú asignado con éxito\", 3000, \"light-green darken-1\");";
    echo "</script>";

    /* Elimino la variable para no volver a entrar a este error. */
    unset($_SESSION['error']);

   }
}


function userView(){
    global $query, $conection;

    echo '<div id="container" class="row">';
    echo '<h4 class="col s12 center-align">Administración de usuarios</h4>';
    echo '<button id="add_user" onclick="$(\'#modal_user\').modal(\'open\')" class="btn waves-effect waves-light light-green darken-1 center-button">Nuevo usuario</button>';
    echo '<br><br><hr></div>';

    $sentence = "SELECT * FROM USERS WHERE type > 2";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);
    
    if(mysqli_num_rows($query) == 0){
      echo '<h4 class="no_result center-align">No hay ningún usuario registrado</h4>';      
    }

    while($usuario = mysqli_fetch_array($query)) {
      echo '<div class="col s12 m7">';
      echo   '<div class="card horizontal">';
      echo     '<div class="card-stacked">';
      echo       '<div class="card-content">';
      
      
      echo       '<p> Usuario: '.$usuario['user'].'</p>';
      echo       '<p> Contraseña: '.$usuario['pass'].'</p>';
      echo       '<p> Nombre: '.$usuario['first_name'].'</p>';
      echo       '<p> Apellido: '.$usuario['last_name'].'</p>';
      echo       '<p> Email: '.$usuario['email'].'</p>';

      if($usuario['type'] == 2){
        echo       '<p> Tipo: Empleado</p>';
      }
      else{
        echo       '<p> Tipo: Usuario</p>';
      }
      
      
      echo       '</div>';
      echo       '<div class="card-action">';
      echo       '<a href="delete_user.php?user='.$usuario['user'].'" class="btn waves-effect waves-light light-green darken-1">Borrar</a>';
            
      echo '</div></div></div></div>';
    }
  }



?>


>>>>>>> Stashed changes

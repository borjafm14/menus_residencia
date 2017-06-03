<?php

session_start();


if (!isset($_SESSION['user'])){

    header('Location: index.php');
    die();

}else if ($_SESSION['type'] != 1){

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

  <!--modal enoooooooooorme de crear menu-->
  <div id="modal_menu" class="modal">
    <div class="modal-content">
      <form name="form_menu" action="save_menu_form.php" accept-charset="utf-8" method="POST" enctype="multipart/form-data">

      <h4 class="center-align">Lunes</h4>

      <div class="input-field">
        <input type="text" name="comidalunes1" id="comidalunes1">
        <label for="comidalunes1">Comida 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="comidalunes2" id="comidalunes2">
        <label for="comidalunes2">Comida 2</label>
      </div>

      <div class="input-field">
        <input type="text" name="cenalunes1" id="cenalunes1">
        <label for="cenalunes1">Cena 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="cenalunes2" id="cenalunes2">
        <label for="cenalunes2">Cena 2</label>
      </div>

      <br><h4 class="center-align">Martes</h4>

      <div class="input-field">
        <input type="text" name="comidamartes1" id="comidamartes1">
        <label for="comidamartes1">Comida 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="comidamartes2" id="comidamartes2">
        <label for="comidamartes2">Comida 2</label>
      </div>

      <div class="input-field">
        <input type="text" name="cenamartes1" id="cenamartes1">
        <label for="cenamartes1">Cena 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="cenamartes2" id="cenamartes2">
        <label for="cenamartes2">Cena 2</label>
      </div>

      <br><h4 class="center-align">Miércoles</h4>

      <div class="input-field">
        <input type="text" name="comidamiercoles1" id="comidamiercoles1">
        <label for="comidamiercoles1">Comida 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="comidamiercoles2" id="comidamiercoles2">
        <label for="comidamiercoles2">Comida 2</label>
      </div>

      <div class="input-field">
        <input type="text" name="cenamiercoles1" id="cenamiercoles1">
        <label for="cenamiercoles1">Cena 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="cenamiercoles2" id="cenamiercoles2">
        <label for="cenamiercoles2">Cena 2</label>
      </div>

      <br><h4 class="center-align">Jueves</h4>

      <div class="input-field">
        <input type="text" name="comidajueves1" id="comidajueves1">
        <label for="comidajueves1">Comida 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="comidajueves2" id="comidajueves2">
        <label for="comidajueves2">Comida 2</label>
      </div>

      <div class="input-field">
        <input type="text" name="cenajueves1" id="cenajueves1">
        <label for="cenajueves1">Cena 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="cenajueves2" id="cenajueves2">
        <label for="cenajueves2">Cena 2</label>
      </div>

      <br><h4 class="center-align">Viernes</h4>

      <div class="input-field">
        <input type="text" name="comidaviernes1" id="comidaviernes1">
        <label for="comidaviernes1">Comida 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="comidaviernes2" id="comidaviernes2">
        <label for="comidaviernes2">Comida 2</label>
      </div>

      <div class="input-field">
        <input type="text" name="cenaviernes1" id="cenaviernes1">
        <label for="cenaviernes1">Cena 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="cenaviernes2" id="cenaviernes2">
        <label for="cenaviernes2">Cena 2</label>
      </div>

      <br><h4 class="center-align">Sábado</h4>

      <div class="input-field">
        <input type="text" name="comidasabado1" id="comidasabado1">
        <label for="comidasabado1">Comida 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="comidasabado2" id="comidasabado2">
        <label for="comidasabado2">Comida 2</label>
      </div>

      <div class="input-field">
        <input type="text" name="cenasabado1" id="cenasabado1">
        <label for="cenasabado1">Cena 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="cenasabado2" id="cenasabado2">
        <label for="cenasabado2">Cena 2</label>
      </div>

      <br><h4 class="center-align">Domingo</h4>

      <div class="input-field">
        <input type="text" name="comidadomingo1" id="comidadomingo1">
        <label for="comidadomingo1">Comida 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="comidadomingo2" id="comidadomingo2">
        <label for="comidadomingo2">Comida 2</label>
      </div>

      <div class="input-field">
        <input type="text" name="cenadomingo1" id="cenadomingo1">
        <label for="cenadomingo1">Cena 1</label>
      </div>
      <div class="input-field">
        <input type="text" name="cenadomingo2" id="cenadomingo2">
        <label for="cenadomingo2">Cena 2</label>
      </div>

      <button type="submit" class="btn waves-effect waves-light col s2 light-green darken-1 center-align">Crear menú</button>

      </form>
    </div>
  </div>

  <!--fin modal menus-->

  <!--modal para incorporar nuevo ingrediente-->
  <div id="modal_ingredient" class="modal">
    <div class="modal-content">
      <form name="form_ingredient" onsubmit="return validateIngredient()" action="add_ingredient.php" accept-charset="utf-8" method="POST" enctype="multipart/form-data">

        <h4 class="center-align">Nuevo ingrediente</h4>

        <div class="input-field">
          <input type="text" name="nombre_ingrediente" id="nombre_ingrediente">
          <label for="nombre_ingrediente">Ingrediente*</label>
        </div>

        <div class="input-field">
          <input type="text" name="cantidad_inicial" id="cantidad_inicial">
          <label for="cantidad_inicial">Cantidad inicial*</label>
        </div>      

        <button type="submit" class="btn waves-effect waves-light col s2 light-green darken-1 center-align">Guardar</button>

      </form>
    </div>
  </div>

  <!--fin modal ingredientes-->

  <!--modal para incorporar usuarios-->
  <div id="modal_user" class="modal">
    <div class="modal-content">
      <form name="form_user" onsubmit="return validateUser()" action="add_user.php" accept-charset="utf-8" method="POST" enctype="multipart/form-data">
        
        <h4 class="center-align">Nuevo usuario</h4>

        <div class="input-field">
          <input type="text" name="nombre_usuario" id="nombre_usuario">
          <label for="nombre_usuario">Usuario*</label>
        </div>

        <div class="input-field">
          <input type="text" name="pass_usuario" id="pass_usuario">
          <label for="pass_usuario">Contraseña*</label>
        </div>

        <div class="input-field">
          <input type="text" name="nombre" id="nombre">
          <label for="nombre_usuario">Nombre*</label>
        </div>
        
        <div class="input-field">
          <input type="text" name="apellido" id="apellido">
          <label for="apellido">Apellido*</label>
        </div>

        <div class="input-field">
          <input type="text" name="direccion_email" id="direccion_email">
          <label for="direccion_email">Email*</label>
        </div>

        <div class="input-field">
          <input type="text" name="tipo_usuario" id="tipo_usuario">
          <label for="tipo_usuario">Tipo de usuario (2->Empleado, 3->Usuario)*</label>
        </div>

        <button type="submit" class="btn waves-effect waves-light col s2 light-green darken-1 center-align">Guardar</button>

      </form>
    </div>
  </div>


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
      <li><a href="admin.php?type=menus">Crear menú</a></li>
      <li><a href="admin.php?type=users">Administrar usuarios</a></li>
      <li><a href="admin.php?type=store">Almacén</a></li>
      <li><a href="admin.php?type=reports">Informes</a></li>
      <li><a href="admin.php?type=suggestions">Sugerencias</a></li>
    </ul>
  </div>

  <div id="content" class="row">
    <?php
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
    elseif($_GET['type'] == 'store'){
      almacenView();
    }
    elseif($_GET['type'] == 'reports'){
      informesView();
    }
    elseif($_GET['type'] == 'suggestions'){
      echo "<center><p>Administrar Sugerencias</p></center>";
    }
    else{
      echo "<center><p>WTF</p></center>";
    }
  }


  function almacenView(){
    global $query, $conection;

    echo '<div id="container" class="row">';
    
    echo '<h4 class="col s12 center-align">Inventario del almacén</h4>';
    echo '<button id="add_ingredient" onclick="$(\'#modal_ingredient\').modal(\'open\')" class="btn waves-effect waves-light light-green darken-1 center-button">Nuevo ingrediente</button>';
    echo '<br><br><hr></div>';

    $sentence = "SELECT * FROM STORE";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);
    
    if(mysqli_num_rows($query) == 0){
      echo '<h4 class="no_result center-align">No hay ningún ingrediente en el almacén</h4>';      
    }

    while($ingrediente = mysqli_fetch_array($query)) {
      echo '<div class="col s12 m7">';
      echo   '<div class="card horizontal">';
      echo     '<div class="card-stacked">';
      echo       '<div class="card-content">';
      
      echo       '<p>'.$ingrediente['ingredient'].'</p>';
      echo       '<p>'.$ingrediente['quantity'].' kg / litros</p>';
      
      echo       '</div>';
      echo       '<div class="card-action">';
      echo       '<span><a href="delete_ingredient.php?ingredient='.$ingrediente['ingredient'].'" class="col s2 btn waves-effect waves-light light-green darken-1">Borrar</a></span>';

      echo       '<form name="form_increment" onsubmit="return validateIncrement()" action="edit_ingredient.php" accept-charset="utf-8" method="POST" enctype="multipart/form-data">';
      echo       '<span><input class="col s3 offset-s2" type="text" id="quantity" name="quantity"></span>';
      echo       '<input type="hidden"  type="text" id="ingredient" name="ingredient" value="'.$ingrediente['ingredient'].'">';

      echo       '<span><button type="submit" class="col s4 btn waves-effect waves-light light-green darken-1">Editar cantidad</a></span>';
      echo       '</form>';

            
      echo '</div></div></div></div>';
    }
  }

  function userView(){
    global $query, $conection;

    echo '<div id="container" class="row">';
    echo '<h4 class="col s12 center-align">Administración de usuarios</h4>';
    echo '<button id="add_user" onclick="$(\'#modal_user\').modal(\'open\')" class="btn waves-effect waves-light light-green darken-1 center-button">Nuevo usuario</button>';
    echo '<br><br><hr></div>';

    $sentence = "SELECT * FROM USERS WHERE type > 1";

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

  function menuContent(){
    global $query, $conection,$nombre_usuario, $pass;

    $sentence = "SELECT * FROM MENU_FORMS WHERE active = 1";

    $query = mysqli_query($conection, $sentence) or die(ERROR_CONSULTA_DB);

    if(mysqli_num_rows($query) == 0){
      echo '<h4 class="no_result center-align">Aún no ha creado ningún menú</h4>';

      echo '<button onclick="$(\'#modal_menu\').modal(\'open\')" class="btn waves-effect waves-light col s2 light-green darken-1 center-button">Crear menú</button>';
    }
    else{
      echo '<div class="row" id="container">';

      echo '<h4 class="col s12 center-align">Menú actual</h4>';
      echo '<button onclick="$(\'#modal_menu\').modal(\'open\')" class="btn waves-effect waves-light col s2 light-green darken-1 center-button">Crear nuevo menú</button>';

      

      $menu = mysqli_fetch_array($query);


      echo '<br><h5 id="table" class="col s12">Lunes</h5>';

      echo '<div class="col s6">Comida 1: ' . $menu['monday_lunch1'] . '</div>';
      echo '<div class="col s6">Cena 1: ' . $menu['monday_dinner1'] . '</div>';

      echo '<div class="col s6">Comida 2: ' . $menu['monday_lunch2'] . '</div>';
      echo '<div class="col s6">Cena 2: ' . $menu['monday_dinner2'] . '</div>';



      echo '<br><h5 id="table" class="col s12">Martes</h5>';

      echo '<div class="col s6">Comida 1: ' . $menu['tuesday_lunch1'] . '</div>';
      echo '<div class="col s6">Cena 1: ' . $menu['tuesday_dinner1'] . '</div>';

      echo '<div class="col s6">Comida 2: ' . $menu['tuesday_lunch2'] . '</div>';
      echo '<div class="col s6">Cena 2: ' . $menu['tuesday_dinner2'] . '</div>';



      echo '<br><h5 id="table" class="col s12">Miércoles</h5>';

      echo '<div class="col s6">Comida 1: ' . $menu['wednesday_lunch1'] . '</div>';
      echo '<div class="col s6">Cena 1: ' . $menu['wednesday_dinner1'] . '</div>';

      echo '<div class="col s6">Comida 2: ' . $menu['wednesday_lunch2'] . '</div>';
      echo '<div class="col s6">Cena 2: ' . $menu['wednesday_dinner2'] . '</div>';


      echo '<br><h5 id="table" class="col s12">Jueves</h5>';

      echo '<div class="col s6">Comida 1: ' . $menu['thursday_lunch1'] . '</div>';
      echo '<div class="col s6">Cena 1: ' . $menu['thursday_dinner1'] . '</div>';

      echo '<div class="col s6">Comida 2: ' . $menu['thursday_lunch2'] . '</div>';
      echo '<div class="col s6">Cena 2: ' . $menu['thursday_dinner2'] . '</div>';



      echo '<br><h5 id="table" class="col s12">Viernes</h5>';

      echo '<div class="col s6">Comida 1: ' . $menu['friday_lunch1'] . '</div>';
      echo '<div class="col s6">Cena 1: ' . $menu['friday_dinner1'] . '</div>';

      echo '<div class="col s6">Comida 2: ' . $menu['friday_lunch2'] . '</div>';
      echo '<div class="col s6">Cena 2: ' . $menu['friday_dinner2'] . '</div>';



      echo '<br><h5 id="table" class="col s12">Sábado</h5>';

      echo '<div class="col s6">Comida 1: ' . $menu['saturday_lunch1'] . '</div>';
      echo '<div class="col s6">Cena 1: ' . $menu['saturday_dinner1'] . '</div>';

      echo '<div class="col s6">Comida 2: ' . $menu['saturday_lunch2'] . '</div>';
      echo '<div class="col s6">Cena 2: ' . $menu['saturday_dinner2'] . '</div>';



      echo '<br><h5 id="table" class="col s12">Domingo</h5>';

      echo '<div class="col s6">Comida 1: ' . $menu['sunday_lunch1'] . '</div>';
      echo '<div class="col s6">Cena 1: ' . $menu['sunday_dinner1'] . '</div>';

      echo '<div class="col s6">Comida 2: ' . $menu['sunday_lunch2'] . '</div>';
      echo '<div class="col s6">Cena 2: ' . $menu['sunday_dinner2'] . '</div>';



      echo "</div>";
    }


    mysqli_free_result($query);

    mysqli_close($conection);
  }

  function informesView(){


    echo '<h4 class="no_result center-align">Pulse para generar los informes del último menú</h4>';

    echo '<a href="generador_informes.php" target="_blank" class="btn waves-effect waves-light col s2 light-green darken-1 center-button">Generar informes</a>';

  }

?>



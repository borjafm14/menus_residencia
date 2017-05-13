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
      <li><a href="admin.php?type=notifications">Avisos</a></li>
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
      echo "<center><p>Administrar usuarios</p></center>";
    }
    elseif($_GET['type'] == 'store'){
      echo "<center><p>Administrar Almacén</p></center>";
    }
    elseif($_GET['type'] == 'reports'){
      echo "<center><p>Administrar informes</p></center>";
    }
    elseif($_GET['type'] == 'notifications'){
      echo "<center><p>Administrar avisos</p></center>";
    }
    elseif($_GET['type'] == 'suggestions'){
      echo "<center><p>Administrar Sugerencias</p></center>";
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
      echo '<h4 class="no_result center-align">Aún no ha creado ningún menú</h4>';

      echo '<button onclick="$(\'#modal_menu\').modal(\'open\')" class="btn waves-effect waves-light col s2 light-green darken-1 center-button">Crear menú</button>';
    }
    else{
      echo "menuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu";
    }


    mysqli_close($conection);


  }
?>



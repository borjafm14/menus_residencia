<?php

session_start();


if (!isset($_SESSION['user'])){

    header('Location: index.php');
    die();

}else if ($_SESSION['type'] != 3){

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
      <li><a href="user.php?type=menus">Elegir menú</a></li>
      <li><a href="user.php?type=suggestions">Sugerencias</a></li>
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

    elseif($_GET['type'] == 'suggestions'){
      suggestionContent();
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

      $userquery = $_SESSION['user'];
      $sentence2 = "SELECT * FROM USERS WHERE user = '$userquery'";
      $query2 = mysqli_query($conection, $sentence2) or die("error en usuario actual");

      $user = mysqli_fetch_array($query2);

      //si el usuario tiene un menu elegido, no le pongo los radio button
      //le pongo texto plano con su menú, para que no pueda reelegirlo
      if($user['id_menu'] != NULL){

        $sentence3 = "SELECT * FROM MENUS WHERE user = '$userquery' AND active = 1";
        $query3 = mysqli_query($conection, $sentence3) or die("error en menu");

        $menufinal = mysqli_fetch_array($query3);

        echo '<div class="row" id="container">';

        echo '<h4 class="col s12 center-align">Menú elegido</h4>';

        echo '<br><h5 id="table" class="col s12">Lunes</h5>';

        echo '<div class="col s6">Comida: ' . $menufinal['monday_lunch'] . '</div>';
        echo '<div class="col s6">Cena: ' . $menufinal['monday_dinner'] . '</div>';



        echo '<br><h5 id="table" class="col s12">Martes</h5>';

        echo '<div class="col s6">Comida: ' . $menufinal['tuesday_lunch'] . '</div>';
        echo '<div class="col s6">Cena: ' . $menufinal['tuesday_dinner'] . '</div>';



        echo '<br><h5 id="table" class="col s12">Miércoles</h5>';

        echo '<div class="col s6">Comida: ' . $menufinal['wednesday_lunch'] . '</div>';
        echo '<div class="col s6">Cena: ' . $menufinal['wednesday_dinner'] . '</div>';


        echo '<br><h5 id="table" class="col s12">Jueves</h5>';

        echo '<div class="col s6">Comida: ' . $menufinal['thursday_lunch'] . '</div>';
        echo '<div class="col s6">Cena: ' . $menufinal['thursday_dinner'] . '</div>';



        echo '<br><h5 id="table" class="col s12">Viernes</h5>';

        echo '<div class="col s6">Comida: ' . $menufinal['friday_lunch'] . '</div>';
        echo '<div class="col s6">Cena: ' . $menufinal['friday_dinner'] . '</div>';



        echo '<br><h5 id="table" class="col s12">Sábado</h5>';

        echo '<div class="col s6">Comida: ' . $menufinal['saturday_lunch'] . '</div>';
        echo '<div class="col s6">Cena: ' . $menufinal['saturday_dinner'] . '</div>';



        echo '<br><h5 id="table" class="col s12">Domingo</h5>';

        echo '<div class="col s6">Comida: ' . $menufinal['sunday_lunch'] . '</div>';
        echo '<div class="col s6">Cena: ' . $menufinal['sunday_dinner'] . '</div>';


        echo '</div>';

        mysqli_free_result($query2);
        mysqli_free_result($query3);



      }
      else{
        echo '<div class="row" id="container">';

        echo '<h4 class="col s12 center-align">Elegir menú</h4>';

        $menu = mysqli_fetch_array($query);

        echo '<form name="form_menu" action="save_menu.php" accept-charset="utf-8" method="POST" enctype="multipart/form-data">';


        echo '<br><h5 id="table" class="col s12">Lunes</h5>';

        echo '<div class="col s6">';
        echo '<input name="comidalunes" type="radio" checked="checked" id="comidalunes1" value="'.$menu['monday_lunch1'].'"/>';
        echo '<label for="comidalunes1">Comida 1: '. $menu['monday_lunch1'] . '</label>';
        echo '</div>';

        echo '<div class="col s6">';
        echo '<input name="cenalunes" type="radio" checked="checked" id="cenalunes1" value="'.$menu['monday_dinner1'].'"/>';
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
        echo '<input name="comidamartes" type="radio" checked="checked"  id="comidamartes1" value="'.$menu['tuesday_lunch1'].'"/>';
        echo '<label for="comidamartes1">Comida 1: '. $menu['tuesday_lunch1'] . '</label>';
        echo '</div>';

        echo '<div class="col s6">';
        echo '<input name="cenamartes" type="radio" checked="checked" id="cenamartes1" value="'.$menu['tuesday_dinner1'].'"/>';
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
        echo '<input name="comidamiercoles" type="radio" checked="checked" id="comidamiercoles1" value="'.$menu['wednesday_lunch1'].'"/>';
        echo '<label for="comidamiercoles1">Comida 1: '. $menu['wednesday_lunch1'] . '</label>';
        echo '</div>';

        echo '<div class="col s6">';
        echo '<input name="cenamiercoles" type="radio" checked="checked" id="cenamiercoles1" value="'.$menu['wednesday_dinner1'].'"/>';
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
        echo '<input name="comidajueves" type="radio" checked="checked" id="comidajueves1" value="'.$menu['thursday_lunch1'].'"/>';
        echo '<label for="comidajueves1">Comida 1: '. $menu['thursday_lunch1'] . '</label>';
        echo '</div>';

        echo '<div class="col s6">';
        echo '<input name="cenajueves" type="radio" checked="checked" id="cenajueves1" value="'.$menu['thursday_dinner1'].'"/>';
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
        echo '<input name="comidaviernes" type="radio" checked="checked" id="comidaviernes1" value="'.$menu['friday_lunch1'].'"/>';
        echo '<label for="comidaviernes1">Comida 1: '. $menu['friday_lunch1'] . '</label>';
        echo '</div>';

        echo '<div class="col s6">';
        echo '<input name="cenaviernes" type="radio" checked="checked" id="cenaviernes1" value="'.$menu['friday_dinner1'].'"/>';
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


        echo '<button type="submit" class="btn waves-effect waves-light col s2 light-green darken-1 center-button">Guardar menú</button>';

        echo '</form>';

        echo "</div>";
      }


      
    }


    mysqli_free_result($query);
    

    mysqli_close($conection);
  }


  function suggestionContent(){
    echo '<div id="container" class="row">';
    
    echo '<h4 class="col s12 center-align">¡Envíanos tus sugerencias!</h4>';
    echo '<br><br><hr></div>';

    echo '<form name="form_suggestion" onsubmit="return validateSuggestion()" action="add_suggestion.php" accept-charset="utf-8" method="POST" enctype="multipart/form-data">
          
          <div class="input-field col s12">
            <textarea name="suggestion" id="suggestion" class="materialize-textarea"></textarea>
            <label for="suggestion">Escriba aquí su sugerencia</label>
          </div>      
    
          <button type="submit" class="btn waves-effect waves-light col s3 light-green darken-1 center-button">Enviar</button>
    
        </form>';



  }
?>



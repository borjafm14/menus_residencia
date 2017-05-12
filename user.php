<?php

session_start();


if (!isset($_SESSION['user'])){

    header('Location: index.php');
    die();

}else if ($_SESSION['type'] != 3){

    header('Location: index.php');
    die();

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="img/logo-mini.png">
  <title>Catering manager</title>

  <!--<script type="text/javascript" src="js/script.js"></script>-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
      echo "<center><p>Administrar menús</p></center>";
    }
    elseif($_GET['type'] == 'suggestions'){
      echo "<center><p>Administrar Sugerencias</p></center>";
    }
    else{
      echo "<center><p>WTF</p></center>";
    }

  }
?>
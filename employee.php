<?php

session_start();


if (!isset($_SESSION['user'])){

    header('Location: index.php');
    die();

}else if ($_SESSION['type'] != 1){

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
          <img class="responsive-img logo-mini" src="img/user.jpg">
        </ul>

        <ul class="right">
          <li><a href="logout.php"><i class="material-icons">power_settings_new</i></a></li>
        </ul>
      </div>
    </nav>
  </div>

  <div id="content" class="row">
  <!--Parte central tocha con el contenido-->
  </div>

  



</body>

</html>



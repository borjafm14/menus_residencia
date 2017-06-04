<?php


  session_start();


  Include('connector_db.php');

  $suggestion = $_POST['suggestion'];
  

  $conection = establecerConexionDB();
  $user = $_SESSION['user'];


  $sentence = "INSERT INTO SUGGESTIONS(sugerencia, nom_usuario ) VALUES ('$suggestion', '$user')";


  $query = mysqli_query($conection, $sentence) or die(mysqli_errno() . "-> " . mysqli_error());

  mysqli_close($conection);

  header("Location: user.php?type=suggestions");


?>
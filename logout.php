<?php

session_start();

session_destroy();
unset($_SESSION['user']);
unset($_SESSION['type']);
unset($_SESSION['error']);
header("Location: index.php");
?>
<?php 
    session_start();

    unset($_SESSION['id_usuario']);
    unset($_SESSION['usuario']);
    unset($_SESSION['rol']);

    session_destroy();

    header('Location: ../index.php');
?>
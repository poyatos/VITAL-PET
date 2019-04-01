<?php

require_once "../BBDD/model.php";
require_once "../BBDD/config.php";

session_start();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])){
    header("Location: ../index.php");
} else {
    if($_SESSION['rol'] != 'Cliente'){
        header("Location: ../VISTA/".$_SESSION['rol']);
    }
}


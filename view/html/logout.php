<?php
    require_once("../../config/conexion.php");
    session_destroy();
    if($_SESSION["rol_id"] == 1){
        header("Location:".Conectar::ruta()."index.php");
    }elseif($_SESSION["rol_id"] == 2 || $_SESSION["rol_id"] == 3){
        header("Location:".Conectar::ruta()."view/accesopersonal/index.php");
    }

    exit();
?>
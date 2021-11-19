<?php
    session_start();
    session_destroy();
    header("location: ../../index.html");
    //header("location: ../estadoLog/Inicio_Sesión.html");
?>
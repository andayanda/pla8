<?php 
 //parámetros de conexión a la base de datos
    $parametros = "mysql:host=localhost;dbname=banco;charset=UTF8";

    //conexón a la base de datos
    $conexionBanco = new PDO($parametros, 'root', '');

    //permitir la captura de excepciones 
    $conexionBanco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 ?>
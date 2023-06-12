<?php
function validarDatos($nif, $nombre, $apellidos, $direccion, $telefono, $email){
    $errores ='';
    if(empty($nif)){
        $errores .= "Nif obligatorio <br>";
    }
    if(empty($nombre)){
        $errores .= "Nombre obligatorio <br>";
    }
    if(empty($apellidos)){
        $errores .= "Apellidos obligatorios <br>";
    }
    if(empty($direccion)){
        $errores .= "Dirección obligatoria <br>";
    }
    if(empty($telefono)){
        $errores .= "Teléfono obligatorio <br>";
    }
    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores .=" Email con formato incorrecto<br>";
        }
    }
    if (!empty($errores)) {
        throw new Exception($errores);
    }
}
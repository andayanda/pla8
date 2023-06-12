<?php
//activar variables de sesion
// session_start();
//incorporar ficheros externos
require_once('servicios/validardatos.php');
try {
    //validar datos
    validarDatos($nif, $nombre, $apellidos, $direccion, $telefono, $email,$fechaalta);
    //conexión base de datos
    require_once('servicios/conexion.php');

    //Confeccionar la sentencia SQL
    $sql = "INSERT INTO personas VALUES (NULL, :nif, :nombre, :apellidos, :direccion, :telefono, :email, NULL)";

    //preparar la sentencia sql
    $stmt = $conexionBanco->prepare($sql);

  
    //bind de los parámetros
    $stmt->bindParam(':nif', $nif);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':email', $email);
   
     
    //trasladar la sentencia sql al SGBD
    $stmt->execute();

    //mensaje de alta efectuada
    $mensajes = "Alta persona efectuada";
    // no funciona
      

} catch (Exception $e) {
    $mensajes = $e->getMessage();
}



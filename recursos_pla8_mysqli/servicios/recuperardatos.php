<?php
$idpersona 	= $_POST['idpersona']?? null;
$nif 		= $_POST['nif']?? null;
$nombre 	= $_POST['nombre']?? null;
$apellidos 	= $_POST['apellidos']?? null;
$direccion 	= $_POST['direccion']?? null;
$telefono 	= $_POST['telefono']?? null;
$email 		= $_POST['email']?? null;
$fechaalta 	= $_POST['fechaalta']?? null;
$peticion       = $_POST['peticion'] ?? null;
//compactar datos en la variable para conservarlos y recuperarlos fuera de este formulario
$datos = compact('nif','nombre', 'apellidos', 'direccion', 'email');
echo '<pre>';print_r($datos);echo '</pre>';
$_SESSION ['datos'] = $datos;	 
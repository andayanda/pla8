<?php

//recuperar los datos del formulario
	require_once('servicios/recuperardatos.php');
	//recuperar variables de sesion si esta existe
session_start();
if (isset($_SESSION['datos'])){
//crear variables independientes a partir de las claves asociativas del array 
extract($_SESSION['datos']);
}
	
	try {	//evaluar petición recibida para incorporar el fichero correspondiente a la operativa a realizar
	switch($peticion) {
		case 'A':
			require_once('servicios/altapersona.php');
			break;
		case 'C':
			require_once('servicios/consultapersona.php');
			break;
		case 'M':
			require_once('servicios/modificacionpersona.php');
			break;
		case 'B':
			require_once('servicios/bajapersona.php');
			break;
	}	
}catch (Exception $e) {
	//informar mensaje de error
	$mensajes = $e->getMessage();
} catch (PDOException $e) {
    print_r($e->errorInfo);
}

		//MODIFICACION 

			//validar id de persona informado

			//validar datos

			//alta de persona

			//mensaje de modificación efectuada
		

		//BAJA 

			//validar id de persona informado

			//alta de persona

			//mensaje de baja efectuada

			//limpiar los campos del formulario
	

		//CONSULTA DE UNA PERSONA DE LA TABLA

			//recuperar el id del persona

			//validar id de persona informado

			//consultar el persona en la base de datos

			//trasladar los datos al formulario
			
	

			//CONSULTA DE TODAS LAS PERSONAS

		//recuperar todos los personas de la tabla
		finally {
			//CONSULTA DE TODAS LAS PERSONAS
			require_once('servicios/consultapersonas.php');
		}
//


	// 
?>	

<html>
<head>
	<title>Banco</title>
	<meta charset='UTF-8'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<div class='container'>
		<form id='formulario' method='post' action='#'>
			<input type='hidden' id='idpersona' name='idpersona'>
			<div class="row mb-3">
			    <label for="nif" class="col-sm-2 col-form-label">NIF</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nif" name='nif'value='<?php echo $nif;?>'>
			    </div>
			</div>
			<div class="row mb-3">
			    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nombre" name="nombre" value='<?php echo $nombre;?>'>
			    </div>
			</div>
			<div class="row mb-3">
			    <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="apellidos" name="apellidos" value='<?php echo $apellidos;?>'>
			    </div>
			</div>
			<div class="row mb-3">
			    <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="direccion" name="direccion" value='<?php echo $direccion;?>'>
			    </div>
			</div>
			<div class="row mb-3">
			    <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="telefono" name="telefono" value='<?php echo $telefono;?>'>
			    </div>
			</div>
			<div class="row mb-3">
			    <label for="email" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" id="email" name="email" value='<?php echo $email;?>'>
			    </div>
			</div>
			<label class="col-sm-2 col-form-label"></label>
			<button type="submit" class="btn btn-success" id='alta' name='peticion'value="A">Alta</button>
			<button type="submit" class="btn btn-warning" id='modificacion' name='peticion'value="M">Modificación</button>
			<button type="submit" class="btn btn-danger" id='baja' name='peticion'value="B">Baja</button>
			<button type="reset" class="btn btn-success">Limpiar</button>
			<label class="col-sm-2 col-form-label"></label>
			<p class='mensajes'><?php echo $mensajes ??null;?></p>
		</form><br><br>
		<table id='listapersonas' class="table table-striped">
		<tr class='table-dark'><th>NIF</th><th>Nombre</th><th>Apellidos</th></tr>
		
		<?php 
						foreach ($personas ?? []  as $persona) {
							echo "<tr onclick='consultaPersona($persona[idpersona])'>";
						
							echo "<td>$persona[nif]</td>";
							echo "<td>$persona[nombre]</td>";
							echo "<td>$persona[apellidos]</td>";
							echo "</tr>";
						}
					?>


			
		</table>
	</div>
	<form id='formconsulta' method='post' action='#'>
		<input type='hidden' id='consulta' name='peticion'value="C">
	</form>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src='scripts/script.js'></script>
</body>
</html>
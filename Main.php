<?php
	namespace empleados\clases;
	//inicializar variables
	$errores=null;

	//incorporar los ficheros con las clases
	require('empleados/clases/empleado.php');
	require('empleados/clases/empleadofijo.php');
	require('empleados/clases/empleadohoras.php');
	require('empleados/clases/empleadotemporal.php');
	require('empleados/clases/administracion.php');
	//require('empleados/traits/GuardarFichero.php');
	//incorporar los namespaces con use
	use Exception;
	use empleados\clases\Administracion;
	//use empleados\clases\Empleado;
	use empleados\clases\EmpleadoFijo;
	use empleados\clases\EmpleadoHoras;
	use empleados\clases\EmpleadoTemporal;
	//use empleados\traits\GuardarFichero;
	//instanciar un emleado de cada clase

	try{
		$empleadoFijo = new EmpleadoFijo('100000000A','María',43,'Ventas',2020);
		
	}catch(exception $e){
		$errores=$e->getMessage();
	}
	try{
		$empleadoHoras = new EmpleadoHoras('200000000B','Ana',30,'Almacén',300);
	
	}catch(exception $e){
		$errores=$e->getMessage();
	}
	try{
		$empleadoTemporal = new EmpleadoTemporal('300000000C','Juan',25,'Administración','01/01/2023','31/12/2023');
	
	}catch(exception $e){
		$errores=$e->getMessage();
	}

	//consulta de todos los empleados


	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POO</title>
	<style type="text/css">
		.empleados {width: 500px; padding: 10px; border: 2px solid grey; margin: auto; margin-bottom: 10px; background-color: lightblue;}
		table, td {border: 1px solid grey;margin: auto;padding:5px;}
	</style>
</head>
<body>
	<div class='empleados'>
		<h3>Empleado Fijo</h3>
		<?php
		
		if (isset($empleadoFijo)){
			//mostrar todos los datos del empleado fijo
			echo $empleadoFijo->verDatos();
			//ejecutar el método de calculo de salario
			echo 'Salario: '.$empleadoFijo->calcularSueldo();
		}else echo $errores;
		?>
	</div>
	<div class='empleados'>
		<h3>Empleado Horas</h3>
		<?php
		if (isset($empleadoHoras)){
			//mostrar todos los datos del empleado horas
			echo $empleadoHoras->verDatos();
			//ejecutar el método de calculo de salario
			echo 'Salario: '.$empleadoHoras->calcularSueldo();
		}else echo $errores;
		?>
	</div>
	<div class='empleados'>
		<h3>Empleado Temporal</h3>
		<?php
		
		if (isset($empleadoTemporal)){
			//mostrar todos los datos del empleado temporal
			echo ($empleadoTemporal??null)->verDatos();
			//ejecutar el método de calculo de salario
			echo 'Salario: '.$empleadoTemporal->calcularSueldo();
		}else echo $errores;
		?>
	</div>
	<table>
		<?php
			Administracion::consultaEmpleados();
		?>
	</table>
</body>
</html>
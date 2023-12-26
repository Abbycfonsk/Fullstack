<?php
namespace empleados\clases;
const SALARIOFIJO=1349.27;
require_once('empleados/traits/GuardarFichero.php');
use Exception;
use empleados\clases\Empleado;
use empleados\traits\GuardarFichero;
final class EmpleadoTemporal extends Empleado{

private string $fechaAlta;
private string $fechaBaja;

  //use
  use GuardarFichero;
public function __construct($nif,$nombre,$edad,$departamento,$fechaAlta,$fechaBaja){
        
    parent::__construct($nif,$nombre,$edad,$departamento);
    $this->setFechaAlta($fechaAlta);
    $this->setFechaBaja($fechaBaja);
    $this->altaEmpleado();
   
}

public function setFechaAlta($fechaAlta):void{
    if (empty($fechaAlta)){
        throw new Exception('Fecha de alta es obligatoria');
    }
    $this->fechaAlta=$fechaAlta;
}
public function setFechaBaja($fechaBaja):void{
    if (empty($fechaBaja)){
        throw new Exception('Fecha de baja es obligatoria');
    }
    $this->fechaBaja=$fechaBaja;
}
//getters
public function getFechaAlta():string {
    return $this->fechaAlta;
}

public function getFechaBaja():string {
    return $this->fechaBaja;
}
public function calcularSueldo(): float{
    return SALARIOFIJO;
}
public function verDatos(): string{
    return 'Datos:'.parent::verDatos().' / '.$this->getFechaAlta().' / '.$this->getFechaBaja().'<br>';
}
private function altaEmpleado():string {
    $empleadoT='Empleado Temporal;'.parent::datosEmpleadosCsv().';'.$this->getFechaAlta().';'.$this->getFechaBaja();
   $this-> guardar($empleadoT);
   return $empleadoT;

}


}



?>
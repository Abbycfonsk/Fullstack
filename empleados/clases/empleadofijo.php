<?php

namespace empleados\clases;
const BASE=1091.13;
const COMPLEMENTO=192.85;


require_once('empleados/traits/GuardarFichero.php');
use Exception;
use empleados\clases\Empleado;
use empleados\traits\GuardarFichero;
final class EmpleadoFijo extends Empleado {
   
    //atributos
    private int $añoAlta;

    //use
    use GuardarFichero;
    //constructor
    public function __construct($nif,$nombre,$edad,$departamento,$añoAlta){
        
        parent::__construct($nif,$nombre,$edad,$departamento);
        $this->setAlta($añoAlta);
        $this->altaEmpleado();
       
    }

    //setters
    public function setAlta($añoAlta):void{
        if (empty($añoAlta)||!is_numeric($añoAlta)){
            throw new Exception('Fecha de alta debe ser numérica y es obligatoria');
        }
        $this->añoAlta=$añoAlta;
    }
    //getters
    public function getAlta():int {
        return $this->añoAlta;
    }

    //otros métodos
    public function calcularSueldo(): float {
        $resultado = BASE+(COMPLEMENTO*(2024-($this->getAlta())));
        return $resultado;

    }

    public function verDatos(): string{
         return 'Datos:'.parent::verDatos().' / '.$this->getAlta().'<br>';
    }

   private function altaEmpleado():string {
    $empleadoF='Empleado Fijo;'.parent::datosEmpleadosCsv().';'.$this->getAlta();
       $this-> guardar($empleadoF);
       return $empleadoF;

    }
   
}



?>
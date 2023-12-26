<?php
namespace empleados\clases;
 const PRECIOHORA=9.39;

require_once('empleados/traits/GuardarFichero.php');
use Exception;
use empleados\clases\Empleado;
use empleados\traits\GuardarFichero;
final class EmpleadoHoras extends Empleado{
   

    private int $numeroHoras;

    
    //use
    use GuardarFichero;

    public function __construct($nif,$nombre,$edad,$departamento,$numeroHoras){
        
        parent::__construct($nif,$nombre,$edad,$departamento);
        $this->setHoras($numeroHoras);
        $this->altaEmpleado();
    }




    public function setHoras(int $numeroHoras):void{
        if (empty($numeroHoras)||(!is_numeric($numeroHoras))){
            throw new exception ('Horas debe ser un número y es obligatorio');
        }
        $this->numeroHoras=$numeroHoras;
    }

    public function getHoras():int{
        return $this->numeroHoras;
    }


    public function calcularSueldo(): float {
      
        $resultado = PRECIOHORA*($this->getHoras());
        return $resultado;

    }
    public function verDatos(): string{
        return 'Datos:'.parent::verDatos().' / '.$this->getHoras().'<br>';
   }
   private function altaEmpleado():string{
    $empleadoH='Empleado Horas;'.parent::datosEmpleadosCsv().';'.$this->getHoras();
    $this-> guardar($empleadoH);
    return $empleadoH;

    }

  
}


?>
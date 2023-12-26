<?php
namespace empleados\clases;
use Exception;


abstract class Empleado{
//atributos
private string $nif;
private string $nombre;
private int $edad;
private string $departamento;

//contructor
public function __construct($nif,$nombre,$edad,$departamento){

    $this->setNif($nif);
    $this->setNombre($nombre);
    $this->setEdad($edad);
    $this->setDepartamento($departamento);
    
}

//getters
public function setNif(string $nif):void{
    if(empty($nif)){
       throw new Exception('Nif obligatorio');
    }
    $this->nif=$nif;
}
public function setNombre(string $nombre):void{
    if(empty($nombre)){
        throw new Exception('Nombre obligatorio');
    }
    $this->nombre=$nombre;
}
public function setEdad(int $edad):void{
    if(empty($edad)){
        throw new Exception('Edad obligatoria');
    }
    $this->edad=$edad;
}
public function setDepartamento(string $departamento):void{
    if(empty($departamento)){
        throw new Exception('Departamento obligatorio');
    }
    $this->departamento=$departamento;
}
//setters
public function getNif():string {
    return $this->nif;
}
public function getNombre():string{
    return $this->nombre;
}
public function getEdad():int{
    return $this->edad;
}
public function getDepartamento():string{
    return $this->departamento;
}

//otros métodos
abstract public function calcularSueldo():float;

public function verDatos():string {
    return $this->getNif().' / '. $this->getNombre().' / '.$this->getEdad().' / '.$this->getDepartamento();
}
protected function datosEmpleadosCsv():string {

    return $this->getNif().';'.$this->getNombre().';'.$this->getEdad().';'.$this->getDepartamento();
}

 
}








?>
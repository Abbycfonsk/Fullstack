<?php
namespace empleados\clases;


abstract class Administracion{

public static function consultaEmpleados(){

    $fichero=fopen("ficheros/empleados.csv","r");
    while(!feof($fichero)){
        $empleado=fgetcsv($fichero,0,';');
     
        echo '<tr>';
        echo '<td>'.($empleado[0]??null).'</td>';
        echo '<td>'.($empleado[1]??null).'</td>';
        echo '<td>'.($empleado[2]??null).'</td>';
        echo '<td>'.($empleado[3]??null).'</td>';
        echo '<td>'.($empleado[4]??null).'</td>';
        echo '<td>'.($empleado[5]??null).'</td>';
        echo '<td>'.($empleado[6]??null).'</td>';
    }

}


}

?>
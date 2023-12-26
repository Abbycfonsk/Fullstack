<?php
namespace empleados\traits;

trait GuardarFichero{
private function guardar(string $csv):void{
$fichero=fopen("ficheros/empleados.csv","a");
fwrite($fichero, "$csv\n");
fclose($fichero);

}
}


?>
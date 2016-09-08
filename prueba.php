<?php
include_once './CapaLogica/administrador.php';

$adm = new Administrador("mario", "arriola", "prueba1", "pwd123");
// try{
//     $adm->insertar();
// }catch(Exception $e){
//     echo 'se capturo la exception';
// }
$adm->mostrarDatos();    

if($adm->grabar()){
    echo 'se grabo correctamente';
    $adm->mostrarDatos();
}
// $adm->setNombre("lautaro");

// $adm->actualizar();


?>
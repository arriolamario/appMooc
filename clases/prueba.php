<?php
include_once 'administrador.php';

$adm = new Administrador("mario", "arriola", "otromailddd12367", "pwd123");
try{
    $adm->insertar();
}catch(Exception $e){
    echo 'se capturo la exception';
}
    

// $adm->setNombre("lautaro");

// $adm->actualizar();


?>
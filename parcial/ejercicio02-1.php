<?php

$select = $_POST["combo"];

$conn = mysqli_connect("localhost", "mario", "", "prueba");
$query = "select U.urlFoto from rol R, usuario_rol UR, usuario U where R.id = UR.id_rol and U.id = UR.id_usuario and R.nombre = '$select'";
$result = mysqli_query($conn, $query);
while($fila = mysqli_fetch_assoc($result)){
    echo $fila["urlFoto"];
}
?>
<?php 
echo "comenzamoms la session <br>";
SESSION_START();

function ObtenerRoles($id){
    $sql = mysqli_connect("localhost","mario","","prueba");

    $query = "select Roles.nombre from usuario User, rol Roles, usuario_rol user_rol where User.id = $id and User.id = user_rol.id_usuario and Roles.id = user_rol.id_rol";

    $result = mysqli_query($sql, $query);

    $roles = "";
    while($fila = mysqli_fetch_assoc($result)){
        $roles = " $roles " . $fila["nombre"] . " |";
    }

    return $roles;
}

echo "llamamos a la funcion ObtenerRoles<br>";
$_SESSION["roles"] = ObtenerRoles(1);

echo "El usuario tiene estos roles<br>";
echo $_SESSION["roles"];

?>
<?php
if (isset($_POST["enviar"])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if(isset($_FILES["foto"])){
        $name = $_FILES["foto"]["name"];
        $type = $_FILES["foto"]["type"];
        $size = $_FILES["foto"]["size"];
        $tmp = $_FILES["foto"]["tmp_name"];
        $erro = $_FILES["foto"]["error"];
        $direccion = $_SERVER['DOCUMENT_ROOT'] . "/imagenes/". $name;
        $result = move_uploaded_file($tmp,$direccion);
    }
    // if (isset($_FILES["foto"]) && is_uploaded_file($_FILES["foto"]["tmp_name"])) {
    //     echo "entra";
    // }else{
    //     echo "no entra";
    // }
}
?>


<html>  
    <head></head>
    <body>
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="nombre">nombre</label>
            <input type="text" id="nombre" name="nombre">
            <br/>
            <label for="email">email</label>
            <input type="email" id="email" name="email">
            <br/>
            <label for="password">password</label>
            <input type="password" id="password" name="password">
            <br/>
            <input type="file" id="foto" name="foto">
            <br/>
            <input type="submit" name="enviar" value="Send">
        </form>
    </body>
</html>
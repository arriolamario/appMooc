<?php
if (isset($_POST["enviar"])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $archivo = $_FILES["foto"];
}
?>


<html>  
    <head></head>
    <body>
        <form action="#" method="post">
            <label for="nombre">nombre</label>
            <input type="text" id="nombre" name="nombre">
            <br/>
            <label for="email">email</label>
            <input type="email" id="email" name="email">
            <br/>
            <label for="password">password</label>
            <input type="password" id="password" name="password">
            <br/>
            <label for="foto">foto</label>
            <input type="file" id="foto" name="foto">
            <br/>
            <input type="submit" name="enviar" value="Send">
        </form>
    </body>
<html>
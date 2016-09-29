<?php
    $conn = mysqli_connect("localhost","mario","","prueba");
    $query = "select * from rol";
    $result = mysqli_query($conn, $query);
?>



<html>
    <head>
    </head>
    <body>
        <form action="ejercicio02-1.php" method="post">
            <select name="combo">
            <?php
                while ($fila = mysqli_fetch_assoc($result)) {
                    $rol = $fila["nombre"];
                    echo "<option value='$rol'> $rol </option>";
                }
            ?>
            </select>

            <input type="submit" />
        </form>
    </body>

</html>
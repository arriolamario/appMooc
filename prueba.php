<?php 
    echo "empieza<br>";
    if(isset($_POST["fecha"])){
        echo "entra<br>";
        $fecha = $_POST["fecha"];
        echo "$fecha";
    }else{
        echo "seteamos";
        $fecha = "2016-05-05";
    }
?>


<html>
    <head>
    </head>
    <body>
        <form action="" method ="POST">
            <?php echo "$fecha<br>"?>
            <input name="fecha" type="date" value="<?php echo date($fecha);?>"      >
            <scrip>
                
            </scrip>
            <input type="submit">
        </form>
    </body>
</html5>
<html>
<head>
<title>Traer al Frente</title>
<script language="javascript">
var ventana;

function crearVentana(url) {
    if (!ventana || ventana.closed) {
        ventana = window.open(url,"hija","status,height=200,width=300");
    } else {
        // window is already open, so bring it to the front
        ventana.focus();
    }
}
</script>
</head>
<body>
 <a href="#" onclick="Javascript:crearVentana('AjaxBasico.html');"> Traer al Frente</a>
</body>
</html>
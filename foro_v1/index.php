<html>
<head>
<meta charset="UTF-8">
<link href="web/default.css" rel="stylesheet" type="text/css" />
<title>MINIFORO</title>
</head>
<body>
<div id="container" style="width: 450px;">
<div id="header">
<img src="web/logo.png" alt="mini foro logo" width="100px" height="100px">
<h1>MINIFORO versión 1.0</h1>
</div>

<div id="content">

<?php
session_start();
// PRIMERA APROXIMACIÓN AL MODELO VISTA CONTROLADOR. 
// Funciones auxiliars Ej- usuarioOK
include_once 'app/funciones.php';
$msg = "";

//el usuario no se ha identificado
if (!isset($_SESSION['usuario'])) {
    if ( !isset($_REQUEST['orden']) || $_REQUEST['orden'] != "Entrar"){
        include_once 'app/entrada.php';
    } else if ($_REQUEST['orden'] == "Entrar") {
        if (
            isset($_REQUEST['nombre']) && isset($_REQUEST['contraseña']) && 
            usuarioOK($_REQUEST['nombre'], $_REQUEST['contraseña'])
        ) {
            $_SESSION['usuario'] = $_REQUEST['nombre'];
            $msg = " Bienvenido <b>" . $_REQUEST['nombre'] . "</b><br>";
            include_once  'app/comentario.html';
        } else {
            $msg = " <br> Usuario no válido </br>";
            include_once 'app/entrada.php';
        }
    }
} else {
    //usuario identificado
    switch ($_REQUEST['orden']) {
        case "Nueva opinión":
            $msg = " Nueva opinión <br>";
            include_once  'app/comentario.php';
            break;
        case "Detalles": // Mensaje y detalles
            $msg = "Detalles de su opinión";
            limpiarEntrada($_REQUEST['comentario']);
            limpiarEntrada($_REQUEST['tema']);
            include_once 'app/comentariorelleno.php';
            include_once 'app/detalles.php';
            break;
        case "Terminar": // Formulario inicial
            session_destroy();
            include_once 'app/entrada.php';
    }
}
?>
</div>
</div>
</body>
</html>